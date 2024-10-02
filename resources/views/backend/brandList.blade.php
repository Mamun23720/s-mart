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
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
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

        <div class="col-md-4 mt-3">
            <b style="font-size: 36px;">Brand</b>
        </div>

        <div class="col-md-4">

        </div>

        <div style="text-align: center;" class="col-md-4 mt-3">
            <a style="background-color: #007bff;" href="{{ route('backend.brand.form') }}"
                class="btn btn-primary btn-lg"><b>Add New <i class="fa-solid fa-plus"></i> </b></a>
        </div>

    </div>

    <table class="table-sm">
        <thead>
            <tr>
                <th>ID</th>
                <th style="text-align: start;">Logo</th>
                <th>Brand</th>
                <th>Description</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($allBrand as $key => $brand)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>
                        <img src="{{ url('/uploads/brand/' . $brand->logo) }}" alt="No logo">
                    </td>
                    <td>{{ $brand->name }}</td>
                    <td>{{ $brand->description }}</td>

                @if ($brand->status == 'Active')
                    <td>
                        <span style="display: inline-block; width: 30px; height: 30px; background-color: green; border-radius: 50%;"></span>
                    </td>
                @else
                    <td>
                        <span style="display: inline-block; width: 30px; height: 30px; background-color: red; border-radius: 50%;"></span>
                    </td>
                @endif

                    <td>
                        <!-- Edit -->
                        <a href="{{ route('backend.brand.edit', $brand->id) }}" class="btn btn-info ml-2"><i
                                class="fa-solid fa-pen-to-square"></i></a>
                        <!-- Remove -->
                        <a href="{{ route('backend.brand.delete', $brand->id) }}" class="btn btn-danger ml-2"><i
                                class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
