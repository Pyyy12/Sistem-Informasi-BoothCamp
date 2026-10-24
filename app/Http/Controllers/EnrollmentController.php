<?php

namespace App\Http\Controllers;

use App\Models\Bootcamp;
use App\Models\Enrollment;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function store(Request $request, Bootcamp $bootcamp)
    {
        abort_unless($bootcamp->is_published, 404);
        Enrollment::firstOrCreate(
            ['user_id' => $request->user()->id, 'bootcamp_id' => $bootcamp->id],
            ['status' => 'pending', 'payment_status' => 'unpaid', 'progress' => 0]
        );
        return redirect()->route('enrollments.mine')->with('success', 'Pendaftaran berhasil dikirim. Tunggu konfirmasi admin.');
    }

    public function mine(Request $request)
    {
        $enrollments = $request->user()->enrollments()->with('bootcamp.category')->latest()->paginate(10);
        return view('enrollments.mine', compact('enrollments'));
    }
}
