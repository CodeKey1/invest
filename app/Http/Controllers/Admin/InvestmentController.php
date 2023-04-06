<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\C_license;
use App\Models\Category;
use App\Models\City;
use App\Models\Place;
use App\Models\Place_Category;
use App\Models\Request_places;
use App\Models\Project;
use App\Models\R_license;
use App\Models\Request_not;
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
        $request   = RequestP::select()->with('categoryname','city','rl','subCat')->get();
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
        $place = Place::select()->with('cityPlace')->get();
        $clicense   = C_license::select()->with('license_cate','license')->get();
        $city = City::select()->get();
        $category = Category::select()->get();
        $sub_cat = SubCategory::select()->get();
        $now = Carbon::today()->format('y-m-d');
        return view('investment.create',compact('now','category','sub_cat','city','clicense','place'));
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

        $company_file = "";
        if($company_reg = $request->file('company_reg')){
            $file_extension = $request->company_reg->getclientoriginalExtension();
            $company_file = time() . 'company_reg'. '.' . $file_extension;
            $path = 'attatcment_project';
            $company_reg -> move($path, $company_file);
            $company_reg = $company_file ;
        }
        $nid_file = "";
        if($nid_photo = $request->file('nid_photo')){
            $file_extension = $request->nid_photo->getclientoriginalExtension();
            $nid_file = time() . 'nid_photo'.'.' . $file_extension;
            $path = 'attatcment_project';
            $nid_photo -> move($path, $nid_file);
            $nid_photo = $nid_file ;
        }
        $financial_file = "";
        if($financial_capital = $request->file('financial_capital')){
            $file_extension = $request->financial_capital->getclientoriginalExtension();
            $financial_file = time() . 'financial_capital'.'.' . $file_extension;
            $path = 'attatcment_project';
            $financial_capital -> move($path, $financial_file);
            $financial_capital = $financial_file ;
        }
        $commercial_file = "";
        if($commercial_register = $request->file('commercial_register')){
            $file_extension = $request->commercial_register->getclientoriginalExtension();
            $commercial_file = time() . 'commercial_register'. '.' . $file_extension;
            $path = 'attatcment_project';
            $commercial_register -> move($path, $commercial_file);
            $commercial_register = $commercial_file ;
        }
        $tax_file = "";
        if($tax_card = $request->file('tax_card')){
            $file_extension = $request->tax_card->getclientoriginalExtension();
            $tax_file = time() . 'tax_card'. '.' . $file_extension;
            $path = 'attatcment_project';
            $tax_card -> move($path, $tax_file);
            $tax_card = $tax_file ;
        }
        $site_file = "";
        if($site_sketch = $request->file('site_sketch')){
            $file_extension = $request->site_sketch->getclientoriginalExtension();
            $site_file = time() . 'site_sketch'.'.' . $file_extension;
            $path = 'attatcment_project';
            $site_sketch -> move($path, $site_file);
            $site_sketch = $site_file ;
        }
        $feasibility_file = "";
        if($feasibility_study = $request->file('feasibility_study')){
            $file_extension = $request->feasibility_study->getclientoriginalExtension();
            $feasibility_file = time() .'feasibility_study'. '.' . $file_extension;
            $path = 'attatcment_project';
            $feasibility_study -> move($path, $feasibility_file);
            $feasibility_study = $feasibility_file ;
        }
        try{
            $request_id   = RequestP:: create(([
                'name' => $request['name'],
                'category_id' => $request['category_id'],
                'sub_category_id' => $request['sub_category_id'],
                'owner_type' =>$request['owner_type'],
                'owner_name' =>$request['owner_name'],
                'address' =>$request['address'],
                'representative_name' =>$request['representative_name'],
                'representative_id' =>$request['representative_id'],
                'NID' =>$request['NID'],
                'size' =>$request['size'],
                'size_type' =>$request['size_type'],
                'self_financing' =>$request['Self_financing'],
                'recived_date' => $now ,
                'city_id' =>$request['city_id'],
                'phone' =>$request['phone'],
                'state' =>0,
                'capital' =>$request['capital'],

             ]));

             Project::create(([
                'feasibility_study'   =>$feasibility_file,
                'financial_capital'   =>$financial_file,
                'commercial_register' =>$commercial_file,
                'tax_card'            =>$tax_file,
                'site_sketch'         =>$site_file,
                'company_reg'         =>$company_file,
                'nid_photo'           =>$nid_file,
                'name'                =>$request['name'],
                'request_id'          =>$request_id->id,
             ]));
            for($i = 0 ; $i < count($request->region) ; $i++){
                $region[] = $request->region[$i];
                $Request_places = Request_places:: create(([
                    'suggested_places' => $region[$i],
                    'request_id' => $request_id->id,
                ]));
            }
             return redirect()->route('section.Create',[$request_id->id , $request_id->category_id])-> with(['success' => 'تم التسجيل بنجاح']);
        }catch(\Exception $ex){
            return redirect()->route('investment')-> with(['error' => 'خطأ'.$ex]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $city = City::select()->get();
        $clicense   = C_license::select()->with('license_cate','license')->get();
        $project = Project::select()->with('request_PJ')->where('request_id',$id)->get();
        $r_license = R_license::select()->with('L_Lisense','R_Lisense')->get();
        $request = RequestP::select()->with('req_place','categoryname','city')->find($id);
        $request_places = Request_places::select()->with('Req_place')->where('request_id',$id)->get();
        return view('investment.edit',compact('request','city','clicense','r_license','project','request_places'));
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
         $now = Carbon::today();
         $company_file = "";
         if($company_reg = $request->file('company_reg')){
             $file_extension = $request->company_reg->getclientoriginalExtension();
             $company_file = time() . 'company_reg'. '.' . $file_extension;
             $path = 'attatcment_project';
             $company_reg -> move($path, $company_file);
             $company_reg = $company_file ;
         }
         $nid_file = "";
         if($nid_photo = $request->file('nid_photo')){
             $file_extension = $request->nid_photo->getclientoriginalExtension();
             $nid_file = time() . 'nid_photo'.'.' . $file_extension;
             $path = 'attatcment_project';
             $nid_photo -> move($path, $nid_file);
             $nid_photo = $nid_file ;
         }
         $financial_file = "";
         if($financial_capital = $request->file('financial_capital')){
             $file_extension = $request->financial_capital->getclientoriginalExtension();
             $financial_file = time() . 'financial_capital'.'.' . $file_extension;
             $path = 'attatcment_project';
             $financial_capital -> move($path, $financial_file);
             $financial_capital = $financial_file ;
         }
         $commercial_file = "";
         if($commercial_register = $request->file('commercial_register')){
             $file_extension = $request->commercial_register->getclientoriginalExtension();
             $commercial_file = time() . 'commercial_register'. '.' . $file_extension;
             $path = 'attatcment_project';
             $commercial_register -> move($path, $commercial_file);
             $commercial_register = $commercial_file ;
         }
         $tax_file = "";
         if($tax_card = $request->file('tax_card')){
             $file_extension = $request->tax_card->getclientoriginalExtension();
             $tax_file = time() . 'tax_card'. '.' . $file_extension;
             $path = 'attatcment_project';
             $tax_card -> move($path, $tax_file);
             $tax_card = $tax_file ;
         }
         $site_file = "";
         if($site_sketch = $request->file('site_sketch')){
             $file_extension = $request->site_sketch->getclientoriginalExtension();
             $site_file = time() . 'site_sketch'.'.' . $file_extension;
             $path = 'attatcment_project';
             $site_sketch -> move($path, $site_file);
             $site_sketch = $site_file ;
         }
         $feasibility_file = "";
         if($feasibility_study = $request->file('feasibility_study')){
             $file_extension = $request->feasibility_study->getclientoriginalExtension();
             $feasibility_file = time() .'feasibility_study'. '.' . $file_extension;
             $path = 'attatcment_project';
             $feasibility_study -> move($path, $feasibility_file);
             $feasibility_study = $feasibility_file ;
         }
         try{
             $request_id   = RequestP::where('id',$id)-> update(([

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
                 'state' =>1,

              ]));

              Project::where('id',$id)->update(([
                 'feasibility_study'   =>$feasibility_file,
                 'financial_capital'   =>$financial_file,
                 'commercial_register' =>$commercial_file,
                 'tax_card'            =>$tax_file,
                 'site_sketch'         =>$site_file,
                 'company_reg'         =>$company_file,
                 'nid_photo'           =>$nid_file,
                 'name'                =>$request['name'],
                 'request_id'          =>$request->id,
              ]));
             for($i = 0 ; $i < count($request->region) ; $i++){
                 $region[] = $request->region[$i];
                 $Request_places = Request_places::where('request_id', $id)-> update(([
                     'suggested_places' => $region[$i],
                 ]));
             }
              return redirect()->route('investment')-> with(['success' => 'تم التسجيل بنجاح']);
         }catch(\Exception $ex){
             return redirect()->route('investment')-> with(['error' => 'خطأ'.$ex]);
         }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $project = Project::where('request_id',$id)->delete('request_id');
        $request_suggested_places = Request_places::where('request_id',$id)->delete('request_id');
        $request_license = R_license::where('request_id',$id)->delete('request_id');
        $request_note = Request_not::where('request_id',$id)->delete('request_id');
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

    public function record(string $id){

    }


}
