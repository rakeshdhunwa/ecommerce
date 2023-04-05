@extends('layout.admin')
@section('section_data')
        <div class="banner">
            <section>
                <div class="banner2"><br><br>
                <div id="data"></div><br><br>
                <h2 style="font-size:40px;">Welcome Dashboard</h2>
                @if(Session::has('success'))
        {{Session::get('success')}}
    @endif
                </div>
            </section>
        </div>
@endsection
