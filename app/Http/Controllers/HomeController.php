<?php

namespace App\Http\Controllers;

use App\Models\Bootcamp;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $featured = Bootcamp::with('category')->where('is_published', true)->where('is_featured', true)->latest()->take(3)->get();
        $categories = Category::withCount(['bootcamps' => fn($q) => $q->where('is_published', true)])->orderBy('name')->get();
        $totalStudents = \App\Models\User::where('role', 'student')->count();
        return view('home', compact('featured', 'categories', 'totalStudents'));
    }
}
