@extends('layout.admin')
@section('section_data')
        <div class="banner">
            <section>
                <div class="banner2"><br><br>
                <div id="data"></div><br><br>
                <h2 style="font-size:40px;">Brand Data</h2>
                <button style="width:auto;"><a href="{{route('brand.create')}}">Add New Data</a></button>
                    <table id="table">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Status</th>
                            <!-- <th>Image</th> -->
                            <th>Description</th>
                            <th colspan="2">Action</th>
                        </tr>
                        @php
                            $i=1;
                        @endphp
                        @foreach($brands as $brand)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $brand->name }}</td>
                                <td><img src="{{$brand->getFirstMediaUrl('image')}}" / width="120px"></td>
                                <td>{{ $brand->status==1?'Enable':'Disabled' }}</td>
                                <td>{{ $brand->description }}</td>
                                <td><button id="edit"><a href="{{route('brand.edit',$brand->id)}}">Edit</a></button></td>
                                <td><form action="{{route('brand.destroy',$brand->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" name="delete" value="DELETE" id="delete">
                                </form></td>
                            </tr>

                        @endforeach
                    </table>
                </div>
            </section>
        </div>
@endsection
