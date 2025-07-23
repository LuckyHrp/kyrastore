<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $games = Product::whereHas('category', function ($q) {
            $q->where('slug', '=', 'game');
        })->get();
        $vouchers = Product::whereHas('category', function ($q) {
            $q->where('slug', '=', 'voucher');
        })->get();
        $pulsa = Product::whereHas('category', function ($q) {
            $q->where('slug', '=', 'pulsa');
        })->get();
        $hiburan = Product::whereHas('category', function ($q) {
            $q->where('slug', '=', 'aplikasi');
        })->get();
        $banners = Banner::where('is_active', true)->get();
        return view('home', compact(['banners', 'products', 'games', 'vouchers', 'pulsa', 'hiburan']));
    }
}
