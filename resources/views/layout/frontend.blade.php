<!DOCTYPE html>
<html lang="en">
<head>
 @include('include_frontend.head')
</head>
<body>
    <!--  header start -->
    @include('include_frontend.header')
    <!-- header End -->

        <!-- nave start -->
        @include('include_frontend.nave')
        <!-- nave End -->
        <!-- banner1 start -->
       @yield('section_data')
        
        @include('include_frontend.footer')
</body>
</html>