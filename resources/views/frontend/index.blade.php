@extends('layout.frontend')
@section('section_data')
<section class="section1">
                <div class="owl-carousel banner1">
                   @foreach($banners as $banner)
                        <div class="item" >
                        <img src="{{$banner->getFirstMediaUrl('image')}}">                        </div>
                   @endforeach
                </div>
                <h2>Canada's #1 Online Perfume Store</h2>
            </section>
        </div>
        <!-- banner1 end -->

        <div class="red"></div>
        <section class="section2">
            <div class="countroner">
                <h3>NEW ARRIVALS</h3>
                <div class="owl-carousel banner2">
                  @foreach($products as $product)
                    <div class="c-slider">
                            <img src="{{$product->getFirstMediaUrl('image')}}">
                            <h4><a href="{{route('products', $product->id)}}" id="text">{{ $product->name }}</a></h4>
                            
                            <p><a href="" id="text" style="color:red;">{{ $product->price }}</a></p>
                            <span><a href="" id="text">{{ $product->sku }}</a></span>
                            <span>{{ $product->short_description }}</span><br>
                            <!-- <span>{!! $product->description !!}</span> -->
                            <button><a href=""> ADD TO CART</a></button>
                        </div>
                  @endforeach
                </div>
            </div>
        </section>

        <section class="section2">
            <div class="countroner">
                <h3>BEST SELLERS</h3>
                <div class="owl-carousel banner2">
                    <div class="c-slider">
                        <img src="{{ asset('img/gift-card_695fbded-0530-48fa-a6e5-75be0dff0e75_300x.avif')}}">
                        <h4>Perfumeonline.ca</h4>
                        <span>Trussardi donna sound of donna</span>
                        <p>$33.95 CAD</p>
                        <button><a href=""> SELECT OPTION</a></button>
                    </div>
                    <div class="c-slider">
                        <img src="{{ asset('img/DG-KING-100ML-EDT-MEN_300x.avif')}}">
                        <h4>DOLCE GABBANA</h4>
                        <span>
                            Davidoff cool water street fighter
                          </span>
                        <p>$31.25 CAD</p>
                        <button><a href=""> SELECT OPTION</a></button>
                    </div>
                    <div class="c-slider">
                        <img src="{{ asset('img/MANCERA-WILD-ROSE-AOUD_300x.avif')}}">
                        <h4>MANCERA</h4>
                        <span> 
                            Armani code parfum
                        </span>                        
                        <p>$33.15 CAD</p>
                        <button><a href=""> SELECT OPTION</a></button>
                    </div>
                    <div class="c-slider">
                        <img src="{{ asset('img/CH_BAD_BOY_100ML_EDP_MEN_300x.avif')}}">
                        <h4>Carolina Herrera</h4>
                        <span>
                            Armand basi l'eau pour homme
                          </span>
                        <p>$23.15 CAD</p>
                        <button><a href=""> SELECT OPTION</a></button>
                    </div>
                </div>
            </div>
        </section>
@endsection