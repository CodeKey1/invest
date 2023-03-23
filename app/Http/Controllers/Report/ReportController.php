<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Auction;
use App\Models\Asset;
use App\Models\Offer;
use App\Models\contract_type;

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
    /**
     * Display the specified resource.
     */
    public function acution_report(Request $request)
    {
        $auction_id =  $request['auction'];
        $auction = Auction::select()->get(); 
        $offer = Offer::where('auction_id','=', $auction_id)->get(); 
        return view('report.report',compact('auction','offer'));
    }
}
