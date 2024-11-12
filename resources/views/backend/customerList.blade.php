@extends('backend.master')

@section('content')

        <div class="col-md-4 mt-3">
            <b style="font-size: 36px;">Customer's</b>
        </div>

    <table class="data-table">
        <thead>
            <tr>
                <th>Serial</th>
                <th>Image</th>
                <th>Name</th>
                {{-- <th>User Name</th> --}}
                <th>Email</th>
                <th>Date of Birth</th>
                <th>Phone</th>
                {{-- <th>Registration Date</th> --}}
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

        ajax: "{{ route('ajax.customer.data') }}",
        columns: [
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
            {data: 'email', name: 'email',searchable:true},
            {data: 'dob', name: 'dob',searchable:false},
            {data: 'number', name: 'number',searchable:true},
            // {data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
});
</script>

@endpush

