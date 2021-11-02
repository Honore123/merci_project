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
    public function deviceIndex(){
        $order = TableOrder::where('order_status',0)->first();
        if($order){
            $products = SoldProduct::where('table_order_id', $order->id)->with(['product'])->get();
            $table = Table::where('id', $order->table_id)->first();
            $i = 0;
            $len = count($products);
            echo "Table: ".$table->number;
            echo ",";
            foreach ($products as $product) {
                echo $product->product->product_name."->".$product->quantity;
                if($i != $len - 1){
                    echo ',';
                }
                $i++;
            }
        } else {
            echo "No order";
        }

    }
    public function deviceConfirm(){
        $order = TableOrder::where('order_status',0)->first();
        $order->update(['order_status' => 1]);
        echo 'order confirmed';
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
            $quantity = request()->input('quantity-'.$product->id);
            SoldProduct::create([
                'table_order_id' => $tableOrder->id,
                'product_id' => $product->id,
                'quantity' => $quantity,
                'amount' => $product->price
            ]);
        }
        return redirect()->back()->with('success', 'Order has been submitted');
    }
}
