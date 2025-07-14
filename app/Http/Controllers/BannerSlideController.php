<?php

namespace App\Http\Controllers;

use App\Models\BannerSlide;
use Illuminate\Http\Request;

class BannerSlideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.bannerslide.index');
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
    public function show(BannerSlide $bannerSlide)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BannerSlide $bannerSlide)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BannerSlide $bannerSlide)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BannerSlide $bannerSlide)
    {
        //
    }
}
