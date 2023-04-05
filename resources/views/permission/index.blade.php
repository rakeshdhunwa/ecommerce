@extends('layout.admin')
@section('section_data')
        <div class="banner">
            <section>
                <div class="banner2"><br><br>
                <div id="data"></div><br><br>
                <h2 style="font-size:40px;">Permission Data</h2>
                <button id="add" style="width:auto;"><a href="{{route('permission.create')}}">Add New Data</a></button>
                 <table id="table">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>

                    @foreach($permissions as $permission)
                    <tr>
                        <td>{{ $permission->id }}</td>
                        <td>{{ $permission->name }}</td>
                        <td><button id="edit"><a href="{{route('permission.edit', $permission->id)}}">Edit</a></button></td>
                        <td>
                            <form action="{{route('permission.destroy', $permission->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                    <input type="submit" name="delete" value="Delete" id="delete">
                            </form>
                        </td>
                    </tr>
                    @endforeach
                 </table>
                </div>
            </section>
        </div>
@endsection
