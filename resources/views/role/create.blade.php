@extends('layout.admin')
@section('section_data')
    <div class="banner">
        <section>
            <div class="banner2"><br><br>
                <div id="data"></div><br><br>
                <h2 style="font-size:40px;">Create Role Form</h2>
                    
                @if(Session::has('success'))
                    {{Session::get('success')}}
                @endif
                <div class="formstart">
                <form action="{{ route('role.store')}}" method="post">
                    @csrf
                            <label for="">Name</label>
                            
                            <input type="text" name="name">
                                @error('name')
                                    <div class="error">  {{$message}};</div> 
                                @enderror
                            <label for="">Name</label>
                            
                            @foreach($permissions as $permissio)

                            <div><input type="checkbox" name="permissions[]" id="<?=$permissio->name?>" value="<?=$permissio->name?>" style="width:auto;">
                            <label for="<?=$permissio->name?>"><?=$permissio->name?></label></div>
                            @endforeach
                                @error('name')
                                    <div class="error">  {{$message}};</div> 
                                @enderror
                        <button id="submit1" name="submit" value ="submit">Submit</button>
                </form>
                </div>
            </div>
        </section>
    </div>
 
@endsection