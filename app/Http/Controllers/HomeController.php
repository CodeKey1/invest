<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use App\Models\Offer;
use App\Models\RequestP;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $now = Carbon::today();
        $now1 = Carbon::today();
        $orderChart = $this->orderChart();
        $offers = Offer::select()->where('status',1)->whereYear('work_date',$now->year)->get();
        $prev_offers = Offer::select()->where('status',1)->whereYear('work_date',$now->subYear())->get();
        $auctions = Auction::select()->get();
        $req = RequestP::select()->whereYear('recived_date',$now1->year)->get();
        $accepted_req = RequestP::select()->where('technical_state',1)->whereYear('recived_date',$now1->year)->get();
        $delaiy_req = RequestP::select()->where('state',0)->get();
        $prev_year_req = RequestP::select()->where('technical_state',1)->whereYear('recived_date', ($now1->subYear()))->get();
        $now = Carbon::today()->format('y-m-d');
        $users = $this->userChart();
        return view('home',compact('users','req','auctions','offers','delaiy_req','accepted_req','now','orderChart','prev_year_req','prev_offers'));

    }
    public function userChart()
    {
        $now = Carbon::now();
        $now1 = Carbon::now();
        $month = [];
        $rejected = [];
        $finished = [];
        $pending = [];
        for ($i = $now->month; $i >= $now->month-12; $i--)
        {
            $reject =  RequestP::whereMonth('recived_date', $i)->whereYear('recived_date', $now1->year)->where('technical_state',0)->get();
            $pend =  RequestP::whereMonth('recived_date', $i)->whereYear('recived_date', $now1->year)->where('technical_state',2)->get();
            $finish =  RequestP::whereMonth('recived_date', $i)->whereYear('recived_date', $now1->year)->where('technical_state',1)->get();
            array_push($month, $now1->format('M').' '.$now1->format('Y'));
            array_push($pending, $pend->count());
            array_push($finished, $finish->count());
            array_push($rejected, $reject->count());
            $now1 =  $now1->subMonth();
        }

        $master['month'] = json_encode($month);
        $master['pending'] = json_encode($pending);
        $master['finished'] = json_encode($finished);
        $master['rejected'] = json_encode($rejected);
        return $master;
    }
    public function orderChart()
    {

        $now = Carbon::today();
        $master = array();

        array_push(
            $master,
            RequestP::select()->whereYear('recived_date',$now->year)->where('technical_state',1)->count(),
            RequestP::select()->whereYear('recived_date',$now->year)->where('technical_state',2)->count(),
            RequestP::select()->whereYear('recived_date',$now->year)->where('technical_state',0)->count(),
        );

        return ['data' => json_encode($master)];
    }
}