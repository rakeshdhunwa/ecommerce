<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::all();
        return view('brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'status'=> 'required',
            'description'=> 'required',
        ]);

        $brand = $request->all();

        $data = [
            'name'=> $brand['name'],
            'status'=> ($brand['status']==1)??"selected",
            'description'=> $brand['description'],
        ];
        $brands = Brand::create($data);
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $brands->addMediaFromRequest('image')->toMediaCollection('image');
        }
        return redirect()->route('brand.index')->withSuccess('Data Add SuccessFully...');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $brands = Brand::where('id', $id)->first();
        return view('brand.edit', compact('brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'name'=> 'required',
            'status'=> 'required',
            'description'=> 'required',
        ]);

        $brands = $request->only('name','status','description');

        Brand::where('id', $brand->id)->update($brands);
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $brand->clearMediaCollection('image');
            $brand->addMediaFromRequest('image')->toMediaCollection('image');
        }
        return redirect()->route('brand.index')->withSuccess('Data Update SuccessFully...');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Brand::where('id', $id)->delete();
        return redirect()->route('brand.index')->withSuccess('Data Delete SuccessFully...');

    }
}
