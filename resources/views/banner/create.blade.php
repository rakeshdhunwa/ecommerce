@extends('layout.admin')
@section('section_data')
        <div class="banner">
            <section>
                <div class="banner2"><br><br>
                <div id="data"></div><br><br>
                <h2 style="font-size:40px;">Banner Data</h2>
                <div class="formstart">
                    <form action="{{route('banner.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                    <label for="">Name</label>
                    <input type="text" name="name" value="{{old('name')}}" ><br>
                    @error('name')
                       <div class="error"> {{ $message }}</div>
                    @enderror

                    <label for="">Image</label>
                    <input type="file" name="image" ><br>
                    @error('image')
                       <div class="error"> {{ $message }}</div>
                    @enderror
                    <label for="">Status</label>
                    <select name="status" id="">
                        <option value="1">Enable</option>
                        <option value="2">Disable</option>
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
