<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index($id = null)
    {
        return view('orders', compact('id'));
    }

    public function show_order($id)
    {
        return view('show_order', compact('id'));
    }
}
