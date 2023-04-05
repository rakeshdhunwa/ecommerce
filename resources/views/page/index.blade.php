@extends('layout.admin')
@section('section_data')
        <div class="banner">
            <section>
                <div class="banner2"><br><br>
                <div id="data"></div><br><br>
                <h2 style="font-size:40px;">Page Data</h2>
                <button style="width:auto;"><a href="{{route('page.create')}}">Add New Data</a></button>
                    <table id="table">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Heading</th>
                            <th>Description</th>
                            <th>Url_key</th>
                            <th colspan="2">Action</th>
                        </tr>

                        @foreach($pages as $page)
                            <tr>
                                <td>{{ $page->id }}</td>
                                <td>{{ $page->name }}</td>
                                <td>{{ $page->status }}</td>
                                <td>{{ $page->heading }}</td>
                                <td>{{ $page->description }}</td>
                                <td>{{ $page->url_key }}</td>
                                <td><button id="edit"><a href="{{route('page.edit',$page->id)}}">Edit</a></button></td>
                                <td><form action="{{route('page.destroy', $page->id)}}" method="post">
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
