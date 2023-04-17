<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Side;
use App\Models\C_license;
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

use Illuminate\Http\Request;

class SideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $request   = RequestP::select()->with('categoryname','city','rl','subCat')->where('state',0)->get();
        $r_license = R_license::select()->with('L_Lisense','R_Lisense')->get();
        return view('side.index',compact('request','r_license'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        //
        $city = City::select()->get();
        $clicense   = C_license::select()->get();
        $project = Project::select()->where('request_id',$id)->get();
        $r_license = R_license::select()->where('request_id',$id)->get();
        $r_note = Request_note::select()->where('request_id',$id)->get();
        $request = RequestP::select()->find($id);
        $request_places = Request_places::select()->where('request_id',$id)->get();
        return view('side.create',compact('request','city','clicense','r_license','r_note','project','request_places'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function side_store(Request $request)
    {
        try{
            for($i = 0 ; $i < count($request->r_id) ; $i++){
                $region[] = $request->recived_date[$i];
                $record_name = R_license::select()->where('id',$request->r_id[$i])->first();
                $file_name = $record_name->response_file;
                try{
                    if($file = $request->response_file[$i]){
                        $file_extension = $file->getclientoriginalExtension();
                        $file_name = $request->r_id[$i].' response_file'. '.' . $file_extension;
                        $path = 'project_inquiry_file';
                        $file -> move($path, $file_name);
                    }
                }catch( \Exception $ex){}
                $r_license = R_license::where('id', $request->r_id[$i])-> update(([
                    'recived_date' => $region[$i],
                    'response_file' => $file_name,
                    'point' => ($record_name->point)+1,
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
