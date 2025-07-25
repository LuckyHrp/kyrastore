<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Nominal;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        $products = Product::with('category')->paginate(6);
        return view('admin.product.index', compact('categories', 'products'));
    }

    public function search(Request $request)
    {
        $query = $request->input('q');

        $categories = Category::all();

        $products = Product::with('category')
            ->where('name', 'like', '%' . $query . '%')
            ->orWhere('slug', 'like', '%' . $query . '%')
            ->get();

        return view('partials.product-table-rows', compact('products', 'categories'))->render();
    }

    public function bulkaction(Request $request)
    {
        $request->validate([
            'action' => ['required', Rule::in(['delete'])],
            'product_ids' => ['required', 'array'],
            'product_ids.*' => ['exists:products,id'],
        ]);

        $productIds = $request->input('product_ids');
        $action = $request->input('action');
        $message = '';

        switch ($action) {
            case 'delete';
                Product::whereIn('id', $productIds)->delete();
                $message = count($productIds) . ' produk berhasil dihapus.';
                break;
        }
        return redirect()->route('product.index')->with('success', $message);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string:max:255',
            'company' => 'required|string:max:255',
            'category_id' => 'required|integer|exists:categories,id',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $path = null;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $validatedData['image'] = $path;
        }

        Product::create($validatedData);

        return redirect()->route('product.index')->with('success', 'Produk berhasil ditambahkan!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $nominals = Nominal::whereHas('product', function ($q) use ($product) {
            $q->where('slug', '=', $product->slug);
        })->get();
        return view('single-product', ['product' => $product, 'nominals' => $nominals]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validatedData = request()->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string:max:255',
            'company' => 'required|string:max:255',
            'category_id' => 'required|integer|exists:categories,id',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($product->image && Storage::exists($product->image)) {
                Storage::delete($product->image);
            }
            $path = $request->file('image')->store('products', 'public');
            $validatedData['image'] = $path;
        }

        $product->update($validatedData);

        return redirect()->route('product.index', $product->id)->with('success', 'Produk berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if ($product->image && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }
        $product->delete();

        return redirect()->route('product.index')->with('success', 'Produk berhasil dihapus!');
    }
}
