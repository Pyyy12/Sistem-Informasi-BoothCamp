<?php

namespace App\Http\Controllers;

use App\Models\Bootcamp;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->user()->isAdmin()) return redirect()->route('admin.dashboard');
        $enrollments = auth()->user()->enrollments()->with('bootcamp.category')->latest()->take(5)->get();
        $enrolledCount = auth()->user()->enrollments()->count();
        $completedCount = auth()->user()->enrollments()->where('status', 'completed')->count();
        $availableCount = Bootcamp::where('is_published', true)->count();
        return view('dashboard', compact('enrollments','enrolledCount','completedCount','availableCount'));
    }
}
