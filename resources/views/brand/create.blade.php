@extends('layout.admin')
@section('section_data')
        <div class="banner">
            <section>
                <div class="banner2"><br><br>
                <div id="data"></div><br><br>
                <h2 style="font-size:40px;">brand Data</h2>
                <div class="formstart">
                    <form action="{{route('brand.store')}}" method="post"  enctype="multipart/form-data">
                        @csrf
                    <label for="">Name</label>
                    <input type="text" name="name" value="{{old('name')}}" ><br>
                    @error('name')
                       <div class="error"> {{ $message }}</div>
                    @enderror

                    <label for="">Image</label>
                    <input type="file" name="image" value="{{old('image')}}" ><br>

                    <label for="">Status</label>
                    <select name="status" id="" value="{{old('status')}}">
                        <option value="">-- Select One --</option>
                        <option value="1">Enabile</option>
                        <option value="2">Disable</option>
                    </select><br><br>
                    @error('status')
                    <div class="error"> {{ $message }} </div>
                    @enderror
                    
                    
                    <label for="">Description</label><br>
                    <textarea name="description" >{{old('description')}}</textarea><br><br>
                    @error('description')
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
