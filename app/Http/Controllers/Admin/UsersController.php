<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\User_have_type;
use App\Models\City;
use App\Models\License;
use App\Models\Model_has_roles;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->hasRole('super_admin')){
            $users = User::select()->get();
            return view('users.index',compact('users'));
        }else
            abort(403, 'user doesn\'t have access');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->hasRole('super_admin')){
            $role = Role::select()->get();
            $city = City::select()->get();
            $license = License::select()->get();
            return view('users.create',compact('role','city','license'));
        }else
            abort(403, 'user doesn\'t have access');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (auth()->user()->hasRole('super_admin')){
            $data = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'role' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
            try{
                $user = User :: create(([
                 'name' => $data['name'],
                 'email' =>$data['email'],
                 'role' =>$data['role'],
                 'password' => Hash::make($data['password']),
                 ]));
                 Model_has_roles :: create(([
                    'role_id' => $data['role'],
                    'model_id' => $user->id,
                ]));
                User_have_type :: create(([
                    'id' => $user->id,
                    'type_id' => $data['role'],
                    'city_id' => $request['city'],
                    'license_id' => $request['side'],
                ]));
                return redirect()->route('user')-> with(['success' => 'تم التسجيل بنجاح']);
            }catch(\Exception $ex){
                return redirect()->route('user')-> with(['error' => 'خطأ'.$ex]);
            }
        }else
            abort(403, 'user doesn\'t have access');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if (auth()->user()->id==$id || auth()->user()->hasRole('super_admin')){
            $roles = Role::select()->get();
            $user = User ::select()->find($id);
            return view('users.edit',compact('user','roles'));
        }else
            abort(403, 'user doesn\'t have access');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (auth()->user()->id==$id || auth()->user()->hasRole('super_admin')){
            try{
                User :: where('id',$id)->update(([
                    'name' => $request['name'],
                    'email' =>$request['email'],
                    'password' => Hash::make($request['password']),
                    'role' => $request['role'],
                    //'state' => $request['state'],
                ]));
                Model_has_roles :: where('model_id',$id)->update(([
                    'role_id' => $request['role'],
                ]));
                return redirect()->route('user')-> with(['success' => 'تم التسجيل بنجاح']);
            }catch(\Exception $ex){
                return redirect()->route('user')-> with(['error' => 'خطا'. $ex]);
            }
        }else
            abort(403, 'user doesn\'t have access');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (auth()->user()->hasRole('super_admin')){
            $user_have_type = User_have_type::find($id)->delete();
            $user = User::find($id);
            $user->delete();
            return redirect()->route('user')->with(['success' => 'تم الحذف بنجاح']);
        }else
            abort(403, 'user doesn\'t have access');
    }
}
