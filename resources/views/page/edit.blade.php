@extends('layout.admin')
@section('section_data')
        <div class="banner">
            <section>
                <div class="banner2"><br><br>
                <div id="data"></div><br><br>
                <h2 style="font-size:40px;">page Data</h2>
                <div class="formstart">
                    <form action="{{ route('page.update', $pages->id)}}" method="post">
                        @csrf
                        @method('PUT')
                    <label for="">Name</label>
                    <input type="text" name="name" value="{{ $pages->name }}" ><br>
                    @error('name')
                       <div class="error"> {{ $message }}</div>
                    @enderror

                    <label for="">Status</label>
                    <select name="status" id="">
                        <option value="1" {{ $pages->status==1?'Enable':'' }}>Enable</option>
                        <option value="2" {{ $pages->status==2?'Disable':'' }}>Disable</option>
                    </select>
                    @error('status')
                    <div class="error"> {{ $message }} </div>
                    @enderror

                    <label for="">Heading</label>
                    <input type="text" name="heading" value="{{ $pages->heading }}" ><br>
                    @error('heading')
                       <div class="error"> {{ $message }}</div>
                    @enderror

                    <label for="">Description</label><br>
                    <textarea name="description">{{ $pages->description }}</textarea><br>
                    @error('description')
                       <div class="error"> {{ $message }}</div>
                    @enderror

                    <label for="">Url_key</label>
                    <input type="url" name="url_key" value="{{ $pages->url_key }}" ><br>
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
