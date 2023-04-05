<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = Page::all();
        return view('page.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('page.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'status'=>'required',
            'heading'=>'required',
            'description'=>'required',
            'url_key'=>'required',
        ]);

        $pageAll = $request->all();

        $data = [
            'name'=> $pageAll['name'],
            'status'=> $pageAll['status'],
            'heading'=> $pageAll['heading'],
            'description'=> $pageAll['description'],
            'url_key'=> $pageAll['url_key'],
        ];
        $pageData = Page::create($data);
        return redirect()->route('page.index')->withSuccess('Data Add SuccessFully...');
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
        $pages = Page::where('id', $id)->first();
        return view('page.edit', compact('pages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'name'=>'required',
            'status'=>'required',
            'heading'=>'required',
            'description'=>'required',
            'url_key'=>'required',
        ]);

        $pageData = $request->only('name','status','heading','description','url_key');

        Page::where('id', $id)->update($pageData);
        return redirect()->route('page.index')->withSuccess('Data Update SuccessFully...');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Page::where('id', $id)->delete();
        return redirect()->route('page.index')->withSuccess('Data Delete SuccessFully...');

    }
}
