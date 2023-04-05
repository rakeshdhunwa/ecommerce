@extends('layout.admin')
@section('section_data')
        <div class="banner">
            <section>
                <div class="banner2"><br><br>
                <div id="data"></div><br><br>
                <h2 style="font-size:40px;"> Product Data</h2>
                <button id="add" style="width:auto;"><a href="{{route('product.create')}}">Add New Data</a></button>
                @if(Session::has('success'))
        {{Session::get('success')}}
    @endif
                <div class="overfolow">
                  
                    <div class="container mt-5">
                        <table class="table table-bordered yajra-datatable">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Status</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Price</th>
                                        <th>special_price</th>
                                        <th>special_price_to </th>
                                        <th>category</th>
                                        <!-- <th>url_key</th> -->
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                        </table>
                    </div>
                </div> 
            </div>
            </section>
        </div>
        </body>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
  $(function () {
    
    var table = $('.yajra-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('product.list') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'status', name: 'status'},
            {data: 'name', name: 'name'},
            {data: 'image', name: 'image'},
            {data: 'price', name: 'price'},
            {data: 'special_price', name: 'special_price'},
            {data: 'special_price_to', name: 'special_price_to'},
            {data: 'category', name: 'category.name'},
            // {data: 'url_key', name: 'url_key'},
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
        ]
    });
    
  });
</script>
@endsection
