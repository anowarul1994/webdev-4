<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function index()
    {
      $products = Product::with('category', 'color', 'size', 'vendor')->where('status', 1)->get();
        return view('frontend.home.index', compact('products'));
    }

}
