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
        $products = Product::paginate(6);
        $nominals = Nominal::with('product')->get();
        return view('admin.nominal.index', compact('products', 'nominals'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nominal $nominal)
    {
        //
    }
}
