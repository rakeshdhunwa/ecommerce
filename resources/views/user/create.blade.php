@extends('layout.admin')
@section('section_data')
    <div class="banner">
        <section>
            <div class="banner2"><br><br>
                <div id="data"></div><br><br>
                <h2 style="font-size:40px;"></h2>
                    
                @if(Session::has('success'))
                    {{Session::get('success')}}
                @endif
                <div class="formstart">
                    <form action="{{route('user.store')}}" method="post" enctype="multipart/form-data">    
                        @csrf  
                        <label for="">Name</label><br>
                        <input type="text" name="name" value="{{ old('name') }}" require placeholder="Name"><br>
                        @error('name')
                            <div class="error">{{ $message }}</div>
                        @enderror
                        <label for="">Email</label><br>
                        <input type="email" name="email" value="{{ old('email') }}" require placeholder="Email"><br>
                        @error('email')
                            <div class="error">{{ $message }}</div>
                        @enderror
                        <label for="">Password</label><br>
                        <input type="password" name="password" value="" placeholder="Password"><br>
                        @error('password')
                            <div class="error">{{ $message }}</div>
                        @enderror

                        <label for="">Confirm Password</label><br>
                        <input type="password" name="confirm_password" vlaue="" placeholder="Confirm_Password"><br>
                        @error('confirm_password')
                            <div class="error">{{ $message }}</div>
                        @enderror

                        <label for="">Profile Image</label><br>
                        <input type="file" name="profile_image" vlaue=""><br>
                        @error('profile_image')
                            <div class="error">{{ $message }}</div>
                        @enderror

                        @foreach($roles as $role)
                        <div><input type="checkbox" name="roles[]" id="<?=$role->name?>" value="<?=$role->name?>" style="width:auto;">
                        <label for="<?=$role->name?>"><?=$role->name?></label></div>
                        @endforeach
                     
                        <input type="submit" name="submit" id="submit">

                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection