<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Throwable;

class AuthenticationController extends Controller
{
    public function loginForm()
    {
        try
        {
            return view('backend.login');
        }
        catch(Throwable $e)
        {
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }

    public function doLogin(Request $request)
    {
        try
        {
            $credentials = $request->except("_token");
            $check = Auth::attempt($credentials);
                if ($check) {
                    toastr()->success('Login Successful !!');
                    return redirect()->route('backend.dashboard');
                } else {
                    toastr()->error('Something Went Wrong. Please Check Your Email & Password !!');
                    return redirect()->back();
                }
        }
        catch(Throwable $e)
        {
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }

    public function logout()
    {
        try
        {
            Auth::logout();
            toastr()->success('Logout Successful !!');
            return redirect()->route('login');
        }
        catch(Throwable $e)
        {
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }

    public function userList()
    {
        try
        {
            $allUser = User::all();
            // $allUser = User::where('name','!=','Admin')->get();
            return view('backend.userList', compact('allUser'));
        }
        catch(Throwable $e)
        {
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }

    public function userForm()
    {
        try
        {
            $allRole = Role::where('name','!=','Admin')->get();
            return view('backend.pages.userForm', compact('allRole'));
        }
        catch(Throwable $e)
        {
               toastr()->error($e->getMessage());
               return redirect()->back();
        }
    }

    public function userStore(Request $request)
    {
        // dd($request->all());..
        $validation = Validator::make($request->all(), [
            'userName' => 'required',
            'userEmail' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
        ]);
        if ($validation->fails())
        {
            foreach ($validation->errors()->all() as $errorMessage) {
                toastr()->error($errorMessage);
            }
            return redirect()->route('backend.user.list')->withErrors($validation)->withInput();
        }

        try
        {
            User::create([
                'role_id' => $request->roleName,
                'name' => $request->userName,
                'email' => $request->userEmail,
                'password' => $request->password,
                'status' => $request->userStatus,
            ]);
            toastr()->success('User Added Succesfully !!');
            return redirect()->route('backend.user.list');
        }
        catch(Throwable $e)
        {
            toastr()->error('Something Went Wrong');
            return redirect()->route('backend.user.list');
        }

    }

    public function userEdit($id)
    {
        try
        {
            $user = User::find($id);
            return view('backend.pages.userEdit', compact('user'));
        }
        catch(Throwable $e)
        {
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }

    public function userUpdate(Request $request, $id)
    {
        $validation= Validator::make($request->all(),
        [
            'userName' => 'required',
            'userEmail' => 'required|email',
            'password' => 'required|confirmed',
        ]);
        if ($validation->fails())
        {
            foreach ($validation->errors()->all() as $errorMessage) {
                toastr()->error($errorMessage);
            }
            return redirect()->route('backend.user.list')->withErrors($validation)->withInput();
        }
        $user = User::find($id);
        try
        {
            $user->update([
                'name' => $request->userName,
                'email' => $request->userEmail,
                'password' => $request->password,
                'status' => $request->userStatus,
            ]);
            toastr()->success('User Updated Succesfully !!');
            return redirect()->route('backend.user.list');
        }
        catch(Throwable $e)
        {
            toastr()->error('Something Went Wrong');
            return redirect()->route('backend.user.list');
        }
    }

    public function userDelete($id)
    {
        try
        {
            $deleteUser = User::find($id);
            $deleteUser->delete();
            toastr()->success('User Removed Succesfully !!');
            return redirect()->back();
        }
        catch(Throwable $e)
        {
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }
}
