<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'category_id' => 'required|integer|exists:categories,id',
            'description' => 'nullable|string',
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $path = null;
        if ($request->hasFile('icon')) {
            $path = $request->file('icon')->store('products', 'public');
        }

        Product::create([
            'name' => $validatedData['name'],
            'slug' => $validatedData['slug'],
            'category_id' => $validatedData['category_id'],
            'description' => $validatedData['description'],
            'icon' => $path,
        ]);

        return redirect()->route('product.index')->with('success', 'Produk berhasil ditambahkan!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
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
            'category_id' => 'required|integer|exists:categories,id',
            'description' => 'nullable|string',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('icon')) {
            if ($product->icon && Storage::exists($product->icon)) {
                Storage::delete($product->icon);
            }
            $path = $request->file('icon')->store('products', 'public');
            $validatedData['icon'] = $path;
        }

        $product->update($validatedData);

        return redirect()->route('product.index', $product->id)->with('success', 'Produk berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if ($product->icon && Storage::disk('public')->exists($product->icon)) {
            Storage::disk('public')->delete($product->icon);
        }
        $product->delete();

        return redirect()->route('product.index')->with('success', 'Produk berhasil dihapus!');
    }
}
