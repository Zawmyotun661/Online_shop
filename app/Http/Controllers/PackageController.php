<?php

namespace App\Http\Controllers;

use App\Models\Clothing;
use App\Models\Color;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{ public function __construct() 
    {
        $this->middleware('isCustomer');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $package= Package::all();
    
        $total= 0 ;
    foreach($package as $pack){
        $total+=$pack->total_cost;
        $pack->total=$total;
    }
    
    
        return view ('package.index',compact('package','total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $color= Color::all();
       $clothing= Clothing::all();
       return view('package.create',compact('color','clothing'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
       
        $package = new Package;
        $package->order_date = $request->input('order_date');   
        $package->expected_delivery_date = $request->input('expected_delivery_date');
        $package->delivery_date = $request->input('delivery_date');
        $package->customer_name = $request->input('customer_name');
        $package->facebook_name = $request->input('facebook_name');
        $package->customer_phone = $request->input('customer_phone');
        $package->address = $request->input('address');
        $package->customer_type = $request->input('customer_type');
        $package->quantity = $request->input('quantity');
        $package->total_cost = $request->input('quantity') * $request->input('cost');
        
        $package->clothing_type = $request->input('clothing_type');
       
        $package->color = $request->input('color');
        $package->payment_type = $request->input('payment_type');
        $package->cost = $request->input('cost');
        $package->delivery_status = $request->input('delivery_status');
        $package->payment_status = $request->input('payment_status');
        $package->delivery_fee = $request->input('delivery_fee');
        
        $package->save();
        return redirect('package');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $package=Package::find($id);
        $color= Color::all();
        $clothing= Clothing::all();
        return view('package.edit',compact('package','color','clothing'));
        
       
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $package =  Package ::find($id);
        $package->order_date = $request->input('order_date');   
        $package->expected_delivery_date = $request->input('expected_delivery_date');
        $package->delivery_date = $request->input('delivery_date');
        $package->customer_name = $request->input('customer_name');
        $package->facebook_name = $request->input('facebook_name');
        $package->customer_phone = $request->input('customer_phone');
        $package->address = $request->input('address');
        $package->customer_type = $request->input('customer_type');
        $package->quantity = $request->input('quantity');
        $package->total_cost = $request->input('quantity') * $request->input('cost');
        
        $package->clothing_type = $request->input('clothing_type');
       
        $package->color = $request->input('color');
        $package->payment_type = $request->input('payment_type');
        $package->cost = $request->input('cost');
        $package->delivery_status = $request->input('delivery_status');
        $package->payment_status = $request->input('payment_status');
        $package->delivery_fee = $request->input('delivery_fee');
        
        $package->save();
        return redirect('package');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         Package::find($id)->delete();
         return redirect('package')->with('successAlert','You Have Successfully Deleted');
    }


    public function search(Request $request)
    {
        if($request->ajax()){
            $searchData = $request->name;  
            $searchDate = $request->date;
            $searchStatus = $request->status;
            $data =  Package::
            where(function($query) use($searchData){
                $query->where('packages.customer_name','like', '%'.$searchData.'%');
               
            })   -> where(function($query) use($searchStatus){
                $query->where('packages.delivery_status','like', '%'.$searchStatus.'%');
               
            })->where('packages.order_date', 'like', '%'.$searchDate.'%')->get();
                    $total=0;
                foreach($data as $pack){
                    $total+=$pack->total_cost;
                    $pack->total=$total;
                       }
            return response()->json($data,200);
        }
    }
}
