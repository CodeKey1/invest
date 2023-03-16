<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\Gov;
use App\Models\City;
use App\Models\Place;
use App\Models\Place_Category as PCat;

use App\Models\Category;
use App\Models\SubCategory as scat;
use App\Models\License;
use App\Models\C_license;

use App\Models\Contract_type;
use App\Models\Asset_type;

class AppModifyController extends Controller
{
    public function index()
    {
        $gov = Gov::select()->with('cityname')->get();
        $city = City::select()->with('govname')->get();
        $place = Place::select()->get();
        $placeCat = PCat::select()->get();

        $category = category::select()->get();
        $subcategory = scat::select()->get();
        $license = License::select()->get();
        $clicense = C_license::select()->get();
        
        $contract = Contract_type::select()->get();
        $assets = Asset_type::select()->get();
        return view('users.app_modify',compact('gov','city','place','placeCat','category','subcategory','license','clicense','contract','assets'));
    }

    public function create(Request $request){
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
            case 'placeCategorybtn':
                $areaType = $request['p_category_name'];
                try{ 
                    PCat::create(([
                     'name' => $areaType,
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
            }
    }

}
