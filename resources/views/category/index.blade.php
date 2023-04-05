@extends('layout.admin')
@section('section_data')
        <div class="banner">
            <section>
                <div class="banner2"><br><br>
                <div id="data"></div><br><br>
                <button style="width:auto;"><a href="{{route('category.create')}}">Add New Data</a></button>
                <h2 style="font-size:40px;">Category Data</h2>
                <div class="overfolow">
               
        <div class="container mt-5">
    <table class="table table-bordered yajra-datatable">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Status</th>
                <th>Show In Menu</th>
                <th>Parent_id</th>
                <th>Short_description</th>
                <th>Description</th>
                <th>Thumbnail_image</th>
                <!-- <th>Banner_image</th> -->
                <th>Is_featured</th>
                <th>Url_Key</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
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
        ajax: "{{ route('category.list') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'status', name: 'status'},
            {data: 'show_in_menu', name: 'show_in_menu'},
            {data: 'parent_id', name: 'parent_id'},
            {data: 'short_description', name: 'short_description'},
            {data: 'description', name: 'description'},
            {data: 'thumbnail_image', name: 'thumbnail_image'},
            {data: 'is_featured', name: 'is_featured'},
            {data: 'url_key', name: 'url_key'},
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
                 </div> 
                </div>
            </section>
        </div>


@endsection
