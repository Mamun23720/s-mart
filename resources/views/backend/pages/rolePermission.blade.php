@extends('backend.master')

@section('content')

    <div class="container mt-5">

        <!-- Default checkbox -->
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
            <label class="form-check-label" for="flexCheckDefault">Default checkbox</label>
        </div>

        <!-- Checked checkbox -->
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked />
            <label class="form-check-label" for="flexCheckChecked">Checked checkbox</label>
        </div>

        <a href="" class="btn btn-success">Submit</a>

    </div>

@endsection
