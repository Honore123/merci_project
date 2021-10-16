<?php

namespace App\Http\Controllers\admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.product.index', [
            'products' => Product::all(),
        ]);
    }

    public function add()
    {
        return view('admin.product.add');
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'product_name' => ['string', 'required'],
            'quantity' => ['required', 'max:11'],
            'price' => ['required', 'max:11'],
            'description' => ['required'],
            'image' => ['required', 'image', 'max:1014']
        ]);

        $file = $request->file('image');
        $name = uniqid() . '_' . trim($file->getClientOriginalName());
        $file->storeAs('products/images', $name);
        $data['image'] = $name;
        Product::create($data);

        return redirect()->back()->with('success', 'Product added successfully');
    }
}
