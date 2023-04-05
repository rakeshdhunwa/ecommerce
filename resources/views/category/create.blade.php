@extends('layout.admin')
@section('section_data')
        <div class="banner">
            <section>
                <div class="banner2"><br><br>
                <div id="data"></div><br><br>
                <h2 style="font-size:40px;">Category Data</h2>
                <div class="formstart">
                    <form action="{{route('category.store')}}" method="post"  enctype="multipart/form-data">
                        @csrf
                    <label for="">Name</label>
                    <input type="text" name="name" value="{{old('name')}}" ><br>
                    @error('name')
                       <div class="error"> {{ $message }}</div>
                    @enderror

                    <label for="">Status</label>
                    <select name="status" id="" value="{{old('status')}}">
                        <option value="">-- Select One --</option>
                        <option value="1">Enabile</option>
                        <option value="2">Disable</option>
                    </select><br><br>
                    @error('status')
                    <div class="error"> {{ $message }} </div>
                    @enderror
                    
                    <label for="">show_in_menu</label>
                    <select name="show_in_menu" id="" value="{{old('show_in_menu')}}">
                        <option value="1">Yes</option>
                        <option value="2">No</option>
                    </select>
                    @error('show_in_menu')
                       <div class="error"> {{ $message }}</div>
                    @enderror


                    <label for="">parent_id</label>
                    <input type="number" name="parent_id" value="{{old('parent_id')}}" ><br>
                    @error('parent_id')
                       <div class="error"> {{ $message }}</div>
                    @enderror

                    <label for="">short_description</label><br>
                    <textarea name="short_description" >{{old('short_description')}}</textarea><br><br>
                    @error('short_description')
                       <div class="error"> {{ $message }}</div>
                    @enderror

                    <label for="">Description</label><br>
                    <textarea name="description" >{{old('description')}}</textarea><br><br>
                    @error('description')
                       <div class="error"> {{ $message }}</div>
                    @enderror

                    <label for="">thumbnail_image</label>
                    <input type="file" name="thumbnail_image" value="" ><br>
                    @error('thumbnail_image')
                       <div class="error"> {{ $message }}</div>
                    @enderror

                    <label for="">banner_image</label>
                    <input type="file" name="banner_image" value="" ><br>
                    @error('banner_image')
                       <div class="error"> {{ $message }}</div>
                    @enderror

                    <label for="">is_featured</label><br>
                    <select name="is_featured" id="">
                        <option value="1">Yes</option>
                        <option value="2">No</option>
                    </select><br><br>
                    @error('is_featured')
                       <div class="error"> {{ $message }}</div>
                    @enderror   


                    <label for="">url_key</label>
                    <input type="text" name="url_key" value="{{old('url_key')}}" ><br>
                    @error('url_key')
                       <div class="error"> {{ $message }}</div>
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
