<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Product_category;

class Product_categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorys = Product_category::paginate(5);
        return view('product_category.index', compact('categorys'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product_category.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'category_id' => 'required',
        ]);

        $categorys = $request->all();

        $data  = [
            'product_id' => $categorys['product_id'],
            'category_id' => $categorys['category_id'],
        ];
        Product_category::create($data);
        return redirect()->route('product_category.index')->withSuccess('Data Add SuccessFully.....');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categorys = product_category::where('id', $id)->first();

        return view('product_category.edit', compact('categorys'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
    //    print_r($request->all());
        $request->validate([
            'product_id' => 'required',
            'category_id' => 'required',
        ]);

        $categoryData = $request->only('product_id','category_id');
        Product_category::where('id', $id)->update($categoryData);
        return redirect()->route('product_category.index')->withSuccess('Data Update SuccessFully...');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Product_category::where('id', $id)->delete();
        return redirect()->route('product_category.index')->withSuccess('Data Delete SuccessFully...');
    }
}
