@extends('layout.admin')
@section('section_data')
        <div class="banner">
            <section>
                <div class="banner2"><br><br>
                <div id="data"></div><br><br>
                <h2 style="font-size:40px;">Block Data</h2>
                <div class="formstart">
                    <form action="{{ route('block.update', $blocks->id)}}" method="post">
                        @csrf
                        @method('PUT')
                    <label for="">Name</label>
                    <input type="text" name="name" value="{{ $blocks->name }}" ><br>
                    @error('name')
                       <div class="error"> {{ $message }}</div>
                    @enderror

                    <input type="text" name="heading" value="{{ $blocks->heading }}" ><br>
                    @error('heading')
                       <div class="error"> {{ $message }}</div>
                    @enderror
                    
                    <label for="">Status</label>
                    <select name="status" id="" value="{{ $blocks->status }}">
                        <option value="1">Enable</option>
                        <option value="2">Disable</option>
                    </select><br><br>
                    @error('status')
                       <div class="error"> {{ $message }}</div>
                    @enderror

                    <label for="">Description</label>
                    <textarea name="description">{{ $blocks->description }}</textarea><br><br>
                    @error('description')
                       <div class="error"> {{ $message }}</div>
                    @enderror

                    <label for="">Identifire</label>
                    <textarea name="identifier">{{ $blocks->identifier }}</textarea><br><br>
                    @error('identifier')
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
