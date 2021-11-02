<?php

namespace App\Http\Controllers\admin;

use App\Models\Table;
use App\Models\TableOrder;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'pendingOrders' => TableOrder::where('order_status', 0)->count(),
            'completedOrders' => TableOrder::where('order_status', 1)->count(),
            'tables' => Table::all()->count(),
            'users' => User::all()->count(),
            'orders' => TableOrder::where('order_status',0)->get(),
            'totalRevenue' => TableOrder::all(),
        ]);
    }
}
