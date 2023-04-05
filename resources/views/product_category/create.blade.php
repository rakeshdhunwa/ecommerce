@extends('layout.admin')
@section('section_data')
        <div class="banner">
            <section>
                <div class="banner2"><br><br>
                <div id="data"></div><br><br>
                <h2 style="font-size:40px;">Category Data</h2>
                <div class="formstart">
                    <form action="{{ route('product_category.store')}}" method="post">
                        @csrf
                    <label for="">Product Id</label>
                    <input type="text" name="product_id" value="" ><br>
                    @error('product_id')
                       <div class="error"> {{ $message }}</div>
                    @enderror

                    <label for="">Category Id</label>
                    <input type="text" name="category_id" value=""><br>
                    @error('category_id')
                    <div class="error"> {{ $message }} </div>
                    @enderror

                    <input type="submit" name="submit">
                    </form>
                </div>
                </div>
            </section>
        </div>
@endsection
