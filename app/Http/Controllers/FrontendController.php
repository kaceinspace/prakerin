<?php
namespace App\Http\Controllers;

// import model
use App\Models\Category;
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
        $category = Category::all();
        $product  = Product::latest()->get();
        return view('product', compact('product', 'category'));
    }

    public function singleProduct(Product $product)
    {
        return view('single_product', compact('product'));
    }

    public function filterByCategory($slug)
    {
        $category         = Category::all();
        $selectedCategory = Category::where('slug', $slug)->firstOrFail();
        $product          = Product::where('category_id', $selectedCategory->id)
            ->latest()->get();

        return view('product', compact('product', 'category', 'selectedCategory'));
    }

    public function search()
    {
        $query = request('q');

        $product = Product::where('name', 'like', '%' . $query . '%')
            ->orWhere('description', 'like', '%' . $query . '%')
            ->orWhereHas('category', function ($q) use ($query) {
                $q->where('name', 'like', '%' . $query . '%');
            })
            ->latest()
            ->get();

        $category = Category::all(); // untuk sidebar/filter kategori jika dibutuhkan

        return view('product', compact('product', 'category', 'query'));
    }

}
