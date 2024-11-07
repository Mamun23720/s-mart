@extends('frontend.master')

@section('content')

<div class="container mt-2"  style="margin-left: 300px;">

    <div class="col-md-8">
        <!-- HTML: Category Form -->
        <div style="border: solid #D19C97;" class="form-container">

            <form action="{{ route('frontend.do.login') }}" id="categoryForm" enctype="multipart/form-data" method="post">
                @csrf
                <div class="row">
                    <!-- Left Column -->
                    <div class="col-md">

                        <div class="form-group">
                            <label for="email">Enter Your Email Address</label>
                            <input style="border: 1px solid black;  height: 40px; width:665px; border-radius:10px;" type="text" id="" name="email" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Enter Your Password</label>
                            <input style="border: 1px solid black;  height: 40px; width:665px; border-radius:10px;" type="password" id="" name="password" required>
                        </div>

                    </div>
                </div>

                <button type="submit" class="submit-btn mt-2" style="color:black"><b>Login Here</b></button>
                <p style="text-align: center; margin-top:20px; margin-bottom:0%">Don't Have Any Account?</p>
                <a class="btn mt-2" style="color:#0011ff; border-radius:5px; width:100%;" href="{{route('frontend.customer.registration')}}"><b>Register Now</b></a>
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
