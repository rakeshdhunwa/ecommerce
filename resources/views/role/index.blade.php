@extends('layout.admin')
@section('section_data')
    <div class="banner">
        <section>
            <div class="banner2"><br><br>
            <div id="data"></div><br><br>
            <h2 style="font-size:40px;">Manage Role</h2>
            <button id="buttons"><a href="{{ route('role.create') }}">Add New Role</a></button>
           
            <table id="table">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Permission</th>
                    <th colspan="2">Action</th>
                </tr>
                @php 
                    $i=($_REQUEST['page']??1)*5-4;
                @endphp
                @foreach($roles as $role)
                <tr>
                    <td>{{ $i++}}</td>
                    <td>{{ $role->name }}</td>
                    <td>
                        @foreach($role->permissions as $_permission)
                            {{$_permission->name}} | 
                        @endforeach
                    </td>
                    <td>
                        <button id="edit"><a href="{{route('role.edit', $role->id)}}">Edit</a> </button>
                    </td>
                    <td>
                        <form action="{{route('role.destroy', $role->id )}}" method="post" class="main">
                            @csrf
                            @method('DELETE')
                            <input type="submit" name="delete" value="Delete" class="main" id="delete">
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
            {{ $roles->links() }}

            </div>
        </section>
    </div>
@endsection