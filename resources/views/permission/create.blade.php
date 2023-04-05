@extends('layout.admin')
@section('section_data')
    <div class="banner">
        <section>
            <div class="banner2"><br><br>
                <div id="data"></div><br><br>
                <h2 style="font-size:40px;">Permission Form</h2>
                    
                @if(Session::has('success'))
                    {{Session::get('success')}}
                @endif
                <div class="formstart">
                <form action="{{route('permission.store')}}" method="post">
                    @csrf
                    <table  cellspacing=0 id="table">
                        <tr>
                            <th><label for="">Name</label></th>
                            <td>
                                <input type="text" name="name">
                                    @error('name')
                                      <div class="error">  {{$message}};</div> 
                                    @enderror
                            </td>
                        </tr>

                     
                        <tr>
                            <th colspan="2">
                                <button id="submit1" name="submit" value ="submit">Submit</button>
                            </th>
                        </tr>
                    </table>
                </form>
                </div>
            </div>
        </section>
    </div>
 
@endsection