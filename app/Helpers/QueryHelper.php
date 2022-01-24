<?php

namespace App\Helpers;
use Auth;
use App\Store;
class QueryHelper 
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    /**
     * All of the container bindings that should be registered.
     *
     * @var array
     */
    public function getAllStore()
    {

        $user_id = Auth::user()->id;
        return Store::where("user_id" , $user_id)->get();

    }
}