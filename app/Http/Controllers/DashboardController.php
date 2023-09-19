<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function index()
    {
        $blogs = Blog::orderBy('created_at','DESC')->with('users')->get();
        return view('dashboard', ['blogs' => $blogs]);
    }
}
