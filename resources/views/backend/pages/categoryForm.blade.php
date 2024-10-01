@extends('backend.master')

@section('content')



<div style="margin-top: 5%;" class="row">
    <div class="col-md-4">

    </div>


    <div class="col-md-4">
        <!-- HTML: Category Form -->
        <div style="border: solid #007bff;" class="form-container">

            <form action="{{ route('backend.category.store') }}" id="categoryForm" enctype="multipart/form-data" method="post">
                @csrf

                <div class="form-group">
                    <label for="categoryName">Category Name</label>
                    <input style="border: 1px solid black;"  type="text" id="categoryName" name="categoryName" required>
                </div>
<!-- 
                <div class="form-group">
                    <label for="categoryName">Category Slug</label>
                    <input style="border: 1px solid black;"  type="text" id="categorySlug" name="categorySlug">
                </div> -->

                <div class="form-group">
                    <label for="cars">Parent Name</label>
                        <select style="border: 1px solid black; width: 100%; height: 40px; border-radius: 5px;" name="parentName" id="parentName">
                            <option selected value="">Select a category</option>
                                @foreach ($allCategory as $category)
                                @if (empty($category->id))
                                    <option value=""></option>
                                @else
                                    <option value="{{$category->id}}">{{$category->cat_name}}</option>
                                @endif
                            @endforeach

                        </select>
                    </div>

                <div class="form-group">
                    <label for="categoryImage">Category Image</label>
                    <input style="border: 1px solid black;"  type="file" id="categoryImage" name="categoryImage">
                </div>

                <button type="submit" class="submit-btn">Add Category</button>

            </form>

        </div>

    </div>


    <div class="col-md-4">

    </div>
</div>

<!-- CSS: Styling for the form -->
<style>
    /* Form Container */
    .form-container {
        background-color: #ffffff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 400px;
    }

    .form-title {
        text-align: center;
        margin-bottom: 20px;
        font-size: 1.5em;
        color: #333;
    }

    /* Form Groups */
    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        font-size: 14px;
        margin-bottom: 5px;
        color: #333;
    }

    .form-group input[type="text"],
    .form-group input[type="file"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
        font-size: 14px;
        transition: border-color 0.3s ease;
    }

    .form-group input[type="text"]:focus,
    .form-group input[type="file"]:focus {
        border-color: #007bff;
        outline: none;
    }

    /* Submit Button */
    .submit-btn {
        width: 100%;
        background-color: #007bff;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .submit-btn:hover {
        background-color: #0056b3;
    }

    /* Responsive Design */
    @media (max-width: 600px) {
        .form-container {
            padding: 15px;
        }

        .form-title {
            font-size: 1.3em;
        }

        .submit-btn {
            font-size: 14px;
        }
    }
</style>

@endsection
