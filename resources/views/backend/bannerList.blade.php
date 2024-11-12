@extends('backend.master')

@section('content')


<div class="row">

    <div class="col-md-6 mt-3 mb-3">
    <a><h1><b>Banner</b></h1></a>
    </div>
    @if (checkPermission('backend.banner.form'))
        <div style="text-align: right;" class="col-md-6 mt-3 mb-3">
            <a style="background-color: #007bff;" href="{{route('backend.banner.form')}}" class="btn btn-primary" ><b>Add New  <i class="fa-solid fa-plus"></i>  </b></a>
            <a href="{{route('backend.banner.import.excel.form')}}" class="btn btn-warning" ><b>Import</b></a>
        </div>
    @endif

</div>

<table class="data-table" >
    <thead>
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Description</th>
            <!-- <th>Status</th> -->
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

        ajax: "{{ route('ajax.banner.data') }}",
        columns: [
            {"data": null,
              "name": "id",
              "render": function (data, type, row, meta) {
                  return meta.row + 1;}
            },

            { "data": "image" ,
              "render": function ( data) {
              return '<img src="'+data+'" width="10px">';}
            },

            {data: 'name', name: 'name',searchable:true},
            {data: 'description', name: 'description',searchable:false},
            // {data: 'status', name: 'status'},
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
