<?php
namespace App\Http\Controllers;

// import model
use App\Models\Product;

class FrontendController extends Controller
{
    public function index()
    {
        $product = Product::latest()->take(8)->get();
        return view('index', compact('product'));
    }

    public function about()
    {
        return view('about');
    }

    public function product()
    {
        $product = Product::latest()->get();
        return view('product', compact('product'));
    }

    public function singleProduct(Product $product)
    {
        return view('single_product', compact('product'));
    }

    public function cart()
    {
        return view('cart');
    }
}
