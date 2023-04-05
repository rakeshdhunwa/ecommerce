@extends('layout.frontend')
@section('section_data')
        <div class="countroner">
            <div class="categorypage">
              
            <div class="slide-left">
                  
                    <h3>PERFUMES CATEGORY</h3>

                    <ul>
                        <li><a href=""> New arrivals</a> </li>
                        <li><a href=""> Best seller</a> </li>
                        <li><a href=""> Clearance sales</a> </li>
                    </ul>
                </div>
                <div class="product-right1">
                    <div class="product-full">
                        <div class="product-item">
                            <img src="{{$product->getFirstMediaUrl('image')}}">
                        </div>

                        <div class="product-item">
                            <h2>{{$product->name}} <span>Gift Cards</span> </h2>
                            <p><b>Brand:</b> Perfumeonline.ca</p>
                            <h3>{{$product->price}}</h3>
                            <h3>{{$product->category}}</h3>
                            <p> {{$product->short_description}}</p>
                            <form action="">
                                <label for="">Denominations*</label><br>
                            </form>
                                <input type="text" palceholder="$10.00"><br><br>
                                <p>{!! $product->description !!}</p>
                                <p><b>Quantity:</b></p>
                                <div class="qty-group">
                                    <ul>
                                        <li><a href="">-</a></li>
                                        <li><a href="">1</a></li>
                                        <li><a href="">+</a></li>
                                    </ul><br>
                                    <p><b>Subtotal: $10.00 CAD</b></p>
                                    <button id="add-cart"><a href="{{route('cart', $product->id)}}">ADD To CART </a></button><br>
                                    <button id="add-cart"><a href="">OUT OF STOCK? NOTIFE ME</a> </button><br>
                                    <button id="add-wish"><a href="">ADD To WISHLISt</a> </button><br><br>
                                    <p>0 Customers are viewing this product</p>
                                   
                                </div>
                               
                        </div>
                        
                    </div>
                    <hr id="phr"> <br><br>
                    <div class="cat-banner">
                        @foreach($products as $_products)
                            <div class="product1">             
                                <span class="sale">Sale</span>

                                <a href="{{route('article-list', $_products->url_key )}}"><img src="{{$_products->getFirstMediaUrl('image')}}" / width="120px"></a>
                                <h4>{{ $_products->name }}</h4>
                                <p><a href="">{{ $_products->short_description }}<span>Men</span></a></p>
                                <h5>from <span>{{ $_products->price }} CAD</span></h5>
                                <img src="{{ asset('img/images.jpg')}}" width="100px" alt=""><span>181 reviews</span><br>
                                <button>SELECT OPTION</button>
                            </div>
                        @endforeach
                            <!-- <div class="product1">             
                                <span class="sale">Sale</span>
                                <a href=""><img src="{{ asset('img/NAUVOY200M_300x.avif')}}" width="100%"alt=""></a>
                                <h4>NAUTICA</h4>
                                <p><a href="">  Nautica voyage<span>Men</span></a></p>
                                <h5>$48.00 CAD <span>from $9.95 CAD</span></h5> 
                                <img src="{{ asset('img/images.jpg')}}" width="100px" alt=""><span>90 reviews</span><br>
                                <button>SELECT OPTION</button>
                            </div>

                            <div class="product1">             
                                <span class="sale">Sale</span>
                                <a href=""><img src="{{ asset('img/Versace-Eros-Men_300x.avif')}}" width="100%"alt=""></a>
                                <h4>Versace eros</h4>
                                <p><a href="">Versace eros<span>Men</span></a></p>
                                <h5>from <span>$8.95 CAD</span></h5>
                                <img src="{{ asset('img/images.jpg')}}" width="100px" alt=""><span>80 reviews</span><br>
                                <button>SELECT OPTION</button>
                            </div>

                            <div class="product1">             
                                <span class="sale">Sale</span>
                                <a href=""><img src="{{ asset('img/ACQUA_DI_GIO_100ML_EDT_MEN_300x.avif')}}" width="100%"alt=""></a>
                                <h4>GIORGIO ARMANI</h4>
                                <p><a href="">  Acqua di gio<span>Men</span></a></p>
                                <h5>$58.00 CAD <span>$19.95 CAD</span></h5>
                                <img src="{{ asset('img/images.jpg')}}" width="100px" alt=""><span>64 reviews</span><br>
                                <button>SELECT OPTION</button>
                            </div> -->
                        </div>
                </div>
                
            </div>
            
        </div>
@endsection