@extends('layout.admin')
@section('section_data')
        <div class="banner">
            <section>
                <div class="banner2"><br><br>
                <div id="data"></div><br><br>
                <h2 style="font-size:40px;">Category Data</h2>
                <button style="width:auto;"><a href="{{route('product_category.create')}}">Add New Data</a></button>
                <table id="table">
                    <tr>
                        <th>Id</th>
                        <th>Product Id</th>
                        <th>Category Id</th>
                        <th colspan="2">Action</th>
                    </tr>

                    @foreach($categorys as $ctaegory)
                    <tr>
                        <td>{{ $ctaegory->id}}</td>
                        <td>{{ $ctaegory->product_id}}</td>
                        <td>{{ $ctaegory->category_id}}</td>
                        <td><button id="edit"><a href="{{route('product_category.edit', $ctaegory->id)}}">Edit</a></button></td>
                        <td>
                            <form action="{{route('product_category.destroy', $ctaegory->id)}}" method="post">
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
