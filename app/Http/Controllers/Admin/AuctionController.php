<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Auction;
use App\Models\City;
use App\Models\Asset;
use App\Models\contract_type;
use App\Models\Offer;

class AuctionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $auction = Auction::select()->get(); 
        return view('auction.index',compact('auction'));
    }
    public function offer_index()
    {
        $auction = Auction::select()->get(); 
        $city = City::select()->get(); 
        $assets = Asset::select()->get(); 
        $offer = Offer::select()->get(); 
        return view('auction.offer',compact('auction','city','assets','offer'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('auction.create');
    }
    public function offer_create()
    {
        $auction = Auction::select()->get(); 
        $city = City::select()->get(); 
        $assets = Asset::select()->get(); 
        $contract_type = Contract_type::select()->get(); 
        return view('auction.offerCreate',compact('auction','city','assets','contract_type'));
    }

    public function store(Request $request)
    {
        $name = $request['name'];
        $date = $request['date'];
        $label = $request['label'];
        $note = $request['note'];
        try{ 
            Auction::create(([
             'name' => $name,
             'date' => $date,
             'label' => $label,
             'note' => $note,
             ]));
            return redirect()->route('auction')-> with(['success' => 'تم التسجيل بنجاح']);
        }catch(\Exception $ex){
            return redirect()->route('auction')-> with(['error' => 'خطأ']);
        }
    }
    
    public function offer_store(Request $request)
    {

        $file="";
        if($delivery_record = $request->file('delivery_record')){
            $file_extension = $request->delivery_record->getclientoriginalExtension();
            $file = time() .'-'. 'delivery_record' . '.' . $file_extension;
            $path = 'auctionOffer-files';
            $delivery_record->move($path,$file);
            $delivery_record = $file;
        }
        
        $auction_id = $request['auction'];
        $asset_id = $request['asset'];
        $recived = $request['recived'];
        $investor = $request['investor'];
        $phone = $request['phone'];
        $work_date = $request['work_date'];
        $offerStatus = 1;
        $delivery_record = $file;
        $note = $request['note'];
        $increase_rate = $request['increase_rate'];
        
        $assetStatus = 1;
        $contract_type = $request['contract_type'];
        $contract_period = $request['contract_period'];
        $contract_cost = $request['contract_cost'];
        try{ 
            Offer::create(([
                'recived' => $recived,
                'investor' => $investor,
                'phone' => $phone,
                'work_date' => $work_date,
                'status' => $offerStatus,
                'delivery_record' => $delivery_record,
                'note' => $note,
                'increase_rate' => $increase_rate,
                'assets_id' => $asset_id,
                'auction_id' => $auction_id
             ]));
             Asset::select()->find($asset_id)->update(([
                'status' => $assetStatus,
                'contract_cost' => $contract_cost,
                'contract_period' => $contract_period,
                'contract_type_id' => $contract_type 
             ]));
            return redirect()->route('offer.Create')-> with(['success' => 'تم التسجيل بنجاح']);
        }catch(\Exception $ex){
            return redirect()->route('offer.Create')-> with(['error' => ' خطأ\n '.$ex]);
        }
    }

    public function edit(string $id)
    {
        $auction = Auction::select()->find($id); 
        return view('auction.edit',compact('auction'));
    }
    public function offer_edit(string $id)
    {
        $offer = Offer::select()->find($id); 
        $auction = Auction::select()->get(); 
        $city = City::select()->get(); 
        $assets = Asset::select()->get(); 
        $contract_type = Contract_type::select()->get(); 
        return view('auction.offerEdit',compact('offer','auction','city','assets','contract_type'));
    }

    public function update(Request $request,string $id)
    {
        $name = $request['name'];
        $date = $request['date'];
        $label = $request['label'];
        $note = $request['note'];
        try{ 
            Auction::select()->find($id)->update(([
             'name' => $name,
             'date' => $date,
             'label' => $label,
             'note' => $note,
             ]));
            return redirect()->route('auction')-> with(['success' => 'تم التعديل بنجاح']);
        }catch(\Exception $ex){
            return redirect()->route('auction')-> with(['error' => 'خطأ']);
        }
    }
    public function offer_update(Request $request,string $id)
    {
        $file="";
        if($request['delivery_record']!="null"){
            if($delivery_record = $request->file('delivery_record')){
                $file_extension = $request->delivery_record->getclientoriginalExtension();
                $file = $id .'-'. 'delivery_record' . '.' . $file_extension;
                $path = 'auctionOffer-files';
                $delivery_record->move($path,$file);
                $delivery_record = $file;
            }
        }
        //return redirect()->route('offer')-> with(['success' => $file]);

        $auction_id = $request['auction'];
        $asset_id = $request['asset'];
        $recived = $request['recived'];
        $investor = $request['investor'];
        $phone = $request['phone'];
        $work_date = $request['work_date'];
        $offerStatus = 1;
        $delivery_record = $file;
        $note = $request['note'];
        $increase_rate = $request['increase_rate'];
        
        $assetStatus = 1;
        $contract_type = $request['contract_type'];
        $contract_period = $request['contract_period'];
        $contract_cost = $request['contract_cost'];
        if($delivery_record!=""){
            try{ 
                Offer::select()->find($id)->update(([
                    'recived' => $recived,
                    'investor' => $investor,
                    'phone' => $phone,
                    'work_date' => $work_date,
                    'status' => $offerStatus,
                    'delivery_record' => $delivery_record,
                    'note' => $note,
                    'increase_rate' => $increase_rate,
                    'assets_id' => $asset_id,
                    'auction_id' => $auction_id
                 ]));
                 Asset::select()->find($asset_id)->update(([
                    'status' => $assetStatus,
                    'contract_cost' => $contract_cost,
                    'contract_period' => $contract_period,
                    'contract_type_id' => $contract_type 
                 ]));
                return redirect()->route('offer')-> with(['success' => 'تم التعديل بنجاح']);
            }catch(\Exception $ex){
                    return redirect()->route('offer')-> with(['error' => ' خطأ\n '.$ex]);
            }
        }else{
            try{ 
                Offer::select()->find($id)->update(([
                    'recived' => $recived,
                    'investor' => $investor,
                    'phone' => $phone,
                    'work_date' => $work_date,
                    'status' => $offerStatus,
                    'note' => $note,
                    'increase_rate' => $increase_rate,
                    'assets_id' => $asset_id,
                    'auction_id' => $auction_id
                 ]));
                 Asset::select()->find($asset_id)->update(([
                    'status' => $assetStatus,
                    'contract_cost' => $contract_cost,
                    'contract_period' => $contract_period,
                    'contract_type_id' => $contract_type 
                 ]));
                return redirect()->route('offer')-> with(['success' => 'تم التعديل بنجاح']);
            }catch(\Exception $ex){
                    return redirect()->route('offer')-> with(['error' => ' خطأ '.$ex]);
            }
        }
    }
}
