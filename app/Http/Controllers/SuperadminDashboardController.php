<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperadminDashboardController extends Controller
{
    public function index()
{
    return view('superadmin.dashboard');
}
}
