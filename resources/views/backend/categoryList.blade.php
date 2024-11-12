@extends('backend.master')

@section('content')

<div class="row">

    <div class="col-md-6 mt-3 mb-3">
    <a><h1><b>Category</b></h1></a>
    </div>

    <div style="text-align: right;" class="col-md-6 mt-3 mb-3">
        <a style="background-color: #007bff;" href="{{route('backend.category.form')}}" class="btn btn-primary" ><b>Add New  <i class="fa-solid fa-plus"></i>  </b></a>
        <a href="" class="btn btn-warning" ><b>Import</b></a>
    </div>

</div>

<table class="data-table" >
    <thead>
        <tr>
            <th>ID</th>
            <th style="text-align: start;" >Image</th>
            <th>Category Name</th>
            <!-- <th>Parent Name</th> -->
            {{-- <th>Category Slug</th> --}}
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

        ajax: "{{ route('ajax.category.data') }}",
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
            {data: 'description', name: 'description',searchable:false},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        columnDefs: [
            {
                targets: 3,
                width: '400px', 
                className: 'description-column' 
            }
        ]
    });
});
</script>

@endpush