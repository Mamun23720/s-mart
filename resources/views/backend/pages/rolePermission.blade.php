@extends('backend.master')

@section('content')

    <div style="padding: 50px; " class="container mt-5">

        <form action="{{route('backend.submit.permission', $id)}}" method="POST">
            @csrf

                @foreach ($permissions as $permission)

                    <div class="form-check">
                        <input @if (in_array($permission->id,$rolePermissions)) checked @endif name="permission[]" class="form-check-input" type="checkbox" value="{{$permission->id}}" id="" />
                        <label class="form-check-label" for="flexCheckDefault">{{ucfirst($permission->name)}}</label>
                    </div>

                @endforeach

            <button style="color:white; background:green;" class="btn btn-success" type="submit"><b>Submit</b></button>

        </form>

    </div>

@endsection
