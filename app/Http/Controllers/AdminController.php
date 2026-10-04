<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $data = [
            'title' => 'Dashboard',
            'totalUsers' => User::count(),
            'totalData' => Product::count(),
            'totalProducts' => Product::count(),
            'aktivitas' => Transaction::whereDate('created_at', today())->count(),
            'todaySales' => Transaction::whereDate('created_at', today())->sum('grand_total'),
        ];

        return view('admin.index', compact('data'));
    }

    public function users()
    {
        $users = User::query()->latest()->get(['id', 'name', 'email', 'role']);

        return view('admin.user', compact('users'));
    }

    public function data()
    {
        $products = Product::latest()->get();

        return view('admin.data', compact('products'));
    }

    public function settings()
    {
        return view('admin.settings');
    }
}