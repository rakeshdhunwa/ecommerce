@extends('layout.admin')
@section('section_data')
        <div class="banner">
            <section>
                <div class="banner2"><br><br>
                <div id="data"></div><br><br>
                <h2 style="font-size:40px;">Product Create</h2>
                <div class="formstart">
                    <form action="{{route('product.update', $products->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <label for="">Status</label>
                        <select name="status" id="" value="{{ $products->status }}">
                        <option>-- Select One --</option>
                            <option value="1" {{ $products->status==1?'selected':''}}>Enable</option>
                            <option value="2" {{ $products->status==2?'selected':''}}>Disable</option>
                        </select><br><br>
                        @error('status')
                            <div class="error">{{ $message }}</div>
                        @enderror

                        <label for="">Name</label>
                        <input type="name" name="name" value="{{ $products->name }}"><br>
                        @error('name')
                            <div class="error">{{ $message }}</div>
                        @enderror
                        <label for="">image</label>
                        <input type="file" name="image" vlaue="" ><br>

                        <label for="">Thumbnail Image</label>
                        <input type="file" name="thumbnail_image" vlaue="" ><br>

                        <label for="">Sku</label>
                        <input type="text" name="sku" value="{{ $products->sku }}"><br>
                        @error('sku')
                            <div class="error">{{ $message }}</div>
                        @enderror
                        <label for="">Price</label>
                        <input type="text" name="price" value="{{ $products->price }}"><br>
                        @error('price')
                            <div class="error">{{ $message }}</div>
                        @enderror
                        <label for="">Special Price </label>
                        <input type="text" name="special_price" value="{{ $products->special_price }}"><br>
                        @error('special_price')
                            <div class="error">{{ $message }}</div>
                        @enderror
                        <label for="">Special Price From  </label>
                        <input type="date" name="special_price_from" value="{{ $products->special_price_from }}"><br>
                        @error('special_price_from')
                            <div class="error">{{ $message }}</div>
                        @enderror
                        <label for=""> special Price To   </label>
                        <input type="date" name="special_price_to" value="{{ $products->special_price_to }}"><br>
                        @error('special_price_to')
                            <div class="error">{{ $message }}</div>
                        @enderror
    <br><br>
                        @foreach($category as $_category)
                        <input type="checkbox" name="categorys[]" value="{{$_category->id}}"
                         id="<?=$_category->name?>" style="width:auto;">
                        <label for="<?=$_category->name?>"><?=$_category->name?></label><br><br>
                        @endforeach



                        @error('category')
                            <div class="error">{{ $message }}</div>
                        @enderror <br><br>
                        <label for="">Short Description</label>
                        <textarea name="short_description">{{ $products->short_description }}</textarea><br>
                        @error('short_description')
                            <div class="error">{{ $message }}</div>
                        @enderror
                        <label for="">description</label>
                        <textarea name="description">{{ $products->description }}</textarea><br>
                        @error('description')
                            <div class="error">{{ $message }}</div>
                        @enderror

                        <label for="">Url key</label>
                        <input type="text" name="url_key" value="{{ $products->url_key }}"><br>                        
                        @error('url_key')
                            <div class="error">{{ $message }}</div>
                        @enderror


                        <label for=""> qty   </label>
                        <input type="text" name="qty" vlaue="{{ $products->qty }}" placeholder="qty"><br>
                        @error('qty')
                            <div class="error">{{ $message }}</div>
                        @enderror

                        <label for=""> stock_status   </label>
                        <select name="stock_status" id="" value="{{ $products->stock_status }}">
                            <option>-- Select One --</option>
                            <option value="1">Yes</option>
                            <option value="2">No</option>
                        </select><br><br>
                        @error('stock_status')
                            <div class="error">{{ $message }}</div>
                        @enderror
                        <input type="submit" name="submit">
                    </form>
                </div>
                </div>
            </section>
        </div>

        <script>
        CKEDITOR.replace( 'description' );
</script>
@endsection
