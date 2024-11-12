@extends('backend.master')

@section('content')
   
    <div class="row">

        <div class="col-md-4 mt-3 mb-3">
        <a><h1><b>Product</b></h1></a>
        </div>

        <div class="col-md-4">

        </div>

        <div style="text-align: right;" class="col-md-4 mt-3 mb-3">
            <a style="background-color: #007bff;" href="{{ route('backend.product.form') }}"class="btn btn-primary"><b>Add New <i class="fa-solid fa-plus"></i> </b></a>
            <a href="" class="btn btn-warning" ><b>Import</b></a>

        </div>

    </div>

    <table class="data-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Discount</th>
                <th>Stock</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
@endsection

@push('js')

<script type="text/javascript">

  $(function () {

    var table = $('.data-table').DataTable({

        processing: true,

        serverSide: false,

        ajax: "{{ route('ajax.product.data') }}",
        columns: 
        [
            {"data": null,
              "name": "id",
              "render": function (data, type, row, meta) {
                  return meta.row + 1;}
            },

            { "data": "image" ,
              "render": function ( data) {
                    console.log('Image URL:', data);
                        if (data) {
                        return '<img src="' + data + '" width="100px" alt="Image not found">';
                        }
                        return 'No image available';
                    }
                },

            {data: 'name', name: 'name',searchable:true},
            {data: 'price', name: 'price',searchable:true},
            {data: 'discount', name: 'discount',searchable:false},
            {data: 'stock', name: 'stock',searchable:false},
            {data: 'description', name: 'description',searchable:false},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        columnDefs: [
            {
                targets: 6,
                width: '300px', 
                className: 'description-column' 
            }
        ]
    });
});
</script>

@endpush