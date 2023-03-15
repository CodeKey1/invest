<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\C_license;
use App\Models\Category;
use App\Models\City;
use App\Models\R_license;
use App\Models\RequestP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class InvestmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $r_license = R_license::select()->with('L_Lisense','R_Lisense')->get();
        $request   = RequestP::select()->with('categoryname','city','rl')->get();
        return view('investment.index',compact('request','r_license'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $clicense   = C_license::select()->with('license_cate','license')->get();
        $city = City::select()->get();
        $category = Category::select()->get();
        $now = Carbon::today()->format('y-m-d');
        return view('investment.create',compact('now','category','city','clicense'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $now = Carbon::today();
        // $data = $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'owner_type' => ['required', 'string', 'email', 'max:255'],
        //     'owner_name' => ['required', 'string', 'max:255'],
        //     'address' => ['required', 'string', 'max:255'],
        //     'representative_name' => ['required', 'string', 'max:255'],
        //     'representative_id' => ['required', 'string', 'max:255'],
        //     'NID' => ['required', 'string', 'max:14'],
        //     'size' => ['required', 'string', 'max:255'],
        //     'size_type' => ['required', 'string', 'max:255'],
        //     'Self_financing' => ['required', 'string', 'max:255'],
        //     'recived_date' => ['required', 'string', 'max:255'],
        //     'capital' => ['required', 'string', 'max:255'],
        //     'phone' => ['required', 'string', 'min:11', 'max:11'],
        //     'state' => ['required', 'string', 'max:255'],

        // ]);

        try{
            RequestP:: create(([
             'name' => $request['name'],
             'owner_type' =>$request['email'],
             'owner_name' =>$request['owner_name'],
             'address' =>$request['address'],
             'representative_name' =>$request['representative_name'],
             'representative_id' =>$request['representative_id'],
             'NID' =>$request['NID'],
             'size' =>$request['size'],
             'size_type' =>$request['size_type'],
             'Self_financing' =>$request['Self_financing'],
             'recived_date' => $now ,
             'city_id' =>$request['city_id'],
             'phone' =>$request['phone'],
             'state' =>$request['state'],


             ]));

            return redirect()->route('investment')-> with(['success' => 'تم التسجيل بنجاح']);
        }catch(\Exception $ex){
            return redirect()->route('investment')-> with(['error' => 'خطأ']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $r_license = R_license::select()->with('L_Lisense','R_Lisense')->get();
        $request = RequestP::select()->with('categoryname','city')->find($id);
        return view('investment.edit',compact('request','r_license'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $user = RequestP::find($id);
        $user->delete();
        return redirect()->route('investment')->with(['success' => 'تم الحذف بنجاح']);
    }

    /**
     * Display a listing of the projects of investment.
     */
    public function project(){
        return view('investment.project.index');
    }
    /**
     * Show the form for creating a new projects of investment.
     */
    public function project_create(){
        return view('investment.project.create');
    }


}
