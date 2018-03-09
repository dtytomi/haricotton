<?php

namespace Haricotton\Http\Controllers;

use Auth;
use Haricotton\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return $user;
    }
}
