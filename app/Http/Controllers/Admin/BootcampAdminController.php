<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bootcamp;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class BootcampAdminController extends Controller
{
    public function dashboard()
    {
        $bootcampCount = Bootcamp::count();
        $studentCount = \App\Models\User::where('role','student')->count();
        $pendingCount = \App\Models\Enrollment::where('status','pending')->count();
        $recent = \App\Models\Enrollment::with(['user','bootcamp'])->latest()->take(6)->get();
        return view('admin.dashboard', compact('bootcampCount','studentCount','pendingCount','recent'));
    }
    public function index()
    {
        $bootcamps = Bootcamp::with('category')->latest()->paginate(10);
        return view('admin.bootcamps.index', compact('bootcamps'));
    }
    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.bootcamps.form', ['bootcamp'=>new Bootcamp(), 'categories'=>$categories, 'editing'=>false]);
    }
    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data['slug'] = Str::slug($data['title']).'-'.Str::lower(Str::random(5));
        $data['is_featured'] = $request->boolean('is_featured');
        $data['is_published'] = $request->boolean('is_published');
        Bootcamp::create($data);
        return redirect()->route('admin.bootcamps.index')->with('success','Program bootcamp berhasil dibuat.');
    }
    public function edit(Bootcamp $bootcamp)
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.bootcamps.form', compact('bootcamp','categories') + ['editing'=>true]);
    }
    public function update(Request $request, Bootcamp $bootcamp)
    {
        $data = $this->validated($request, $bootcamp);
        $data['slug'] = $bootcamp->slug;
        $data['is_featured'] = $request->boolean('is_featured');
        $data['is_published'] = $request->boolean('is_published');
        $bootcamp->update($data);
        return redirect()->route('admin.bootcamps.index')->with('success','Program berhasil diperbarui.');
    }
    public function destroy(Bootcamp $bootcamp)
    {
        if ($bootcamp->enrollments()->exists()) {
            return back()->withErrors(['delete'=>'Program sudah memiliki pendaftar sehingga tidak dapat dihapus.']);
        }
        $bootcamp->delete();
        return back()->with('success','Program berhasil dihapus.');
    }
    private function validated(Request $request, ?Bootcamp $bootcamp = null): array
    {
        return $request->validate([
            'category_id'=>['required','exists:categories,id'],
            'title'=>['required','string','max:160'],
            'excerpt'=>['required','string','max:255'],
            'description'=>['required','string'],
            'mentor_name'=>['required','string','max:120'],
            'level'=>['required',Rule::in(['Pemula','Menengah','Lanjutan'])],
            'duration_weeks'=>['required','integer','min:1','max:104'],
            'price'=>['required','numeric','min:0','max:999999999'],
            'thumbnail'=>['nullable','url','max:2048'],
        ]);
    }
}
