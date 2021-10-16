<?php

namespace App\Http\Controllers\admin;

use App\Models\Table;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;

class TableController extends Controller
{
    public function index()
    {
        return view('admin.table.index', [
            'tables' => Table::all(),
        ]);
    }

    public function store()
    {
        $data = request()->validate([
            'number' => ['required', 'max:11']
        ]);
        Table::create($data);

        return redirect()->back()->with('success', 'Table created successfully');
    }
}
