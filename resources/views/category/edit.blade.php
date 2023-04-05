@extends('layout.admin')
@section('section_data')
        <div class="banner">
            <section>
                <div class="banner2"><br><br>
                <div id="data"></div><br><br>
                <h2 style="font-size:40px;">Category Data</h2>
                <div class="formstart">
                    <form action="{{route('category.update', $categories->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                    <label for="">Name</label>
                    <input type="text" name="name" value="{{ $categories->name }}" ><br>
                    @error('name')
                       <div class="error"> {{ $message }}</div>
                    @enderror

                    <label for="">Status</label>
                    <select name="status" id="" value="{{ $categories->status }}">
                        <option value="">-- Select One --</option>
                        <option value="1" {{ $categories->status==1?'selected':'' }}>Enabile</option>
                        <option value="2" {{ $categories->status==2?'selected':'' }}>Disable</option>
                    </select><br><br>
                    @error('status')
                    <div class="error"> {{ $message }} </div>
                    @enderror
                    
                    <label for="">show_in_menu</label>
                    <select name="show_in_menu" id="" value="{{ $categories->show_in_menu }}">
                        <option value="">-- Select One --</option>
                        <option value="1" {{ $categories->show_in_menu==1?'selected':'' }}>Yes</option>
                        <option value="2" {{ $categories->show_in_menu==2?'selected':'' }}>No</option>
                    </select><br><br>
                    @error('show_in_menu')
                       <div class="error"> {{ $message }}</div>
                    @enderror


                    <label for="">parent_id</label>
                    <input type="number" name="parent_id" value="{{ $categories->parent_id }}" ><br>
                    @error('parent_id')
                       <div class="error"> {{ $message }}</div>
                    @enderror

                    <label for="">short_description</label><br>
                    <textarea name="short_description" >{{ $categories->short_description }}</textarea><br><br>
                    @error('short_description')
                       <div class="error"> {{ $message }}</div>
                    @enderror

                    <label for="">Description</label><br>
                    <textarea name="description" >{{ $categories->description }}</textarea><br><br>
                    @error('description')
                       <div class="error"> {{ $message }}</div>
                    @enderror

                    <label for="">thumbnail_image</label>
                    <input type="file" name="thumbnail_image" value="{{ $categories->thumbnail_image }}" ><br>
                    @error('thumbnail_image')
                       <div class="error"> {{ $message }}</div>
                    @enderror

                    <label for="">banner_image</label>
                    <input type="file" name="banner_image" value="{{ $categories->banner_image }}" ><br>
                    @error('banner_image')
                       <div class="error"> {{ $message }}</div>
                    @enderror

                    <label for="">is_featured</label><br>
                    <select name="is_featured" id="" >
                        <option value="1" {{ $categories->is_featured==1?'selected':''}}>Yes</option>
                        <option value="2" {{ $categories->is_featured==2?'selected':''}}>No</option>
                    </select><br><br>
                    @error('is_featured')
                       <div class="error"> {{ $message }}</div>
                    @enderror   


                    <label for="">url_key</label>
                    <input type="text" name="url_key" value="{{ $categories->url_key }}" ><br>
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
