@extends('layout.admin')
@section('section_data')
        <div class="banner">
            <section>
                <div class="banner2"><br><br>
                <div id="data"></div><br><br>
                <h2 style="font-size:40px;">Category Data</h2>
                <div class="formstart">
                    <form action="{{route('banner.update', $banners->id )}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                    <label for="">Name</label>
                    <input type="text" name="name" value="{{ $banners->name }}" ><br>
                    @error('name')
                       <div class="error"> {{ $message }}</div>
                    @enderror

                    <label for="">Image</label>
                    <input type="file" name="image" value="{{ $banners->image }}"><br>
                    @error('image')
                       <div class="error"> {{ $message }}</div>
                    @enderror

                    <label for="">Status</label>
                    <select name="status" id="">
                        <option value="1" {{ $banners->status==1?'selected':'' }}>Enable</option>
                        <option value="2" {{ $banners->status==2?'selected':'' }}>Disable</option>
                    </select>
                    @error('status')
                       <div class="error"> {{ $message }}</div>
                    @enderror
                    <input type="submit" name="submit">
                    </form>
                </div>
                </div>
            </section>
        </div>
@endsection
