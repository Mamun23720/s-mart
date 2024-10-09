@extends('backend.master')

@section('content')
    <div style="margin-top: 5%;" class="row justify-content-center">
        <div class="col-md-8">
            <!-- HTML: Category Form -->
            <div style="border: solid #007bff;" class="form-container">

                <form action="{{ route('backend.customer.store') }}" id="categoryForm" enctype="multipart/form-data"
                    method="post">
                    @csrf

                    <div class="row">
                        <!-- Left Column -->
                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="firstName">First Name</label>
                                <input style="border: 1px solid black;  height: 40px;" type="text" id=""
                                    name="firstName" required>
                            </div>

                            <div class="form-group">
                                <label for="middleName">Middle Name</label>
                                <input style="border: 1px solid black;  height: 40px;" type="text" id=""
                                    name="middleName" required>
                            </div>

                            <div class="form-group">
                                <label for="lastName">Last Name</label>
                                <input style="border: 1px solid black;  height: 40px;" type="text" id=""
                                    name="lastName" required>
                            </div>

                            <div class="form-group">
                                <label for="customerUserName">User Name</label>
                                <input style="border: 1px solid black;  height: 40px;" type="text" id=""
                                    name="customerUserName" required>
                            </div>

                            <div class="form-group">
                                <label for="customerEmail">Email Address</label>
                                <input style="border: 1px solid black; width: 100%; height: 40px; border-radius: 5px;" type="email" id=""
                                    name="customerEmail" required>
                            </div>

                        </div>

                        <!-- Right Column -->
                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="customerDob">Date of Birth</label>
                                <input style="border: 1px solid black; width: 100%; height: 40px; border-radius: 5px;" type="date" id=""
                                    name="customerDob" required>
                            </div>

                            <div class="form-group">
                                <label for="customerNumber">Phone Number</label>
                                <input style="border: 1px solid black; width: 100%; height: 40px; border-radius: 5px;" type="number" id=""
                                    name="customerNumber" required>
                            </div>

                            <div class="form-group">
                                <label for="customerAddress">Address</label>
                                <input style="border: 1px solid black;  height: 40px;" type="text" id=""
                                    name="customerAddress">
                            </div>

                            <div class="form-group">
                                <label for="customerImage">Customer Image</label>
                                <input style="border: 1px solid black;  height: 40px;" type="file" id=""
                                    name="customerImage">
                            </div>

                            <div class="form-group">
                                <label for="customerStatus">Status</label>
                                <select style="border: 1px solid black; width: 100%; height: 40px; border-radius: 5px;"
                                    name="customerStatus" id="">
                                    <option selected value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="submit-btn">Add Customer</button>
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
