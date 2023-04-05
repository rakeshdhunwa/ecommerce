 
            @include('include_admin.head')
            
            <div class="formstart">
                <form action="{{route('formpost')}}" method="post">   
                @if(Session::has('success'))
                {{Session::get('success')}}
            @endif 
                    @csrf  
                    <br>
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
                    <input type="submit" name="submit" id="submit">

                </form>
            </div>
   
