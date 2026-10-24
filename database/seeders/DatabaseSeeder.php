<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Bootcamp;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(['email'=>'admin@jocamp.test'], [
            'name'=>'Admin JoCamp','password'=>Hash::make('password'),'role'=>'admin','phone'=>'081234567890'
        ]);

        $categories = [
            ['name'=>'Web Development','slug'=>'web-development','description'=>'Bangun website modern dari nol.','color'=>'#7257ff'],
            ['name'=>'UI/UX Design','slug'=>'ui-ux-design','description'=>'Rancang pengalaman digital yang mudah digunakan.','color'=>'#ff8a5b'],
            ['name'=>'Data & AI','slug'=>'data-ai','description'=>'Ubah data menjadi insight dan solusi cerdas.','color'=>'#12b8a6'],
            ['name'=>'Digital Marketing','slug'=>'digital-marketing','description'=>'Kembangkan brand dan strategi pemasaran digital.','color'=>'#e7a93b'],
        ];
        foreach ($categories as $category) Category::updateOrCreate(['slug'=>$category['slug']], $category);

        $programs = [
            ['category'=>'web-development','title'=>'Full Stack Web Developer','slug'=>'full-stack-web-developer','excerpt'=>'Kuasai frontend dan backend untuk membangun aplikasi web siap kerja.','description'=>"Program intensif untuk membangun fondasi web development.\n\nMateri mencakup HTML, CSS, JavaScript, database, API, Git, deployment, dan proyek akhir portofolio.",'mentor_name'=>'Raka Pratama','level'=>'Pemula','duration_weeks'=>12,'price'=>2499000,'is_featured'=>true],
            ['category'=>'ui-ux-design','title'=>'UI/UX Product Designer','slug'=>'ui-ux-product-designer','excerpt'=>'Ubah ide menjadi produk digital yang intuitif dan menarik.','description'=>"Belajar proses desain produk digital dari riset sampai prototype.\n\nMateri mencakup user research, user flow, wireframe, UI system, prototyping, dan usability testing.",'mentor_name'=>'Nadia Putri','level'=>'Pemula','duration_weeks'=>8,'price'=>1799000,'is_featured'=>true],
            ['category'=>'data-ai','title'=>'Data Analytics with Python','slug'=>'data-analytics-python','excerpt'=>'Analisis data, temukan pola, dan sajikan insight yang bermakna.','description'=>"Bangun keterampilan analisis data praktis menggunakan Python.\n\nMateri mencakup spreadsheet, SQL, Python, visualisasi, dashboard, dan proyek portofolio.",'mentor_name'=>'Dimas Saputra','level'=>'Menengah','duration_weeks'=>10,'price'=>2199000,'is_featured'=>true],
            ['category'=>'digital-marketing','title'=>'Digital Marketing Specialist','slug'=>'digital-marketing-specialist','excerpt'=>'Pelajari strategi konten, iklan digital, SEO, dan analitik kampanye.','description'=>"Program praktis untuk merencanakan dan mengukur kampanye digital.\n\nMateri mencakup content strategy, SEO, ads, funnel, analytics, dan laporan kampanye.",'mentor_name'=>'Alya Maharani','level'=>'Pemula','duration_weeks'=>6,'price'=>1299000,'is_featured'=>false],
            ['category'=>'web-development','title'=>'Laravel Backend Engineer','slug'=>'laravel-backend-engineer','excerpt'=>'Bangun API yang aman dan terstruktur menggunakan Laravel.','description'=>"Perdalam backend development dengan Laravel dan praktik terbaik.\n\nMateri mencakup REST API, authentication, authorization, queues, testing, dan deployment.",'mentor_name'=>'Raka Pratama','level'=>'Menengah','duration_weeks'=>8,'price'=>1999000,'is_featured'=>false],
            ['category'=>'ui-ux-design','title'=>'Design System Essentials','slug'=>'design-system-essentials','excerpt'=>'Buat komponen desain konsisten untuk produk digital.','description'=>"Pelajari fondasi design system agar desain produk konsisten dan scalable.\n\nMateri mencakup token, komponen, dokumentasi, aksesibilitas, dan handoff.",'mentor_name'=>'Nadia Putri','level'=>'Menengah','duration_weeks'=>5,'price'=>999000,'is_featured'=>false],
        ];
        foreach ($programs as $p) {
            $category = Category::where('slug',$p['category'])->firstOrFail();
            unset($p['category']);
            Bootcamp::updateOrCreate(['slug'=>$p['slug']], $p + [
                'category_id'=>$category->id,
                'thumbnail'=>null,
                'is_published'=>true,
            ]);
        }
    }
}
