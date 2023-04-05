@extends('layout.admin')
@section('section_data')
        <div class="banner">
            <section>
                <div class="banner2"><br><br>
                <div id="data"></div><br><br>
                <h2 style="font-size:40px;">Block Data</h2>
                    <button style="width:auto;"><a href="{{route('block.create')}}">Add New Data</a></button>
                    <table id="table">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Heading</th>
                            <th>Status</th>
                            <th>Description</th>
                            <th>Identifier</th>
                            <th>Action</th>

                            @foreach($blocks as $block)
                                <tr>
                                    <td>{{ $block->id }}</td>
                                    <td>{{ $block->name }}</td>
                                    <td>{{ $block->heading }}</td>
                                    <td>{{ $block->status==1?'Enable':'Disable' }}</td>
                                    <td>{{ $block->description }}</td>
                                    <td>{{ $block->identifier }}</td>
                                    <td><button id="edit"><a href="{{route('block.edit', $block->id)}}">Edit</a></button></td>
                                    <td><form action="{{route('block.destroy', $block->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" name="delete" value="Delete" id="delete">
                                    </form></td>
                                </tr>

                            @endforeach
                        </tr>
                    </table>
                </div>
            </section>
        </div>
@endsection
