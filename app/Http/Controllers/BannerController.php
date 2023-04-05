<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Banner;
use DataTables;
class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = Banner::all();
        return view('banner.index', compact('banners'));
    }

    public function getBanner(Request $request)
    {
        if ($request->ajax()) {
            $data = Banner::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('status', function($row){
                    if($row->status==1){
                        return "Enable"; 
                    }else{
                        return "Disable"; 

                    }
                })
                ->addColumn('image', function($row){
                    $pimage = $row->getFirstMediaUrl('image');
                    return '<img src='.$pimage.'  width="50"/>'; 
                })
                ->addColumn('action', function(Banner $banner){
                    $actionBtn = '<a href="'.route('banner.edit',$banner->id).'" class="edit btn btn-success btn-sm">Edit</a> 
                    <form action="'.route('banner.destroy', $banner->id).'" method="post" style="background: transparent;width:auto;padding:0;">
                    '.csrf_field().'
                    '.@method_field("DELETE").'
                    <input type="submit"value="DELETE" class="delete btn btn-danger btn-sm">
                    </form>';
                    return $actionBtn;
                })
                ->rawColumns(['action','image'])
                ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('banner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'image'=> 'required',
            'status'=> 'required'
        ]);
        $banners = $request->all();

        $data = [
            'name'=> $banners['name'],
            'image'=> $banners['image'],
            'status'=> ($banners['status']==1)??"selected",
        ];
        
        $banner = Banner::create($data);
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $banner->addMediaFromRequest('image')->toMediaCollection('image');
        }
        return redirect()->route('banner.index')->withSuccess('Data Create SuccessFully...');
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
        //
        $banners = Banner::where('id', $id)->first();
        return view('banner.edit', compact('banners'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Banner $banner)
    {
        $request->validate([
            'name'=> 'required',
            'image'=> 'required'
        ]);

        $banners = $request->only('name','image');
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $banner->clearMediaCollection('image');
            $banner->addMediaFromRequest('image')->toMediaCollection('image');
        }
        Banner::where('id', $banner->id)->update($banners);
        return redirect()->route('banner.index')->withSuccess('Data Update SuccessFully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Banner::where('id', $id)->delete();
        return redirect()->route('banner.index')->withSuccess('Data Update SuccessFully');

    }
}
