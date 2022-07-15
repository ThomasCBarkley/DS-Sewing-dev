<?php

namespace App\Http\Controllers\Admin;


use Illuminate\View\View;
use App\Models\Post;
use App\Models\User;

class DashboardController
{

    public function index(): View
    {
        return view('admin.dashboard.index');
    }
}