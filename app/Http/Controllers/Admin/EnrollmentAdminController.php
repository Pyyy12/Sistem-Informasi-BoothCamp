<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EnrollmentAdminController extends Controller
{
    public function index()
    {
        $enrollments = Enrollment::with(['user','bootcamp'])->latest()->paginate(15);
        return view('admin.enrollments.index', compact('enrollments'));
    }
    public function update(Request $request, Enrollment $enrollment)
    {
        $data = $request->validate([
            'status'=>['required',Rule::in(['pending','approved','rejected','completed'])],
            'payment_status'=>['required',Rule::in(['unpaid','paid','refunded'])],
        ]);
        $enrollment->update($data);
        return back()->with('success','Status pendaftaran diperbarui.');
    }
}
