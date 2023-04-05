<!DOCTYPE html>
<html lang="en">
<head>
@include('include_admin.head')
@livewireStyles
</head>
<body>
    <div class="contener">
        <div class="navbar">
        @include('include_admin.nave')
        </div>
        <div class="topheader">
        @include('include_admin.header')
        </div> 
        
       @yield('section_data')

    </div>

    @livewireScripts
</body>
</html>