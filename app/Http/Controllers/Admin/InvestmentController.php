<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\C_license;
use App\Models\Category;
use App\Models\City;
use App\Models\Place;
use App\Models\Place_Category;
use App\Models\Project;
use App\Models\R_license;
use App\Models\SubCategory;
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
        $request   = RequestP::select()->with('categoryname','city','rl','subCat')->where('state',1)->get();
        return view('investment.index',compact('request','r_license'));
    }
    public function lecturer()
    {
        //
        $r_license = R_license::select()->with('L_Lisense','R_Lisense')->get();
        $request   = RequestP::select()->with('categoryname','city','rl','subCat')->where('state',0)->get();
        return view('investment.lecturer.index',compact('request','r_license'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $place = Place::select()->with('catePlace','cityPlace')->get();
        $place_cat = Place_Category::select()->with('PC')->get();
        $clicense   = C_license::select()->with('license_cate','license')->get();
        $city = City::select()->get();
        $category = Category::select()->get();
        $now = Carbon::today()->format('y-m-d');
        return view('investment.create',compact('now','category','city','clicense','place_cat','place'));
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

        $file1 = "";
        if($feasibility_study = $request->file('feasibility_study')){
            $file_extension = $request->feasibility_study->getclientoriginalExtension();
            $file1 = time() . 'feasibility_study'. '.' . $file_extension;
            $path = 'attatcment_project';
            $feasibility_study -> move($path, $file1);
            $feasibility_study = $file1 ;
        }
        $file2 = "";
        if($nid_photo = $request->file('nid_photo')){
            $file_extension = $request->nid_photo->getclientoriginalExtension();
            $file2 = time() . 'nid_photo'.'.' . $file_extension;
            $path = 'attatcment_project';
            $nid_photo -> move($path, $file2);
            $nid_photo = $file2 ;
        }
        $file3 = "";
        if($financial_capital = $request->file('financial_capital')){
            $file_extension = $request->financial_capital->getclientoriginalExtension();
            $file3 = time() . 'financial_capital'.'.' . $file_extension;
            $path = 'attatcment_project';
            $financial_capital -> move($path, $file3);
            $financial_capital = $file3 ;
        }
        $file4 = "";
        if($commercial_register = $request->file('commercial_register')){
            $file_extension = $request->commercial_register->getclientoriginalExtension();
            $file4 = time() . 'commercial_register'. '.' . $file_extension;
            $path = 'attatcment_project';
            $commercial_register -> move($path, $file4);
            $commercial_register = $file4 ;
        }
        $file5 = "";
        if($tax_card = $request->file('tax_card')){
            $file_extension = $request->tax_card->getclientoriginalExtension();
            $file5 = time() . 'tax_card'. '.' . $file_extension;
            $path = 'attatcment_project';
            $tax_card -> move($path, $file5);
            $tax_card = $file5 ;
        }
        $file6 = "";
        if($site_sketch = $request->file('site_sketch')){
            $file_extension = $request->site_sketch->getclientoriginalExtension();
            $file6 = time() . 'site_sketch'.'.' . $file_extension;
            $path = 'attatcment_project';
            $site_sketch -> move($path, $file6);
            $site_sketch = $file6 ;
        }
        $file7 = "";
        if($location_string = $request->file('location_string')){
            $file_extension = $request->location_string->getclientoriginalExtension();
            $file7 = time() .'location_string'. '.' . $file_extension;
            $path = 'attatcment_project';
            $location_string -> move($path, $file7);
            $location_string = $file7 ;
        }
        // else{
        //     $feasibility_study = "";
        //     $nid_photo = "";
        //     $financial_capital = "";
        //     $commercial_register = "";
        //     $tax_card = "";
        //     $site_sketch = "";
        //     $location_string = "";
        //  }

        // try{
            $request   = RequestP:: create(([
             'name' => $request['name'],
             'category_id' => $request['category_id'],
             'sub_ctegory_id' => $request['sub_ctegory_id'],
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

             $project = Project::create(([
                'feasibility_study' =>$file1,
                'financial_capital' =>$file2,
                'commercial_register' =>$file3,
                'tax_card' =>$file4,
                'site_sketch' =>$file5,
                'location_string' =>$file6,
                'nid_photo' =>$file7,
                'name' =>$request['name'],
                'request_id' =>$request->id,

             ]));

            return redirect()->route('section.Create',[$request->id , $request->category_id])-> with(['success' => 'تم التسجيل بنجاح']);
        // }catch(\Exception $ex){
        //     return redirect()->route('investment')-> with(['error' => 'خطأ'.$ex]);
        // }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $project = Project::select()->with('request_PJ')->where('request_id',$id)->get();
        $r_license = R_license::select()->with('L_Lisense','R_Lisense')->get();
        $request = RequestP::select()->with('categoryname','city')->find($id);
        return view('investment.edit',compact('request','r_license','project'));
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
        $project = Project::where('request_id',$id)->delete('request_id');
        $user = RequestP::with('Project_Rq')->find($id);


        $user->delete();

        return redirect()->route('investment')->with(['success' => 'تم الحذف بنجاح']);
    }

    /**
     * Display a listing of the projects of investment.
     */
    // public function project(){
    //     return view('investment.project.index');
    // }
    // /**
    //  * Show the form for creating a new projects of investment.
    //  */
    // public function project_create(){
    //     return view('investment.project.create');
    // }


}
