<?php

namespace App\Http\Controllers;

use App\Models\Nominal;
use App\Models\Product;
use Illuminate\Http\Request;

class NominalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        $nominals = Nominal::with('product')->paginate(6);
        return view('admin.nominal.index', compact('products', 'nominals'));
    }

    public function search(Request $request)
    {
        $query = $request->input('q');

        $products = Product::all();

        $nominals = Nominal::with('product')
            ->where('name', 'like', '%' . $query . '%')
            ->orWhere('code', 'like', '%' . $query . '%')
            ->orWhere('price', 'like', '%' . $query . '%')
            ->orWhereHas('product', function ($q) use ($query) {
                $q->where(column: 'name', operator: 'like', value: '%' . $query . '%');
            })
            ->get()
        ;

        return view('partials.nominal-table-rows', compact('products', 'nominals'))->render();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|integer|exists:products,id',
            'name' => 'required|string:max:255',
            'code' => 'required|string:max:255',
            'price' => 'required|integer'
        ]);

        Nominal::create($validated);

        return redirect()->route('nominal.index')->with('success', 'Nominal berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Nominal $nominal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Nominal $nominal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Nominal $nominal)
    {
        $validated = $request->validate([
            'product_id' => 'required|integer|exists:products,id',
            'name' => 'required|string:max:255',
            'code' => 'required|string:max:255',
            'price' => 'required|integer'
        ]);

        $nominal->update($validated);

        return redirect()->route('nominal.index')->with('success', 'Nominal berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nominal $nominal)
    {
        $nominal->delete();

        return redirect()->route('nominal.index')->with('success', 'Nominal berhasil dihapus');
    }
}
