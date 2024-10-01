@extends('backend.master')

@section('content')

<div style="margin-top: 5%;" class="row justify-content-center">
    <div class="col-md-8">
        <!-- HTML: Category Form -->
        <div style="border: solid #007bff;" class="form-container">

            <form action="{{ route('backend.website.update'  , $website->id ) }}" id="categoryForm" enctype="multipart/form-data" method="post">
                @csrf

                <div class="row">
                    <!-- Left Column -->
                    <div class="col-md-6">

                    
                        <div class="form-group">
                            <label for="websiteLogo">Website Logo</label>
                            <input style="border: 1px solid black;" type="file" id="" name="websiteLogo">
                        </div>

                        <div class="form-group">
                            <label for="websiteName">Website Name</label>
                            <input style="border: 1px solid black;" type="text" id="" name="websiteName"  value="{{$website->name}}" >
                        </div>

                        <div class="form-group">
                            <label for="websiteMobile">Mobile</label>
                            <input style="border: 1px solid black; width: 100%; height: 40px; border-radius: 5px;" type="number" name="websiteMobile"  value="{{$website->mobile}}" >
                        </div>

                        <div class="form-group">
                            <label for="websiteHelpline">Helpline</label>
                            <input style="border: 1px solid black; width: 100%; height: 40px; border-radius: 5px;" type="number" name="websiteHelpline"  value="{{$website->helpline}}" >
                        </div>

                        <div class="form-group">
                            <label for="websiteEmail">Email</label>
                            <input style="border: 1px solid black;  width: 100%; height: 40px; border-radius: 5px;" type="email" id="" name="websiteEmail"  value="{{$website->email}}" >
                        </div>

                        <div class="form-group">
                            <label for="websiteAddress">Address</label>
                            <input style="border: 1px solid black;" type="text" id="" name="websiteAddress"  value="{{$website->address}}" >
                        </div>

                    </div>

                    <!-- Right Column -->
                    <div class="col-md-6">
                        
                        <div class="form-group">
                            <label for="websiteFacbook">Facebook Link</label>
                            <input style="border: 1px solid black;" type="text" id="" name="websiteFacbook"   value="{{$website->facebook}}" >
                        </div>
                        
                        <div class="form-group">
                            <label for="websiteTwitter">Twitter Link</label>
                            <input style="border: 1px solid black;" type="text" id="" name="websiteTwitter"   value="{{$website->twitter}}" >
                        </div>

                        <div class="form-group">
                            <label for="websiteInstagram">Instagram Link</label>
                            <input style="border: 1px solid black;" type="text" id="" name="websiteInstagram"   value="{{$website->instagram}}" >
                        </div>

                        <div class="form-group">
                            <label for="websiteLinkedin">Linkedin Link</label>
                            <input style="border: 1px solid black;" type="text" id="" name="websiteLinkedin"   value="{{$website->linkedin}}" >
                        </div>

                        <div class="form-group">
                            <label for="websiteYoutube">Youtube Link</label>
                            <input style="border: 1px solid black;" type="text" id="" name="websiteYoutube"   value="{{$website->youtube}}" >
                        </div>


                    </div>
                </div>

                <button type="submit" class="submit-btn">Submit</button>
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
