<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\RolePermission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Throwable;

class RoleController extends Controller
{

    public function roleList()
    {
        $allRole = Role::all();

        $allPermission = RolePermission::get()->pluck('permission_id')->toArray();

        return view('backend.roleList', compact('allRole','allPermission'));
    }

    public function roleForm()
    {
        return view('backend.pages.roleForm');
    }

    public function roleStore(Request $request)
    {

        // dd($request->all());

        $validation = Validator::make($request->all(), [
            'roleName' => 'required|unique:roles,name',
        ]);


        if ($validation->fails()) {

        toastr()->error('The role name has already been taken.');

        return redirect()->route('backend.role.list')->withErrors($validation)->withInput();
        }


        try
        {
        Role::create([
            'name' => $request->roleName,
            'status' => $request->roleStatus,
        ]);

        toastr()->success('Role Added Succesfully !!');

        return redirect()->route('backend.role.list');
        }

        catch(Throwable $e)
        {
        toastr()->error('Something Went Wrong');

        return redirect()->route('backend.role.list');
        }

    }

    public function rolePermission($id)

    {
        $rolePermissions = RolePermission::where('role_id',$id)->get()->pluck('permission_id')->toArray();
        $permissions = Permission::all();
        return view('backend.pages.rolePermission', compact('rolePermissions', 'permissions','id'));
    }

    public function submitPermission(Request $request, $id)

    {
        // dd($request->all());
        $validation = Validator::make($request->all(),

        [
            'permission.*'=>'required',
        ]
        );

        if($validation->fails())

        {
        toastr()->error('Something Went Wrong');
        return redirect()->back();
        }


        try

        {

            RolePermission::where('role_id', $request->id)->delete();

            foreach($request->permission as $per_id)
            {
                RolePermission::create([
                    'role_id'=> $id,
                    'permission_id'=> $per_id,
                ]);
            }
            toastr()->success('Assign Permission Succesfully !!');
            return redirect()->route('backend.role.list');
        }

        catch (Throwable $e)

        {
            toastr()->error($e->getMessage());
        }

    }

    public function roleEdit($id)

    {
        $role = Role::find($id);

        return view('backend.pages.roleEdit', compact('role'));
    }


    public function roleUpdate(Request $request, $id)

    {
        $validation= Validator::make($request->all(),
        [
            'roleName' => 'required',
        ]);

        if ($validation->fails())
        {
            foreach ($validation->errors()->all() as $errorMessage) {
                toastr()->error($errorMessage);
            }
            return redirect()->route('backend.role.list')->withErrors($validation)->withInput();
        }

        $role = Role::find($id);

        try
        {

        $role->update([

           'name' => $request->roleName,
            'status' => $request->roleStatus,

        ]);

        toastr()->success('Role Updated Succesfully !!');

        return redirect()->route('backend.role.list');
        }

        catch(Throwable $e)
        {
        toastr()->error('Something Went Wrong');

        return redirect()->route('backend.role.list');
        }
    }

    public function roleDelete($id)
    {
        $deleteRole = Role::find($id);

        $deleteRole->delete();

        toastr()->success('Role Removed Succesfully !!');

        return redirect()->back();
    }


}
