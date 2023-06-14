<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\license;
use App\Models\Category;
use App\Models\City;
use App\Models\Place;
use App\Models\Place_Category;
use App\Models\Request_places;
use App\Models\User_have_type;
use App\Models\Request_technical as r_tech;
use App\Models\Project;
use App\Models\R_license;
use App\Models\SubCategory;
use App\Models\RequestP;
use App\Models\Request_note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class InvestmentController extends Controller
{
    /**
     * investment request.
     */
    public function index()
    {
        //
        $r_license = R_license::select()->get();
        $request   = RequestP::select()->with('categoryname','city','rl','subCat')->get();
        return view('investment.index',compact('request','r_license'));
    }
    public function create()
    {
        $type = User_have_type::select()->find(auth()->user()->id);
        $place = Place::select()->with('cityPlace')->get();
        $license = license::select()->get();
        $city = City::select()->get();
        $category = Category::select()->get();
        $sub_cat = SubCategory::select()->get();
        $now = Carbon::today()->format('y-m-d');
        return view('investment.create',compact('now','category','sub_cat','city','license','place','type'));
    }

    public function store(Request $request)
    {
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
        // if(!$request->license)
        //     return redirect()->back()->with(['error'=>'تأكد من اختيار جهات الموافقة']);
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
                'recived_date' => $request['recived_date'] ,
                'city_id' =>$request['city_id'],
                'phone' =>$request['phone'],
                'state' =>0,
                'capital' =>$request['capital'],
                'currency_type' =>$request['currency_type'],
                'description' => $request['description'],
             ]));
            $company_file = "";
            if($company_reg = $request->file('company_reg')){
                $file_extension = $request->company_reg->getclientoriginalExtension();
                $company_file = $request_id->id . 'company_reg'. '.' . $file_extension;
                $path = 'attatcment_project';
                $company_reg -> move($path, $company_file);
                $company_reg = $company_file ;
            }
            $nid_file = "";
            if($nid_photo = $request->file('nid_photo')){
                $file_extension = $request->nid_photo->getclientoriginalExtension();
                $nid_file = $request_id->id . 'nid_photo'.'.' . $file_extension;
                $path = 'attatcment_project';
                $nid_photo -> move($path, $nid_file);
                $nid_photo = $nid_file ;
            }
            $financial_file = "";
            if($financial_capital = $request->file('financial_capital')){
                $file_extension = $request->financial_capital->getclientoriginalExtension();
                $financial_file = $request_id->id . 'financial_capital'.'.' . $file_extension;
                $path = 'attatcment_project';
                $financial_capital -> move($path, $financial_file);
                $financial_capital = $financial_file ;
            }
            $commercial_file = "";
            if($commercial_register = $request->file('commercial_register')){
                $file_extension = $request->commercial_register->getclientoriginalExtension();
                $commercial_file = $request_id->id . 'commercial_register'. '.' . $file_extension;
                $path = 'attatcment_project';
                $commercial_register -> move($path, $commercial_file);
                $commercial_register = $commercial_file ;
            }
            $tax_file = "";
            if($tax_card = $request->file('tax_card')){
                $file_extension = $request->tax_card->getclientoriginalExtension();
                $tax_file = $request_id->id . 'tax_card'. '.' . $file_extension;
                $path = 'attatcment_project';
                $tax_card -> move($path, $tax_file);
                $tax_card = $tax_file ;
            }
            $site_file = "";
            if($site_sketch = $request->file('site_sketch')){
                $file_extension = $request->site_sketch->getclientoriginalExtension();
                $site_file = $request_id->id . 'site_sketch'.'.' . $file_extension;
                $path = 'attatcment_project';
                $site_sketch -> move($path, $site_file);
                $site_sketch = $site_file ;
            }
            $feasibility_file = "";
            if($feasibility_study = $request->file('feasibility_study')){
                $file_extension = $request->feasibility_study->getclientoriginalExtension();
                $feasibility_file = $request_id->id .'feasibility_study'. '.' . $file_extension;
                $path = 'attatcment_project';
                $feasibility_study -> move($path, $feasibility_file);
                $feasibility_study = $feasibility_file ;
            }
            $record_file = "";
            if($record = $request->file('record')){
                $file_extension = $request->record->getclientoriginalExtension();
                $record_file = $request_id->id .'record'. '.' . $file_extension;
                $path = 'attatcment_project';
                $record -> move($path, $record_file);
                $record = $record_file ;
            }
            Project::create(([
               'feasibility_study'   =>$feasibility_file,
               'financial_capital'   =>$financial_file,
               'commercial_register' =>$commercial_file,
               'tax_card'            =>$tax_file,
               'site_sketch'         =>$site_file,
               'company_reg'         =>$company_file,
               'nid_photo'           =>$nid_file,
               'record'              =>$record_file,
               'name'                =>$request['name'],
               'request_id'          =>$request_id->id,
               'status'              =>0,
            ]));
            if($request->region)
                for($i = 0 ; $i < count($request->region) ; $i++){
                    $region[] = $request->region[$i];
                    $Request_places = Request_places:: create(([
                        'suggested_places' => $region[$i],
                        'request_id' => $request_id->id,
                    ]));
                }
            for($i = 0 ; $i< count($request->license) ; $i++){
                $li[] = $request->license[$i];
                R_license::create(([
                    'request_id' => $request_id->id,
                    'license_id' => $li[$i],
                ]));
            }
            return redirect()->action([InvestmentController::class, 'record'], ['id' => $request_id->id]);
        }catch(\Exception $ex){
            return redirect()->route('investment')-> with(['error' => 'خطأ'.$ex]);
        }
    }

    public function show(string $id)
    {
        if (auth()->user()->hasRole('super_admin')||auth()->user()->hasRole('user')||auth()->user()->hasRole('city')){
            $city = City::select()->get();
            $project = Project::select()->with('request_PJ')->where('request_id',$id)->get();
            $r_license = R_license::select()->with('L_Lisense','R_Lisense')->where('request_id',$id)->get();
            $request = RequestP::select()->with('req_place','categoryname','city')->find($id);
            $license   = license::select()->get();
            $request_places = Request_places::select()->with('Req_place')->where('request_id',$id)->get();
            $place = Place::select()->with('cityPlace')->get();
            return view('investment.edit',compact('request','city','license','r_license','project','request_places','place'));
        }else
            abort(403, 'user doesn\'t have access');
    }

    public function update(Request $request, string $id)
    {
        if (auth()->user()->hasRole('super_admin')){
            $project_name = Project::select()->where('request_id',$id)->first();
            $company_file = $project_name->company_reg;
            if($company_reg = $request->file('company_reg')){
                $file_extension = $request->company_reg->getclientoriginalExtension();
                $company_file = $id . 'company_reg'. '.' . $file_extension;
                $path = 'attatcment_project';
                $company_reg -> move($path, $company_file);
                $company_reg = $company_file ;
            }
            $nid_file = $project_name->nid_photo;
            if($nid_photo = $request->file('nid_photo')){
                $file_extension = $request->nid_photo->getclientoriginalExtension();
                $nid_file = $id . 'nid_photo'.'.' . $file_extension;
                $path = 'attatcment_project';
                $nid_photo -> move($path, $nid_file);
                $nid_photo = $nid_file ;
            }
            $financial_file = $project_name->financial_capital;
            if($financial_capital = $request->file('financial_capital')){
                $file_extension = $request->financial_capital->getclientoriginalExtension();
                $financial_file = $id . 'financial_capital'.'.' . $file_extension;
                $path = 'attatcment_project';
                $financial_capital -> move($path, $financial_file);
                $financial_capital = $financial_file ;
            }
            $commercial_file = $project_name->commercial_register;
            if($commercial_register = $request->file('commercial_register')){
                $file_extension = $request->commercial_register->getclientoriginalExtension();
                $commercial_file = $id . 'commercial_register'. '.' . $file_extension;
                $path = 'attatcment_project';
                $commercial_register -> move($path, $commercial_file);
                $commercial_register = $commercial_file ;
            }
            $tax_file = $project_name->tax_card;
            if($tax_card = $request->file('tax_card')){
                $file_extension = $request->tax_card->getclientoriginalExtension();
                $tax_file = $id . 'tax_card'. '.' . $file_extension;
                $path = 'attatcment_project';
                $tax_card -> move($path, $tax_file);
                $tax_card = $tax_file ;
            }
            $site_file = $project_name->site_sketch;
            if($site_sketch = $request->file('site_sketch')){
                $file_extension = $request->site_sketch->getclientoriginalExtension();
                $site_file = $id . 'site_sketch'.'.' . $file_extension;
                $path = 'attatcment_project';
                $site_sketch -> move($path, $site_file);
                $site_sketch = $site_file ;
            }
            $feasibility_file = $project_name->feasibility_study;
            if($feasibility_study = $request->file('feasibility_study')){
                $file_extension = $request->feasibility_study->getclientoriginalExtension();
                $feasibility_file = $id .'feasibility_study'. '.' . $file_extension;
                $path = 'attatcment_project';
                $feasibility_study -> move($path, $feasibility_file);
                $feasibility_study = $feasibility_file ;
            }
            $record_file = $project_name->record;
            if($record = $request->file('record')){
                $file_extension = $request->record->getclientoriginalExtension();
                $record_file = $id .'record'. '.' . $file_extension;
                $path = 'attatcment_project';
                $record -> move($path, $record_file);
                $record = $record_file ;
            }
            try{
                $request_id   = RequestP::where('id',$id)-> update(([
                     'address' =>$request['address'],
                     'representative_name' =>$request['representative_name'],
                     'representative_id' =>$request['representative_id'],
                     'NID' =>$request['NID'],
                     'phone' =>$request['phone'],
                     'size' =>$request['size'],
                     'size_type' =>$request['size_type'],
                     'capital' =>$request['capital'],
                     'currency_type' =>$request['currency_type'],
                     'Self_financing' =>$request['Self_financing'],
                     'recived_date' => $request['recived_date'] ,
                     'city_id' =>$request['city_id'],
                     'description' =>$request['description'],
                     'state' =>0,
                     'technical_state' =>2,
    
                  ]));
                Project::where('request_id',$id)->update(([
                    'feasibility_study'   =>$feasibility_file,
                    'financial_capital'   =>$financial_file,
                    'commercial_register' =>$commercial_file,
                    'tax_card'            =>$tax_file,
                    'site_sketch'         =>$site_file,
                    'company_reg'         =>$company_file,
                    'nid_photo'           =>$nid_file,
                    'record'              =>$record_file,
                 ]));
                if($request->region){
                    Request_places::where('request_id',$id)->delete ('request_id');
                    for($i = 0 ; $i < count($request->region) ; $i++){
                        $region[] = $request->region[$i];
                       $Request_places = Request_places:: create(([
                        'suggested_places' => $region[$i],
                        'request_id' => $id,
                    ]));
                    }
                }
                return redirect()->route('investment')-> with(['success' => 'تم التسجيل بنجاح']);
            }catch(\Exception $ex){
                return redirect()->route('investment')-> with(['error' => 'خطأ'.$ex]);
            }
        }else
            abort(403, 'user doesn\'t have access');
    }

    public function destroy(string $id)
    {
        if (auth()->user()->hasRole('super_admin')){
            $project = Project::where('request_id',$id)->delete('request_id');
            $request_suggested_places = Request_places::where('request_id',$id)->delete ('request_id');
            $request_notes = Request_note::where('request_id',$id)->delete ('request_id');
            $request_license = R_license::where('request_id',$id)->delete('request_id');
            $r_tech = r_tech::where('request_id',$id)->delete('request_id');
            $user = RequestP::with('Project_Rq')->find($id);
            $user->delete();

            return redirect()->route('investment')->with(['success' => 'تم الحذف بنجاح']);
        }else
            abort(403, 'user doesn\'t have access');
    }

    /**
     * record request.
     */

    public function lecturer()
    {
        //
        $request   = RequestP::select()->with('categoryname','city','rl','subCat')->get();
        $r_license = R_license::select()->with('L_Lisense','R_Lisense')->get();
        return view('investment.lecturer.index',compact('request','r_license'));
    }

    public function record(string $id)
    {
        //
        $city = City::select()->get();
        $clicense   = R_license::select()->get();
        $project = Project::select()->where('request_id',$id)->get();
        $r_license = R_license::select()->where('request_id',$id)->get();
        $r_note = Request_note::select()->where('request_id',$id)->get();
        $request = RequestP::select()->find($id);
        $request_places = Request_places::select()->where('request_id',$id)->get();
        $r_tech = r_tech::select()->where('request_id',$id)->get();
        return view('investment.lecturer.create',compact('request','city','clicense','r_license','r_note','project','request_places','r_tech'));
    }

    public function record_store(Request $request)
    {
        try{
            for($i = 0 ; $i < count($request->r_id) ; $i++){
                $record_name = R_license::select()->where('id',$request->r_id[$i])->first();
                $file_name = $record_name->file;
                try{
                    if($file = $request->send_file[$i]){
                        $file_extension = $file->getclientoriginalExtension();
                        $file_name = $request->r_id[$i].' send_file'. '.' . $file_extension;
                        $path = 'project_inquiry_file';
                        $file -> move($path, $file_name);
                    }
                }catch( \Exception $ex){}
                $r_license = R_license::where('id', $request->r_id[$i])-> update(([
                    'send_date' => $request->send_date[$i],
                    'file' => $file_name,
                    'state' => 2,
                    'point' => ($record_name->point)+1,
                ]));
            }
            return redirect()->back()-> with(['success' => 'نجح']);
        }catch( \Exception $ex){
            return redirect()->back()-> with(['error' => ' خطأ '.$ex]); 
        }

    }

    public function request_approve(Request $request,string $id)
    {
        switch($request['actionBTN']){
            case 'approve':
                RequestP::where('id',$id)-> update(([
                    'state' =>1,
                    'technical_state'=>2
                ]));
                break;
            case 'dissApprove':
                RequestP::where('id',$id)-> update(([
                    'state' =>0,
                    'technical_state'=>2
                ]));
                break;
        }
         return redirect()->back();
    }

    public function note_store(Request $request, string $id)
    {
        try{
            for($i = 0 ; $i < count($request->l_name) ; $i++){
                Request_note::create([
                    'notes' => $request->note,
                    'request_id' => $id,
                    'license_id' => $request->l_name[$i],
                    'sender' => auth()->user()->id,
                ]);
            }
            return redirect()->back();
        }catch(\Exception $ex){
            return redirect()->route('lecturer')-> with(['error' => ' خطأ '.$ex]);
        }

    }

    public function note_delete(string $id)
    {
        $request_notes = Request_note::find($id)->delete();
        return redirect()->back();
    }

    /**
     * technical request.
     */

    public function tech()
    {
        //
        $request   = RequestP::select()->where('state',1)->get();
        //$r_license = R_license::select()->with('L_Lisense','R_Lisense')->get();
        return view('investment.tech.index',compact('request'));
    }

    public function tech_create(string $id){
        $project = Project::select()->where('request_id',$id)->get();
        $tech = r_tech::select()->where('request_id',$id)->get();
        $request = RequestP::select()->find($id);
        $request_places = Request_places::select()->where('request_id',$id)->get();
        return view('investment.tech.create',compact('request','project','request_places','tech'));
    }

    public function tech_approve(Request $request,string $id)
    {
        echo "<script>";
        echo "if (!confirm('هل انت متأكد من تعزيز الطلب'))return false;";
        echo "</script>";
        switch($request['actionBTN']){
            case 'approve':
                RequestP::where('id',$id)-> update(([
                    'technical_state' =>1,
                ]));
                break;
            case 'dissApprove':
                RequestP::where('id',$id)-> update(([
                    'technical_state' =>0,
                ]));
                break;
        }
         return redirect()->back();
    }

    public function tech_note(Request $request, string $id)
    {
        try{
            r_tech::create([
                'note' => $request->note,
                'request_id' => $id,
            ]);
            if($request->isConfirmed){
                RequestP::where('id',$id)-> update(([
                    'technical_state' =>1,
                ]));
            }else{
                RequestP::where('id',$id)-> update(([
                    'technical_state' =>2,
                ]));
            }
            return redirect()->back();
        }catch(\Exception $ex){
            return redirect()->route('tech')-> with(['error' => ' خطأ '.$ex]);
        }
    }

    public function tech_delete(string $id)
    {
        r_tech::find($id)->delete();
        return redirect()->back();
    }
}
