<!DOCTYPE html>
<html lang="en">
<head>
    @include('include_admin.head')
</head>
<body>
   <div class="formcountrner">
    @if(Session::has('error'))
        {{Session::get('error')}}
    @endif
    <div class="form">
        <form action="{{route('loginpost')}}" method="post">
           @csrf
            <div class="headingsContainer">
                <h3>Sign in</h3><br>
                <p>Sign in with your username and password</p>
            </div>

            <div class="mainContainer">
                <br><br>
                <label for="pswrd">Your Email</label>
                <input type="email" placeholder="Enter Email" name="email">
                @error('email')
                    <div>{{ $message }}</div>
                @enderror

                <br><br>

                <label for="pswrd">Your password</label>
                <input type="password" placeholder="Enter Password" name="password">
                @error('password')
                    <div>{{ $message }}</div>
                @enderror
                <div class="subcontainer">
                    <label>
                    <input type="checkbox" checked="checked" name="remember"> Remember me
                    </label>
                    <p class="forgotpsd"> <a href="#">Forgot Password?</a></p>
                </div>

                <button type="submit">Login</button>

                <p class="register">Not a member?  <a href="{{route('register')}}">Register here!</a></p>
            </div>

        </form>
    </div>
    </div>
</body>
</html>
