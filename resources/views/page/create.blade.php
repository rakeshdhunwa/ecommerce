@extends('layout.admin')
@section('section_data')
        <div class="banner">
            <section>
                <div class="banner2"><br><br>
                <div id="data"></div><br><br>
                <h2 style="font-size:40px;">Category Data</h2>
                <div class="formstart">
                    <form action="{{ route('page.store')}}" method="post">
                        @csrf
                    <label for="">Name</label>
                    <input type="text" name="name" value="" ><br>
                    @error('name')
                       <div class="error"> {{ $message }}</div>
                    @enderror

                    <label for="">Status</label>
                    <select name="status" id="">
                        <option value="1">Enable</option>
                        <option value="2">Disable</option>
                    </select>
                    @error('status')
                    <div class="error"> {{ $message }} </div>
                    @enderror

                    <label for="">Heading</label>
                    <input type="text" name="heading" value="" ><br>
                    @error('heading')
                       <div class="error"> {{ $message }}</div>
                    @enderror

                    <label for="">Description</label><br>
                    <textarea name="description"></textarea><br>
                    @error('description')
                       <div class="error"> {{ $message }}</div>
                    @enderror

                    <label for="">Url_key</label>
                    <input type="url" name="url_key" value="" ><br>
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
