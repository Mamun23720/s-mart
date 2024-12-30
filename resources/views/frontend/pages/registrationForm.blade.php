@extends('frontend.master')

@section('content')

<div class="container mt-2"  style="margin-left: 300px;">

    <div class="col-md-8">
        <!-- HTML: Category Form -->
        <div style="border: solid #D19C97;" class="form-container">

            <form action="{{ route('frontend.customer.registration.store') }}" id="categoryForm" enctype="multipart/form-data" method="post">
                @csrf
                <div class="row">
                    <!-- Left Column -->
                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="firstName">Full Name</label>
                            <input style="border: 1px solid black;  height: 40px;" type="text" id=""
                                name="customerName" required>
                        </div>

                        <div class="form-group">
                            <label for="customerUserName">User Name</label>
                            <input style="border: 1px solid black;  height: 40px;" type="text" id=""
                                name="customerUserName">
                        </div>

                        <div class="form-group">
                            <label for="customerEmail">Email Address</label>
                            <input style="border: 1px solid black; width: 100%; height: 40px; border-radius: 5px;" type="email" id=""
                                name="customerEmail" required>
                        </div>

                        <div class="form-group">
                            <label for="customerPassword">Password</label>
                            <input style="border: 1px solid black; width: 100%; height: 40px; border-radius: 5px;" type="password" id=""
                                name="password" required>
                        </div>

                        <div class="form-group">
                            <label for="address">Street Address</label>
                            <input style="border: 1px solid black; width:210%;  height: 40px;" type="text" id=""
                                name="customerAddress" required>
                        </div>

                    </div>

                    <!-- Right Column -->
                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="customerDob">Date of Birth</label>
                            <input style="border: 1px solid black; width: 100%; height: 40px; border-radius: 5px;" type="date" id=""
                                name="customerDob">
                        </div>

                        <div class="form-group">
                            <label for="customerNumber">Phone Number</label>
                            <input style="border: 1px solid black; width: 100%; height: 40px; border-radius: 5px;" type="number" id=""
                                name="customerNumber" required>
                        </div>

                        <div class="form-group">
                            <label for="customerImage"> Image</label>
                            <input style="border: 1px solid black;  height: 40px;" type="file" id=""
                                name="customerImage">
                        </div>

                        <div class="form-group">
                            <label for="password">Retype Password</label>
                            <input style="border: 1px solid black; width: 100%; height: 40px; border-radius: 5px;" type="password" id=""
                                name="password_confirmation" required>
                        </div>

                    </div>
                       
                </div>

                <button type="submit" class="submit-btn mt-2" style="color:black"><b>Register Here</b></button>
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
        border-color: #D19C97;
        outline: none;
    }

    /* Submit Button */
    .submit-btn {
        width: 100%;
        background-color: #D19C97;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .submit-btn:hover {
        background-color: #D19C97;
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
