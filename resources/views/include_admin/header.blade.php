<header>
    <div class="mobilemenu">
        <span></span>
        <span></span>
        <span></span>
    </div>
    <h2>Laravel</h2>
   <marquee behavior="" direction="right"> <span>User : {{ Auth::user()->name}}</span></marquee>
        <ul>
            <li><a href="#"><i class="fa-regular fa-bell"></i></a></li>
            <li ><a href="#"><img src="img/rd.jpg" alt="" style="margin-top:-5px;border-radius: 50px;"></a></li>
                
            </li>
                <li><a href="{{route('logout')}}"><ion-icon name="log-out-outline" style="margin-right:5px;"></ion-icon>Logout</a></li>
        </ul>
</header>