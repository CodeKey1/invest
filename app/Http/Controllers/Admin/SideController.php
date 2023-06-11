<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Side;
use App\Models\Category;
use App\Models\City;
use App\Models\Place;
use App\Models\Place_Category;
use App\Models\Request_places;
use App\Models\Project;
use App\Models\R_license;
use App\Models\SubCategory;
use App\Models\RequestP;
use App\Models\Request_note;
use App\Models\User_have_type;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as DB;

class SideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $type = User_have_type::select()->find(auth()->user()->id);
        if(auth()->user()->hasRole('city')){
            $r_license = R_license::select()->get();
            $request = RequestP::select()->where('city_id',$type->city_id )->get();
        }
        else if(auth()->user()->hasRole('side')){
            $r_license = R_license::select()->where('license_id',$type->license_id)->get();
            $request = RequestP::
                        join('request_license','request.id','=','request_license.request_id')
                        ->where('request_license.license_id',$type->license_id)
                        ->select('request.*')
                        ->get();
            //return response()->json($request);
        }
        return view('side.index',compact('request','type','r_license'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        $type = User_have_type::select()->find(auth()->user()->id);
        $city = City::select()->get();
        $project = Project::select()->where('request_id',$id)->get();
        $r_license = R_license::select()->where('request_id',$id)->where('license_id',$type->license_id)->get();
        $r_note = Request_note::select()->where('request_id',$id)->get();
        $request = RequestP::select()->find($id);
        $request_places = Request_places::select()->where('request_id',$id)->get();
        return view('side.create',compact('request','city','r_license','r_note','project','request_places'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function side_store(Request $request)
    {
        try{
            for($i = 0 ; $i < count($request->r_id) ; $i++){
                $record_name = R_license::select()->where('id',$request->r_id[$i])->first();
                $file_name = $record_name->response_file;
                try{
                    if($file = $request->response_file[$i]){
                        $file_extension = $file->getclientoriginalExtension();
                        $file_name = $request->r_id[$i].' response_file'. '.' . $file_extension;
                        $path = 'project_response_file';
                        $file -> move($path, $file_name);
                    }
                }catch( \Exception $ex){}
                $r_license = R_license::where('id', $request->r_id[$i])-> update(([
                    'recived_date' => Carbon::today()->format('y-m-d'),
                    'response_file' => $file_name,
                    'state' => $request->state,
                ]));
            }
            return redirect()->route('side')-> with(['success' => 'نجح']);
        }catch( \Exception $ex){
            return redirect()->route('side')-> with(['error' => ' خطأ '.$ex]);
        }

    }

    public function side_note(Request $request, string $id)
    {
        try{
            for($i = 0 ; $i < count($request->l_name) ; $i++){
                Request_note::create([
                    'notes' => $request->note,
                    'request_id' => $id,
                    'license_id' => $request->l_name[$i],
                ]);
            }
            return redirect()->back();
        }catch(\Exception $ex){
            return redirect()->route('lecturer')-> with(['error' => ' خطأ '.$ex]);
        }

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
    public function edit(string $id)
    {
        //
        return view('side.edit');
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
    }


}
