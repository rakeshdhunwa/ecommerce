<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Banner;
use App\Models\Category;
class frontendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function categories()
    {
        //$categories = Category::where('status', 1)->where('show_in_menu', 1)->get();
       return view('frontend.category');
    }

    public function home()
    {
        $products = Product::all();
        $banners = Banner::all();
        //$categories = Category::where('status', 1)->where('show_in_menu', 1)->get();
       return view('frontend.index', compact('products','banners'));
    }
    public function contact()
    {
        $categories = Category::where('status', 1)->get();
       return view('frontend.contact',compact('categories'));
       
    }
    public function products(Request $request, $id)
    {
        //$categories = Category::where('status', 1)->where('show_in_menu', 1)->get();

        $product = Product::where('id', $id)->first();
        $products = $product->catigers;
        foreach($products as $_pr){
            $catname = $_pr->url_key;
        }
        
        $category = Category::where('url_key',$catname)->first();
        $products = $category->products;
       return view('frontend.product', compact('product','products'));
    }

    public function categorySlug($slug)
    {
        $products = Product::all();
        $banners = Banner::all();
        //$categories = Category::where('status', 1)->where('show_in_menu', 1)->get();
        $category = Category::where('url_key', $slug)->first();
        $products = $category->products;

        // echo "<pre>";
        // print_r($products);
        // die;
       return view('frontend.category', compact('category','products','banners'));
    }

    public function articleSlug($slug){
        $product = Product::where('url_key', $slug)->first();
        $products = $product->catigers;
        foreach($products as $_pr){
            $catname = $_pr->url_key;
        }
        
        $category = Category::where('url_key',$catname)->first();
        $products = $category->products;
        // $categories = Category::where('status', 1)->orwhere('show_in_menu', 1)->get();

        return view('frontend.product', compact('category','products','product'));
    }
   
}
