<?php

namespace Haricotton\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Haricotton\Http\Controllers\Controller;

class SuperAdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:role-superadmin');
    }

    public function index()
    {
        return view('superadmin.home');
    }
    
}
