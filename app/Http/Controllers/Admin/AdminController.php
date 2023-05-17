<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
//use Spatie\Permission\Contracts\Role;
use Spatie\Permission\Models\Role ;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->hasRole('super_admin')){
            $roles = Role::select()->get();
            return view('roles.index',compact('roles'));
        }else
            abort(403, 'user doesn\'t have access');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->hasRole('super_admin')){
            $roles = Role::select()->get();
            $permissions = Permission::select()->get();
            return view('roles.create',compact('roles','permissions'));
        }else
            abort(403, 'user doesn\'t have access');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (auth()->user()->hasRole('super_admin')){
            $request->validate([
                'name' => 'bail|required|unique:roles',
                'permissions' => 'bail|required',
            ]);
    
            $role = Role::create(['name' => $request->name]);
            $per =  Role::whereIn('id', $request->permissions)->get();
            $role->syncPermissions($per);
            return redirect()->route('role')->with(['success' => 'تم التسجيل بنجاح']);
        }else
            abort(403, 'user doesn\'t have access');
    }

    public function edit(string $id)
    {
        if (auth()->user()->hasRole('super_admin')){
            //$permissions = Permission::select()->where('role_id',$id)->get();
            $permissions = Permission::select()->get();
            $roles = Role::with('permissions')->find($id);
            return view('roles.edit',compact('roles','permissions'));
        }else
            abort(403, 'user doesn\'t have access');
    }

    public function update(Request $request, string $id)
    {
        if (auth()->user()->hasRole('super_admin')){
            $roles = Role::whereIn('id', $id)->update(['name' => $request->name]);
            $per =  Permission::whereIn('id', $id)->update(['permissions' => $request->permissions]);
            $roles->syncPermissions($per);
            return redirect()->route('role')->with(['success' => 'تم التعديل بنجاح']);
        }else
            abort(403, 'user doesn\'t have access');
    }
        
        /**
         * Remove the specified resource from storage.
         */
    public function destroy(string $id)
    {
        if (auth()->user()->hasRole('super_admin')){
            $role = Role::find($id);
            $role->delete();
            return redirect()->route('role')->with(['success' => 'تم الحذف بنجاح']);
        }else
            abort(403, 'user doesn\'t have access');
    }
}
