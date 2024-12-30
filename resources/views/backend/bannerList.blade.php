@extends('backend.master')

@section('content')
    <div class="row">

        <div class="col-md-6 mt-3 mb-3">
            <p style="font-size: 20px;"><b>Banner</b></p>
            {{-- <h1> {{$title}}</h1> --}}
        </div>
        @if (checkPermission('backend.banner.form'))
            <div style="text-align: right;" class="col-md-6 mt-3 mb-3">
                <button style="margin-right: 30px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Add New <i class="fa-solid fa-plus"></i>
                </button>
            </div>
        @endif

    </div>

    <table class="data-table">
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



    <!-- Add-New-Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="{{ route('backend.banner.store') }}" enctype="multipart/form-data" method="post">
                    @csrf

                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Banner</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="bannerImage" class="form-label">Banner Image</label>
                            <input type="file" id="bannerImage" name="bannerImage" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="bannerName" class="form-label">Banner Name</label>
                            <input type="text" id="bannerName" name="bannerName" class="form-control"
                                placeholder="Enter banner name" required>
                        </div>

                        <div class="mb-3">
                            <label for="bannerDescription" class="form-label">Banner Description</label>
                            <textarea id="bannerDescription" name="bannerDescription" rows="4" class="form-control"
                                placeholder="Enter banner description" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="bannerStatus" class="form-label">Banner Status</label>
                            <select name="bannerStatus" id="bannerStatus" class="form-select">
                                <option selected value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Add-New-Modal -->

    {{-- Edit-Modal --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="{{ route('backend.banner.store') }}" enctype="multipart/form-data" method="post">
                    @csrf

                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Banner</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="bannerImage" class="form-label">Banner Image</label>
                            <input type="file" id="bannerImage" name="bannerImage" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="bannerName" class="form-label">Banner Name</label>
                            <input type="text" id="bannerName" name="bannerName" class="form-control"
                                placeholder="Enter banner name" required>
                        </div>

                        <div class="mb-3">
                            <label for="bannerDescription" class="form-label">Banner Description</label>
                            <textarea id="bannerDescription" name="bannerDescription" rows="4" class="form-control"
                                placeholder="Enter banner description" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="bannerStatus" class="form-label">Banner Status</label>
                            <select name="bannerStatus" id="bannerStatus" class="form-select">
                                <option selected value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Banner</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Edit-Modal --}}

@endsection


@push('js')
    <script type="text/javascript">
        $(function() {

            var table = $('.data-table').DataTable({

                processing: true,

                serverSide: false,

                ajax: "{{ route('ajax.banner.data') }}",
                columns: [{
                        "data": null,
                        "name": "id",
                        "render": function(data, type, row, meta) {
                            return meta.row + 1;
                        }
                    },

                    {
                        "data": "image",
                        "render": function(data) {
                            console.log('Image URL:', data);
                            if (data) {
                                return '<img src="' + data +
                                    '" width="100px" alt="Image not found">';
                            }
                            return 'No image available';
                        }
                    },

                    {
                        data: 'name',
                        name: 'name',
                        searchable: true
                    },
                    {
                        data: 'description',
                        name: 'description',
                        searchable: false
                    },
                    // {data: 'status', name: 'status'},
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],
                columnDefs: [{
                    targets: 3,
                    width: '400px',
                    className: 'description-column'
                }]
            });
        });
    </script>
@endpush
