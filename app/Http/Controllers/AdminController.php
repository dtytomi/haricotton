<?php

namespace Haricotton\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function __construct()
    {
      # code...
      $this -> middleware('auth');
      $this -> middleware('role:ROLE_ADMIN');
    }
}
