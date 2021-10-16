<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }
}
