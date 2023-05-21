<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Auction;
use App\Models\Asset;
use App\Models\Offer;
use App\Models\contract_type;

use App\Models\RequestP;
use App\Models\R_license;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Request_places;
use App\Models\Request_technical as r_tech;
use App\Models\Request_note;
use App\Models\Project;

use Illuminate\Support\Facades\DB as DB;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $auction = Auction::select()->get(); 
        $offer = Offer::where('auction_id','=',2)->get(); 
        return view('report.report',compact('auction'));
    }

    public function request_index()
    {
        $request = RequestP::select()->get(); 
        $category = Category::select()->get(); 
        $sub_cat = SubCategory::select()->get(); 
        $city = City::select()->get(); 
        return view('report.request_report',compact('category','request','sub_cat','city'));
    }

    public function single_index()
    {      
        $request = RequestP::select()->get(); 
        return view('report.single_report',compact('request'));
    }
    /**
     * Display the specified resource.
     */
    public function acution_report(Request $request)
    {
        $auction_id =  $request['auction'];
        $report_type =  $request['type'];
        $auction = Auction::select()->get(); 
        switch($report_type){
            case 'all':
                $offer = Offer::where('auction_id','=', $auction_id)->get(); 
                $offerDetail = DB::table('offer')
                    ->select('auction.name as name',
                            'auction.date as date',
                            DB::raw('count(DISTINCT offer.id) as offer_count'),
                            DB::raw('sum(offer.contract_cost) as cost_sum'),
                            DB::raw('count(DISTINCT assets.id) as asset_count'),
                            )
                    ->join('auction','auction.id','=','offer.auction_id')
                    ->join('assets','assets.id','=','offer.assets_id')
                    ->groupBy('auction.id','assets.id','auction.name','auction.date')
                    ->get();
                $type = "اجمالي";
                return view('report.report',compact('auction','offer','offerDetail','type'));
                break;
            case 'active':
                $offer = Offer::where('auction_id','=', $auction_id)->where('status','=','1')->get(); 
                $offerDetail = DB::table('offer')
                    ->select('auction.name as name',
                            'auction.date as date',
                            DB::raw('count(DISTINCT offer.id) as offer_count'),
                            DB::raw('sum(offer.contract_cost) as cost_sum'),
                            DB::raw('count(DISTINCT assets.id) as asset_count'),
                            )
                    ->join('auction','auction.id','=','offer.auction_id')
                    ->join('assets','assets.id','=','offer.assets_id')
                    ->where('offer.status','=','1')
                    ->groupBy('auction.id','assets.id','auction.name','auction.date')
                    ->get();
                $type = "الاطروحات الفعالة";
                return view('report.report',compact('auction','offer','offerDetail','type'));
                break;
            case 'hold':
                $offer = Offer::where('auction_id','=', $auction_id)->where('status','=','0')->get(); 
                $offerDetail = DB::table('offer')
                    ->select('auction.name as name',
                            'auction.date as date',
                            DB::raw('count(DISTINCT offer.id) as offer_count'),
                            DB::raw('sum(offer.contract_cost) as cost_sum'),
                            DB::raw('count(DISTINCT assets.id) as asset_count'),
                            )
                    ->join('auction','auction.id','=','offer.auction_id')
                    ->join('assets','assets.id','=','offer.assets_id')
                    ->where('offer.status','=','0')
                    ->groupBy('auction.id','assets.id','auction.name','auction.date')
                    ->get();
                $type = "الاطروحات الغير فعالة";
                return view('report.report',compact('auction','offer','offerDetail','type'));
                break;
        }
        //return redirect()->route('offer') -> with(['success' => $offerDetail]); 
    }
    public function request_report(Request $request)
    {
        $cat_id =  $request['category'];
        $sub_cat_id =  $request['sub_cat'];
        $owner_type =  $request['owner_type'];
        $city_id =  $request['city'];
        
        $request_detail = RequestP::whereRaw('category_id '. $cat_id)
            ->whereRaw('sub_category_id '. $sub_cat_id)
            ->whereRaw('owner_type '. $owner_type)
            ->whereRaw('city_id '. $city_id)->get(); 

        $request = RequestP::select()->get(); 
        $category = Category::select()->get(); 
        $sub_cat = SubCategory::select()->get(); 
        $city = City::select()->get(); 

        $category_name = Category::select()->whereRaw('id '.$cat_id)->get(); 
        $sub_cat_name = SubCategory::select()->whereRaw('id '.$sub_cat_id)->get(); 
        $city_name = City::select()->whereRaw('id '.$city_id)->get(); 
        $owner_type = str_replace(array("'","'","="), '', $owner_type);

        return view('report.request_report',compact('category','request','sub_cat','city','request_detail','category_name','sub_cat_name','city_name','owner_type'));
    }
    public function single_report(string $id)
    {
        $request = RequestP::select()->find($id); 
        $tech = r_tech::select()->where('request_id',$id)->get();
        $r_note = Request_note::select()->where('request_id',$id)->get();
        $project = Project::select()->where('request_id',$id)->get();
        $request_places = Request_places::select()->where('request_id',$id)->get();
        $license = R_license::select()->where('request_id',$id)->get();
        return view('report.single_request_report',compact('request','tech','r_note','project','request_places','license'));
    }
    
}
