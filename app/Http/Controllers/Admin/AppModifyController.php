<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\Gov;
use App\Models\City;
use App\Models\Place;

use App\Models\Category;
use App\Models\SubCategory as scat;
use App\Models\License;
use App\Models\C_license;

use App\Models\Contract_type;
use App\Models\Asset_type;
use App\Models\Asset;

class AppModifyController extends Controller
{
    public function index()
    {
        if (auth()->user()->hasRole('super_admin')){
            $gov = Gov::select()->with('cityname')->get();
            $city = City::select()->with('govname')->get();
            $place = Place::select()->get();
            
            $category = category::select()->get();
            $subcategory = scat::select()->get();
            $license = License::select()->get();
            $clicense = C_license::select()->get();
            
            $contract = Contract_type::select()->get();
            $assets = Asset_type::select()->get();
            $asset = Asset::select()->get();
            return view('users.app_modify',compact('gov','city','place','category','subcategory','license','clicense','contract','assets','asset'));
        }else
            abort(403, 'user doesn\'t have access');
    }

    public function create(Request $request){
        if (auth()->user()->hasRole('super_admin')){
            $form = $request['actionbtn'];
            switch($form){
                //places action button
                case 'govbtn':
                    $gov_name = $request['gov_name'];
                    try{ 
                        Gov::create(([
                         'name' => $gov_name,
                         ]));
                        return redirect()->route('app.modify')-> with(['success' => 'تم التسجيل بنجاح']);
                    }catch(\Exception $ex){
                        return redirect()->route('app.modify')-> with(['error' => 'خطأ']);
                    }
                    break;
                case 'citybtn':
                    $gov = $request['gov'];
                    $city_name = $request['city_name'];
                    try{ 
                        City::create(([
                         'name' => $city_name,
                         'gov_id' => $gov,
                         ]));
                        return redirect()->route('app.modify')-> with(['success' => 'تم التسجيل بنجاح']);
                    }catch(\Exception $ex){
                        return redirect()->route('app.modify')-> with(['error' => 'خطأ']);
                    }
                    break;
                case 'placebtn':
                    $place = $request['area_name'];
                    $city = $request['city'];
                    $areaType = $request['areaType'];
                    $status = $request['areaStatus']?$request['areaStatus']:1;
                    try{ 
                        Place::create(([
                         'name' => $place,
                         'status' => $status,
                         'place_category_id' => $areaType,
                         'city_id' => $city,
                         ]));
                        return redirect()->route('app.modify')-> with(['success' => 'تم التسجيل بنجاح']);
                    }catch(\Exception $ex){
                        return redirect()->route('app.modify')-> with(['error' => 'خطأ']);
                    }
                    break;
                //project action button
                case 'catbtn':
                    $category_name = $request['category_name'];
                    try{ 
                        Category::create(([
                         'name' => $category_name,
                         ]));
                        return redirect()->route('app.modify')-> with(['success' => 'تم التسجيل بنجاح']);
                    }catch(\Exception $ex){
                        return redirect()->route('app.modify')-> with(['error' => 'خطأ']);
                    }
                    break;
                case 'subcatbtn':
                    $sub_category = $request['sub_category_name'];
                    $category = $request['category'];
                    try{ 
                        scat::create(([
                         'name' => $sub_category,
                         'category_id' => $category,
                         ]));
                        return redirect()->route('app.modify')-> with(['success' => 'تم التسجيل بنجاح']);
                    }catch(\Exception $ex){
                        return redirect()->route('app.modify')-> with(['error' => 'خطأ'.$ex]);
                    }
                    break;
                case 'licensebtn':
                    $l_name = $request['license_name'];
                    try{ 
                        License::create(([
                         'name' => $l_name,
                         ]));
                        return redirect()->route('app.modify')-> with(['success' => 'تم التسجيل بنجاح']);
                    }catch(\Exception $ex){
                        return redirect()->route('app.modify')-> with(['error' => 'خطأ'.$ex]);
                    }
                    break;
                case 'cLicensebtn':
                    $category = $request['category'];
                    for($i = 0 ; $i< count($request->category_license) ; $i++){
                        $license[] = $request->category_license[$i];
                        c_license::create(([
                         'category_id' => $category,
                         'license_id' => $license[$i],
                         ]));
                    }
                    return redirect()->route('app.modify')-> with(['success' => 'تم التسجيل بنجاح']);
                    break;
                //other action button
                case 'contractbtn':
                    $contract = $request['contract_name'];
                    try{ 
                        Contract_type::create(([
                         'name' => $contract,
                         ]));
                        return redirect()->route('app.modify')-> with(['success' => 'تم التسجيل بنجاح']);
                    }catch(\Exception $ex){
                        return redirect()->route('app.modify')-> with(['error' => 'خطأ'.$ex]);
                    }
                    break;
                case 'assetbtn':
                    $assets = $request['assets_category_name'];
                    try{ 
                        Asset_type::create(([
                         'name' => $assets,
                         ]));
                        return redirect()->route('app.modify')-> with(['success' => 'تم التسجيل بنجاح']);
                    }catch(\Exception $ex){
                        return redirect()->route('app.modify')-> with(['error' => 'خطأ'.$ex]);
                    }
                    break;
                case 'newAssetbtn':
                    $asset_number = $request['asset_number'];
                    $asset_name = $request['asset_name'];
                    $asset_address = $request['asset_address'];
                    $status = 0;
                    $note = $request['note'];
                    $city_id = $request['city_id'];
                    $asset_type = $request['asset_type'];
                    $contract_type = $request['contract_type'];
                    try{ 
                        Asset::create(([
                         'number' => $asset_number,
                         'name' => $asset_name,
                         'address' => $asset_address,
                         'status' => $status,
                         'note' => $note,
                         'city_id' => $city_id,
                         'assets_type_id' => $asset_type,
                         'contract_type_id' => $contract_type,
                         ]));
                        return redirect()->route('app.modify')-> with(['success' => 'تم التسجيل بنجاح']);
                    }catch(\Exception $ex){
                        return redirect()->route('app.modify')-> with(['error' => 'خطأ'.$ex]);
                    }
                    break;
                }
        }else
            abort(403, 'user doesn\'t have access');
    }

}
