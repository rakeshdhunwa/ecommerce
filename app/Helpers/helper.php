<?php
use App\Models\Category;
use App\Models\Quote;
use App\Models\Quote_item;

if(!function_exists('getMenu')) {
    function getMenu() {
        $categories = Category::where('status', 1)->where('show_in_menu', 1)->get();
        return $categories;
    }
}

if(!function_exists('tolcartitems')) {
    function tolcartitems() {
        $tolcartitems = 0;
        $session_id = session('cart_id');
        if($session_id){
            $p = Quote::where('cart_id', $session_id)->first();
            $c = $p->id;
            $tolcartitems = Quote_item::where('quote_id', $c)->sum('qty');
            return $tolcartitems;  
        }
        return $tolcartitems;
    }
}

?>