@extends('backend.master')

@section('content')

<div style="margin-top: 5%;" class="row justify-content-center">
    <div class="col-md-8">
        <!-- HTML: Category Form -->
        <div style="border: solid #007bff;" class="form-container">

            <form action="{{ route('backend.product.store') }}" id="categoryForm" enctype="multipart/form-data" method="post">
                @csrf

                <div class="row">
                    <!-- Left Column -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="productName">Product Name</label>
                            <input style="border: 1px solid black;  height: 40px;" type="text" id="" name="productName" required>
                        </div>
<!-- 
                        <div class="form-group">
                            <label for="productSlug">Product Slug</label>
                            <input style="border: 1px solid black;" type="text" id="" name="productSlug">
                        </div> -->

                        <div class="form-group">
                            <label for="productPrice">Product Price</label>
                            <input style="border: 1px solid black; width: 100%; height: 40px; border-radius: 5px;" type="number" name="productPrice">
                        </div>

                        <div class="form-group">
                            <label for="productDiscount">Product Discount</label>
                            <input style="border: 1px solid black; width: 100%; height: 40px; border-radius: 5px;" type="number" name="productDiscount">
                        </div>

                        <div class="form-group">
                            <label for="productStock">Product Stock</label>
                            <input style="border: 1px solid black; width: 100%; height: 40px; border-radius: 5px;" type="number" name="productStock" required>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cars">Category Name</label>
                                <select style="border: 1px solid black; width: 100%; height: 40px; border-radius: 5px;" name="productCategory" id="">
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
                            <label for="productDescription">Product Description</label>
                            <input style="border: 1px solid black;  height: 40px;" type="text" id="" name="productDescription">
                        </div>

                        <div class="form-group">
                            <label for="productImage">Product Image</label>
                            <input style="border: 1px solid black;  height: 40px;" type="file" id="" name="productImage">
                        </div>

                        <div class="form-group">
                            <label for="productStatus">Product Status</label>
                            <select style="border: 1px solid black; width: 100%; height: 40px; border-radius: 5px;" name="productStatus" id="">
                                <option selected value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>

                <button type="submit" class="submit-btn">Add Product</button>
            </form>

        </div>
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

        .submit-btn {
            font-size: 14px;
        }
    }
</style>

@endsection
