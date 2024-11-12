@extends('backend.master')

@section('content')
   
    <div class="row">

        <div class="col-md-4 mt-3 mb-3">
        <a><h1><b>Brand</b></h1></a>
        </div>

        <div class="col-md-4">

        </div>

        <div style="text-align: right;" class="col-md-4 mt-3 mb-3">
            <a style="background-color: #007bff;" href="{{ route('backend.brand.form') }}"class="btn btn-primary"><b>Add New <i class="fa-solid fa-plus"></i> </b></a>
            <a href="" class="btn btn-warning" ><b>Import</b></a>

        </div>

    </div>

    <table class="data-table">
        <thead>
            <tr>
                <th>ID</th>
                <th style="text-align: start;">Logo</th>
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

        ajax: "{{ route('ajax.brand.data') }}",
        columns: 
        [
            {"data": null,
              "name": "id",
              "render": function (data, type, row, meta) {
                  return meta.row + 1;}
            },

            { "data": "logo" ,
              "render": function ( data) {
              return '<img src="'+data+'" width="10px">';}
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
