<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $data = [
            'title' => 'Dashboard',
            'totalUsers' => 120,
            'totalData' => 250,
            'aktivitas' => 85
        ];

        return view('admin.index', compact('data'));
    }

    public function users()
    {
        $users = [
            ['id' => 1, 'name' => 'John Doe', 'email' => 'john@example.com', 'role' => 'Admin'],
            ['id' => 2, 'name' => 'Jane Smith', 'email' => 'jane@example.com', 'role' => 'User'],
            ['id' => 3, 'name' => 'Bob Wilson', 'email' => 'bob@example.com', 'role' => 'User'],
        ];

        return view('admin.user', compact('users'));
    }

    public function data()
    {
        $items = [
            ['id' => 1, 'name' => 'Data 1', 'description' => 'Description 1', 'created_at' => now()],
            ['id' => 2, 'name' => 'Data 2', 'description' => 'Description 2', 'created_at' => now()],
            ['id' => 3, 'name' => 'Data 3', 'description' => 'Description 3', 'created_at' => now()],
        ];

        return view('admin.data', compact('items'));
    }

    public function settings()
    {
        return view('admin.settings');
    }
}