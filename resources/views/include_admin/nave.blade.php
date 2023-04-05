            

<nav>
    <div class="logo"><img src="logo-1.png" alt=""></div>
    
   <div class="profile_image"> <img src="{{ Auth::user()->getFirstMediaUrl('profile_image') }}" alt="" ></div>
   <marquee behavior="" direction="right"> <br>{{ Auth::user()->email}}</marquee>
   <h3>Management</h3>
        <ul>
            @can('Dashboard')
            <li id="first"><a href=""><ion-icon name="grid-outline"></ion-icon>Dashboard</a></li>
            @endcan
            @can('student')
            @endcan
            <li><a href="{{route('user.index')}}"><ion-icon name="journal-outline"></ion-icon>User</a></li>
           
            <li><a href="{{route('permission.index')}}"><ion-icon name="cart"></ion-icon>Permission</a></li>
          
            <li><a href="{{route('role.index')}}"><ion-icon name="sync"></ion-icon>Role</a></li>
          
        </ul>
        <hr>
        <h3>Connection</h3>
        <ul>
        <li><a href="{{route('student')}}"><ion-icon name="document-outline"></ion-icon>Student</a></li>

            <li><a href="{{route('product.index')}}"><ion-icon name="chatbubble-ellipses-outline"></ion-icon>Product</a></li>
            <li><a href="{{route('block.index')}}"><ion-icon name="chatbubble-ellipses-outline"></ion-icon>Block</a></li>
            <li><a href="{{route('category.index')}}"><ion-icon name="git-compare-outline"></ion-icon>Category</a></li>
            <li><a href="{{route('page.index')}}"><ion-icon name="git-compare-outline"></ion-icon>Page</a></li>
            <li><a href="{{route('product_category.index')}}"><ion-icon name="chatbubble-ellipses-outline"></ion-icon>Product_category</a></li>
            <li><a href="{{route('banner.index')}}"><ion-icon name="server-outline"></ion-icon>Banner</a></li>
            <li><a href=""><ion-icon name="mail-outline"></ion-icon>Site</a></li>

            <li><a href="{{route('brand.index')}}"><ion-icon name="server-outline"></ion-icon>Brand</a></li>
            <li><a href=""><ion-icon name="mail-outline"></ion-icon>Site</a></li>
        </ul>
        <hr>
        <h3>Customer</h3>
        <ul>
            
        
            <li><a href="#"><ion-icon name="git-compare-outline"></ion-icon>Transaction</a></li>
       
            <li><a href="#"><ion-icon name="settings-outline"></ion-icon>Maintenance</a></li>
        </ul>


        
</nav>