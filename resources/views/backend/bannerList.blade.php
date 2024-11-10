@extends('backend.master')

@section('content')

<style>
    h2 {
        text-align: start;
        color: #333;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        margin: 20px 0;
    }

    th,
    td {
        padding: 15px;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: white;
        color: black;
        font-weight: bold;
    }

    tr:hover {
        background-color: #f5f5f5;
    }

    td img {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid #ddd;
        text-align: center;
    }


    .form-container {
            max-width: 500px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-container input[type="text"],
        .form-container input[type="file"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .form-container button {
            width: 100%;
            padding: 12px;
            background-color: #000000;
            color: white;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
        }

        .form-container button:hover {
            background-color: #004cffe8;
        }

        .form-container label {
            color: #333;
            font-weight: bold;
        }

        @media (max-width: 768px) {
            .form-container {
                width: 90%;
            }
        }

    @media (max-width: 768px) {
        table {
            font-size: 14px;
        }
    }
</style>

<div class="row">

    <div class="col-md-6 mt-3">
    <b style="font-size: 36px;" >Banner</b>
    </div>
    @if (checkPermission('backend.banner.form'))

        <div style="text-align: center;" class="col-md-6 mt-3">
            <a style="background-color: #007bff;" href="{{route('backend.banner.form')}}" class="btn btn-primary btn-lg" ><b>Add New  <i class="fa-solid fa-plus"></i>  </b></a>
            <a style="" href="{{route('backend.banner.import.excel.form')}}" class="btn btn-warning btn-lg" ><b>Import</b></a>

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
            <th>Status</th>
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

            {data: 'name', name: 'name'},
            {data: 'description', name: 'description',searchable:true},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]});
    });

</script>
@endpush
