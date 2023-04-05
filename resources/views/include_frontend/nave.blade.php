<nav class="nave">
    <div class="countroner">
        <ul>
             <li><a href="{{('/')}}">Home</a></li>
            <!--<li><a href="{{route('categories')}}">Category</a></li>-->
            <li><a href="{{route('contact')}}">Contact</a></li>

            @foreach(getMenu() as $category)

            <li><a href="{{route('category-list', $category->url_key)}}">{{ $category->name }}</a></li>

            @endforeach
        </ul>
    </div>
</nav>