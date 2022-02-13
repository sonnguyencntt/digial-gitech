<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;


class FallBackController extends Controller
{
   public function notfound()
   {
       return \view("errors.user.404");
   }
}
