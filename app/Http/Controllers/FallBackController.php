<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;


class FallBackController extends Controller
{
   public function notfound()
   {
       return \view("errors.404");
   }
}
