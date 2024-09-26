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
        <h2>Category</h2>
    </div>

    <div class="col-md-4">

    </div>

    <div style="text-align: center;" class="col-md-4 mt-3">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            <b>Add Category</b>
        </button>
    </div>

</div>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Category Name</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($allCategory as $key=>$cat)
            
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{$cat->name}}</td>
            <td>
                <img src="{{ url('/uploads/category/' . $cat->image) }}" width="50px" height="50px">
            </td>
            <td>
                <a href="" class="btn btn-info">Edit</a>
                <a href="{{route('backend.delete.category', $cat->id)}}" class="btn btn-danger ml-2">Remove</a>
            </td>
        </tr>

        @endforeach

    </tbody>
</table>



<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">        
            <div class="form-container">
                <form action="{{route('backend.category.store')}}" id="categoryForm" enctype="multipart/form-data" method="post">
                    @csrf
                        <label for="categoryName">Category Name</label>
                            <input type="text" id="categoryName" name="categoryName" placeholder="Enter Category Name" required>

                        <label for="categoryImage">Image</label>
                            <input type="file" id="categoryImage" name="categoryImage" placeholder="Enter Image File" required>

                        <button type="submit">Add Category</button>
                </form>
            </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->



@endsection