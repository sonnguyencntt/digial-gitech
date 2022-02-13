<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;


class FallBackController extends Controller
{
   public function notfound()
   {
       return \view("errors.admin.404");
   }
}
