<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use DataTables;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('category.index',compact('categories'));
    }

    public function getCategory(Request $request)
    {
        if ($request->ajax()) {
            $data = Category::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('thumbnail_image', function($row){
                    $pimage = $row->getFirstMediaUrl('thumbnail_image');
                    return '<img src='.$pimage.'  width="50"/>'; 
            })
            ->addColumn('status', function($row){
                if($row->status == 1){
                    return "Enable";
                }else{
                    return "Disable";
                }
            })
            ->addColumn('show_in_menu', function($row){
                if($row->show_in_menu == 1){
                    return "Yes";
                }else{
                    return "No";
                }
            })
            ->addColumn('is_featured', function($row){
                if($row->is_featured == 1){
                    return "Yes";
                }else{
                    return "No";
                }
            })
                ->addColumn('action', function(Category $category){
                    $actionBtn = '<a href="'.route('category.edit', $category->id).'" class="edit btn btn-success btn-sm">Edit</a> 
                    <form action="'.route('category.destroy', $category->id).'" method="post" style="background: transparent;width:auto;padding:0;">
                        '.csrf_field().'
                        '.@method_field("DELETE").'
                        <input type="submit" value="DELETE" class="delete btn btn-danger btn-sm">
                    </form>';
                    
                    return $actionBtn;
                })
                ->rawColumns(['action','thumbnail_image'])
                ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'status'=> 'required',
            'show_in_menu'=> 'required',
            'parent_id'=> 'required',
            'short_description'=> 'required',
            'description'=> 'required',
            'thumbnail_image'=> 'required',
            'banner_image'=> 'required',
            'is_featured'=> 'required',
            'url_key'=> 'required|unique:categories',
        ]);
        $categryData = $request->all();

        $data = [
            'name'=> $categryData['name'],
            'status'=> $categryData['status'],
            'show_in_menu'=> ($categryData['show_in_menu']==1)??"selected",
            'parent_id'=> $categryData['parent_id'],
            'short_description'=> $categryData['short_description'],
            'description'=> $categryData['description'],
            // 'thumbnail_image'=> $categryData['thumbnail_image'],
            // 'banner_image'=> $categryData['banner_image'],
            'is_featured'=> $categryData['is_featured'],
            'url_key'=> $categryData['url_key'],
        ];
        $catData = Category::create($data);
        
        if($request->hasFile('thumbnail_image') && $request->file('thumbnail_image')->isValid()){
            $catData->addMediaFromRequest('thumbnail_image')->toMediaCollection('thumbnail_image');
        }

        if($request->hasFile('banner_image') && $request->file('banner_image')->isValid()){
            $catData->addMediaFromRequest('banner_image')->toMediaCollection('banner_image');
        }
        return redirect()->route('category.index')->withSuccess('Data Create SuccessFully...');
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
    public function edit($id)
    {
       $categories = Category::where('id', $id)->first();
       return view('category.edit', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Category $category)
    {
        $request->validate([
            'name'=> 'required',
            'status'=> 'required',
            'show_in_menu'=> 'required',
            'parent_id'=> 'required',
            'short_description'=> 'required',
            'description'=> 'required',
            'thumbnail_image'=> 'required',
            'banner_image'=> 'required',
            'is_featured'=> 'required',
            'url_key'=> 'required',
        ]);
        $categoryData = $request->only('name','status','show_in_menu','parent_id','short_description','description','thumbnail_image','banner_image','is_featured','url_key');
        Category::where('id',$category->id)->update($categoryData);
        if($request->hasFile('thumbnail_image') && $request->file('thumbnail_image')->isValid()){
            $category->clearMediaCollection('thumbnail_image');
            $category->addMediaFromRequest('thumbnail_image')->toMediaCollection('thumbnail_image');
        }
        if($request->hasFile('banner_image') && $request->file('banner_image')->isValid()){
            $category->clearMediaCollection('banner_image');
            $category->addMediaFromRequest('banner_image')->toMediaCollection('banner_image');
        }
        return redirect()->route('category.index')->withSuccess('Data Update SuccessFully...');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Category::where('id',$id)->delete();
        return redirect()->route('category.index')->withSuccess('Data Delete  SuccessFully...');

    }

}
