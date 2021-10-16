<?php

namespace App\Http\Controllers\users;

use App\Models\SoldProduct;
use App\Models\TableOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;

class SoldProductController extends Controller
{
    public function index()
    {
        return view('admin.report.index', [
            'tableOrders' => TableOrder::with('table')->get(),
        ]);
    }

    public function show(TableOrder $order)
    {
//        $data = SoldProduct::where('table_order_id', $order->id)->with(['product'])->get();
//        dd($data);
        return view('admin.report.show', [
            'products' => SoldProduct::where('table_order_id', $order->id)->with(['product'])->get(),
            'order' => $order
        ]);
    }
}
