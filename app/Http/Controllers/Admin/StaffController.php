<?php

namespace Haricotton\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Haricotton\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:staff');
    }

    public function index()
    {
        return view('staff.home');
    }

}
