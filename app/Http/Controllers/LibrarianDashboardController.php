<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LibrarianDashboardController extends Controller
{
    public function index()
{
    return view('librarian.dashboard');
}

}
