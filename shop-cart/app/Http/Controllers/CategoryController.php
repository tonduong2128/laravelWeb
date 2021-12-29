<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function all_category()
    {
        return view('admin.all_category');
    }
    public function add_category()
    {
        return view('admin.add_category');
    }
}
