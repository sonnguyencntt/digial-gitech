<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RedirectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $server_name = $_SERVER['SERVER_NAME'];

        $domain_name = str_replace(".".\env("DOMAIN_NAME"),"",$server_name);
        if($domain_name == "super")
        {
            return redirect('/super');        }
        else if($server_name == \env("DOMAIN_NAME") )
        {
            return redirect('/');
        }
        else
        {
            return redirect('/');
        }
    }



   
}
