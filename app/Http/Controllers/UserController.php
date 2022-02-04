<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function search(Request $request)
    {
        if($request->ajax()){
            $searchData = $request->name;  
            $data =  Package::
           
         
             
                                 where(function($query) use($searchData){
                                $query->where('packages.customer_phone',$searchData);
                           
                            })->get();
                          
                            
            return response()->json($data,200);
        }
    }
 
}
