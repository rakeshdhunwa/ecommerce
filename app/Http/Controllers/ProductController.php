<?php

namespace App\Http\Controllers;
use Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Product;
use App\Models\Category;
use DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy('id', 'DESC')->paginate(5);
        return view('product.index', compact('products'));
    }
    public function getProduct(Request $request)
    {
        if ($request->ajax()) {
            $data = Product::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                
                ->addColumn('image', function($row){
                    $pimage = $row->getFirstMediaUrl('image');
                    return '<img src='.$pimage.'  width="50"/>'; 
            })
                ->addColumn('category', function($row){
                    $cat = "";
                    foreach($row->catigers as $_cat){
                    $cat.= $_cat->name." | ";
                    }
                    return $cat;
                   
                })
                ->addColumn('status', function($row){
                    if($row->status == 1){
                        return "Enable";
                    }else{
                        return "Disable";
                    }
                })
                ->addColumn('action', function(Product $product){

                   
                    $actionBtn = '<a href="'.route('product.edit', $product->id).'" class="edit btn btn-success btn-sm">Edit</a>
                     <form action="'.route('product.destroy', $product->id).'" method="post" style="background: transparent;width:auto;padding:0;">
                     '.csrf_field().'
                     '.@method_field("DELETE").'
                     <input type="submit"value="DELETE" class="delete btn btn-danger btn-sm">
                     </form>';
                    return $actionBtn;
                })
                ->rawColumns(['action','catigers','image'])
                ->make(true);
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        return view('product.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'status' => 'required',
            'name' => 'required',
            'sku' => 'required',
            'price' => 'required',
            'special_price' => 'required',
            'special_price_from' => 'required',
            'special_price_to' => 'required',
            'url_key' => 'required',
            'qty' => 'required',
            'stock_status' => 'required',
        ]);

        $productAll = $request->all();
        $categoryId = $productAll['category'];
        $productAll['category']= implode("|",$productAll['category']);
        // echo "<pre>";
        // print_r($productAll['category']);
        // die;
        $data = [
            'status' =>($productAll['status']==1)??"selected",
            'name' =>$productAll['name'],
            'sku' =>$productAll['sku'],
            'price' =>$productAll['price'],
            'special_price' =>$productAll['special_price'],
            'special_price_from' =>$productAll['special_price_from'],
            'special_price_to' =>$productAll['special_price_to'],
            'category'=>$productAll['category'],
            'short_description' =>$productAll['short_description'],
            'description' =>$productAll['description'],
            'url_key' =>$productAll['url_key'],
            'qty' =>$productAll['qty'],
            'stock_status' =>$productAll['stock_status'],
        ];

       $product =  Product::create($data);
        $product->catigers()->sync($categoryId);
      
       
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $product->addMediaFromRequest('image')->toMediaCollection('image');
        }
        if($request->hasFile('thumbnail_image') && $request->file('thumbnail_image')->isValid()){
            $product->addMediaFromRequest('thumbnail_image')->toMediaCollection('thumbnail_image');
        }
        
        return redirect()->route('product.index')->withSuccess('Data Create SuccessFully....');
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
        $products = Product::where('id', $id)->first();
        $category = Category::where('status', 1)->get();
        return view('product.edit', compact('products','category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        // echo "<pre>";
        // print_r($request->all());
        // die;
        $request->validate([
            'status' => 'required',
            'name' => 'required',
            'sku' => 'required',
            'price' => 'required',
            'special_price' => 'required',
            'special_price_from' => 'required',
            'special_price_to' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'url_key' => 'required',
            'qty' => 'required',
            'stock_status' => 'required',
        ]);

        $productAll = $request->only('status','name','sku','price','special_price','special_price_from','special_price_to','category','short_description','description','url_key','qty','stock_status');
        $pre = $request->all();
       if(isset($pre['categorys'])){
        $categoryId = $pre['categorys'];
        
        $pre['categorys'] = implode("|", $pre['categorys']);
        $product->catigers()->sync($categoryId);
       }

       Product::where('id', $product->id)->update($productAll);
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $product->clearMediaCollection('image');
            $product->addMediaFromRequest('image')->toMediaCollection('image');
        }

        if($request->hasFile('thumbnail_image') && $request->file('thumbnail_image')->isValid()){
            $product->clearMediaCollection('thumbnail_image');
            $product->addMediaFromRequest('thumbnail_image')->toMediaCollection('thumbnail_image');
        }
       
        return redirect()->route('product.index')->withSuccess('Data Update SuccessFully');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Product::where('id', $id)->delete();
        return redirect()->route('product.index')->withSuccess('Data Delete SuccessFully.....');
    }
}
