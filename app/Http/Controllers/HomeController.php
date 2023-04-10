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
        $now = Carbon::today();
        $month = [];
        $service = [];
        $user = [];
        for ($i = 0; $i < 12; $i++)
        {
            $end =  RequestP::whereMonth('created_at', $now->month)->whereYear('created_at', $now->year)->where('state',1)->get();
            $start =  RequestP::whereMonth('created_at', $now->month)->whereYear('created_at', $now->year)->get();
            array_push($month, $now->format('M').' '.$now->format('Y'));
            array_push($service, $end->count());
            array_push($user, $start->count());
            $now =  $now->subMonth();
        }

        $master['service'] = json_encode($service);
        $master['month'] = json_encode($month);
        $master['user'] = json_encode($user);
        return $master;
    }
}
