<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->role == 'superadmin') {
        return view('dashboard.superadmin');
    } elseif (auth()->user()->role == 'librarian') {
        return view('dashboard.librarian');
    } else {
        return view('dashboard.user');
    }
    }
}
