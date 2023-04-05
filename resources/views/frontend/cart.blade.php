@extends('layout.frontend')
@section('section_data')
        <div class="cart">
            <div class="fullcart">
                <h1>YOUR CART</h1>
                @if(isset($items))
                @foreach($items as $item)
                <div class="cartleft">
                    
                    <div class="cartitem" >
                        @foreach($item->products as $prodct)
                        <img src="{{ $prodct->getFirstMediaUrl('image')}}" alt="" width="100px">
                        @endforeach
                    </div>
                    <div class="cartitem">
                        <p>Armaf tres nuit lyric</p>
                        <p>100ML EDP</p>
                        <p>Armaf</p>
                        <h4>$84.75 CAD</h4>
                        <ul>
                            <li><a href="">-</a></li>
                            <li><a href="">3</a></li>
                            <li><a href="">+</a></li>
                        </ul>
                        <button type="button" class="cbutton"><a href="">UPDATE CART</a></button>
                        
                        <button type="button" class="cbutton"><a href="">REMOVE</a></button>
                    </div>
                </div>
                @endforeach
                <div class="cratright">
                <p>SUBTOTAL</p>
                    <div class="ccolor">
                    
                    <h4>$85.73 CAD</h4>
                    <p>or 4 interest-free payments of $21.25 with</p>
                    <p>Additional comments</p>
                    <p>Add shipping protection for $0.98</p>
                    <button class="catrbiutton"><a href="">PROCEED TO CHECKOUT</a></button>
                    <p style="color:red;">Shipping Note: A signature or verbal Confirmation might be required by the carrier for orders over $150</p>
                    </div>
                </div>
                @endif
            </div>
        </div>
 @endsection