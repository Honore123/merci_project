<?php

namespace App\Http\Controllers\users;

use App\Models\Product;
use App\Models\SoldProduct;
use App\Models\Table;
use App\Models\TableOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;

class TableOrderController extends Controller
{
    public function index(Table $table)
    {
        return view('user.dashboard', [
            'products' => Product::all(),
            'table' => $table
        ]);

    }
    public function store(Table $table){
        $data = request()->validate([
            'product' => 'required',
        ]);
        $totalAmount = 0;
        foreach ($data['product'] as $id) {
            $product = Product::where('id', $id)->first();
            $totalAmount =$totalAmount + $product->price;
        }
        $tableOrder = TableOrder::create([
            'table_id' => $table->id,
            'total_amount' => $totalAmount,
            'order_status' => 0,
        ]);
        foreach ($data['product'] as $id) {
            $product = Product::where('id', $id)->first();
            SoldProduct::create([
                'table_order_id' => $tableOrder->id,
                'product_id' => $product->id,
                'quantity' => 1,
                'amount' => $product->price
            ]);
        }
        return redirect()->back()->with('success', 'Order has been submitted');
    }
}
