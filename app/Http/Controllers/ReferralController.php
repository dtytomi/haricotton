<?php

namespace Haricotton\Http\Controllers;

use Auth;
use Haricotton\User;
use Illuminate\Http\Request;

class ReferralController extends Controller
{
     /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request)
    {
      # code...
      $affliateId = Auth::user()->affiliate_id;
      
      $reffered = User::where('referred_by', $affliateId)
                    ->with('investments')
                    ->get();

      

      return $reffered;
    }
}
