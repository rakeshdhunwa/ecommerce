<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Block;

class BlockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blocks = Block::all();
        return view('block.index', compact('blocks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('block.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'heading' => 'required',
            'status' => 'required',
            'description' => 'required',
            'identifier' => 'required',
        ]);

        $blocks = $request->all();

        $data = [
            'name' => $blocks['name'],
            'heading' => $blocks['heading'],
            'status' => $blocks['status'],
            'description' => $blocks['description'],
            'identifier' => $blocks['identifier'],
        ];
        Block::create($data);

        return redirect()->route('block.index')->withSuccess('Data Create SuccessFully...');
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
        $blocks = Block::where('id', $id)->first();
        return view('block.edit', compact('blocks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',
            'heading' => 'required',
            'status' => 'required',
            'description' => 'required',
            'identifier' => 'required',
        ]);

        $blockAll = $request->only('name','heading','status','description','identifier');
        Block::where('id', $id)->update($blockAll);
        return redirect()->route('block.index')->withSuccess('Data Update SuccessFully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Block::where('id', $id)->delete();
        return redirect()->route('block.index')->withSuccess('Data Update SuccessFully');

    }
}
