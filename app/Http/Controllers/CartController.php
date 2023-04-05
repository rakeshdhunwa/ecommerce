<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Quote_item;
use App\Models\Quote;

use App\Models\Product;
class CartController extends Controller
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
  

    public function cart($id){
        $cartId = session('cart_id');
        // print_r($cartId);
        // echo $id;
        // die;
        if($cartId){
            Quote::where('cart_id', $cartId)->update(['cart_id' => $cartId]);
            $quote = Quote::where('cart_id',  $cartId)->first();
            // $quote = Quote::all();
            // echo "<pre>";
            // print_r($quote);
            // die;
            $quoteId = $quote->id;
            // print_r($quoteId);
            // die;
            $product = Product::where('id', $id)->first();

            $quoteData = [
                'quote_id' => $quoteId,
                'product_id' => $id,
                'name' => $product->name,
                'sku' => $product->sku,
                'price' => $product->price,
                'qty' => 1,
                'row_total' =>23,
            ];
            Quote_item::create($quoteData);
            return redirect()->back();
        }else{
            $cartId = Str::random(20);
            session(['cart_id' => $cartId]);

            $data = [
                'cart_id' => $cartId,
            ];
            $quote = Quote::create($data);

            $quoteId = $quote->id;
            $product = Product::where('id', $id)->first();

            $quoteData = [
                'quote_id' => $quoteId,
                'product_id' => $id,
                'name' => $product->name,
                'sku' => $product->sku,
                'price' => $product->price,
                'qty' => 1,
                'row_total' =>23,
            ];
             Quote_item::create($quoteData);
            // print_r($data);
            // die;
            return redirect()->back();
        }

    }
    public function addcart(){
        $cartId = session('cart_id');
        // print_r($cartId);
        // die;
        // if($cartId){
            $quote = Quote::where('cart_id', $cartId)->first();
            // $_id = Quote::all();
            // echo "<pre>";
            // print_r($_id->toArray());
            // die;
            $id = $quote->id;

            $items = Quote_item::where('quote_id', $id)->get();
            return view('frontend.cart', compact('items'));
        // }else{
        //     return view('frontend.cart')->with('error', "Your cart is currently empty.");
        // }
    }

}
