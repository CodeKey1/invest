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
        $offers = Offer::select()->get();
        $auctions = Auction::select()->get()->take(11);
        $req = RequestP::select()->get();
        $delaiy_req = RequestP::select()->where('state',0)->get();
        $now = Carbon::today()->format('y-m-d');
        $users = $this->userChart();
        return view('home',compact('users','req','auctions','offers','delaiy_req','now'));

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
            $now1 =  $now1->subMonth();
            $reject =  RequestP::whereMonth('recived_date', $i)->whereYear('recived_date', $now1->year)->where('technical_state',0)->get();
            $pend =  RequestP::whereMonth('recived_date', $i)->whereYear('recived_date', $now1->year)->where('technical_state',2)->get();
            $finish =  RequestP::whereMonth('recived_date', $i)->whereYear('recived_date', $now1->year)->where('technical_state',1)->get();
            array_push($month, $now1->format('M').' '.$now1->format('Y'));
            array_push($pending, $pend->count());
            array_push($finished, $finish->count());
            array_push($rejected, $reject->count());
        }

        $master['month'] = json_encode($month);
        $master['pending'] = json_encode($pending);
        $master['finished'] = json_encode($finished);
        $master['rejected'] = json_encode($rejected);
        return $master;
    }
}
