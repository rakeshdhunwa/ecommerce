@extends('layout.frontend')
@section('section_data')
        <div class="countroner">
            <div class="categorypage">
                <div class="slide-left">
                    <h1>Men's cologne</h1>
                    <h3>PERFUMES CATEGORY</h3>

                    <ul>
                        <li><a href=""> New arrivals</a> </li>
                        <li><a href=""> Best seller</a> </li>
                        <li><a href=""> Clearance sales</a> </li>
                    </ul>
                    <h3>SHOP BY BRAND</h3>
                    <ul>
                        <li><a href="">Abercrombi & fitch</a> </li>
                        <li><a href=""> A lab on fire</a> </li>
                        <li><a href=""> Adidas</a> </li>
                        <li><a href=""> Anatomy</a> </li>
                        <li><a href=""> Arabian oud</a> </li>

                        <li><a href="">Visconti di modrone</a> </li>
                        <li><a href=""> Worth</a> </li>
                        <li><a href=""> Xerjoff</a> </li>
                        <li><a href=""> Yardley</a> </li>
                        <li><a href=""> Arabian oud</a> </li>
                    </ul>
                    <h3>SHOP BY PRICE</h3>
                    <ul>
                        <li><a href="">$20 and under</a> </li>
                        <li><a href=""> $20 to $40 </a> </li>
                        <li><a href=""> $40 and up</a> </li>
                        
                    </ul>
                </div>
                    <div class="slide-right">
                        <div class="cat-top">
                            <img src="{{$category->getFirstMediaUrl('banner_image')}}" alt="">
                            <h4>{{$category->short_description}}</h4>
                            <p>{!! $category->description !!}</p>
                        </div>
                        <div class="cat-section">
                            <ul>
                                <li><a href="">VIEW AS<ion-icon name="apps-outline"></ion-icon></a></li>
                                <li><a href="">ITEMS PER PAGE <select name="" id="">
                                    <option value="">10</option>
                                    <option value="">140</option>
                                    <option value="">102</option>
                                    <option value="">140</option>
                                    <option value="">120</option>
                                </select></a></li>
                                <li><a href="">SORT BY <select name="" id="">
                                    <option value="">Featured</option>
                                    <option value="">Featured</option>
                                    <option value="">Featured</option>
                                    <option value="">Featured</option>
                                </select></a></li>
                            </ul>
                        </div>
                        <div class="cat-banner">
                            @foreach($products as $_product)
                            <div class="product1">             
                                <span class="sale">Sale</span>
                                <a href="{{route('article-list', $_product->url_key )}}"><img src="{{$_product->getFirstMediaUrl('image')}}" width="100%" alt=""></a>
                                <h4>{{$_product->name}}</h4>
                                <p><a href="">Armaf club de nuit intense<span>Men</span></a></p>
                                <h5>from <span>{{$_product->price}}</span></h5>
                                <img src="img/images.jpg" width="100px" alt=""><span>181 reviews</span><br>
                                <button>SELECT OPTION</button>
                            </div>
                            @endforeach
                        </div>
                    </div>
                
            </div>
        </div>
 @endsection