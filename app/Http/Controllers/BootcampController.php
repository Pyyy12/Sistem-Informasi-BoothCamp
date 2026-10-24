<?php

namespace App\Http\Controllers;

use App\Models\Bootcamp;
use App\Models\Category;
use Illuminate\Http\Request;

class BootcampController extends Controller
{
    public function index(Request $request)
    {
        $query = Bootcamp::with('category')->where('is_published', true);
        if ($request->filled('q')) {
            $term = $request->string('q')->toString();
            $query->where(fn($q) => $q->where('title', 'like', "%{$term}%")->orWhere('mentor_name', 'like', "%{$term}%"));
        }
        if ($request->filled('category')) {
            $query->whereHas('category', fn($q) => $q->where('slug', $request->category));
        }
        $bootcamps = $query->latest()->paginate(9)->withQueryString();
        $categories = Category::orderBy('name')->get();
        return view('bootcamps.index', compact('bootcamps', 'categories'));
    }

    public function show(Bootcamp $bootcamp)
    {
        abort_unless($bootcamp->is_published, 404);
        $bootcamp->load('category');
        $alreadyEnrolled = auth()->check() && $bootcamp->enrollments()->where('user_id', auth()->id())->exists();
        return view('bootcamps.show', compact('bootcamp', 'alreadyEnrolled'));
    }
}
