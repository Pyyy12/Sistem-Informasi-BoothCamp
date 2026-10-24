<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('meta_description', 'JoCamp — belajar skill masa depan bersama mentor berpengalaman.')">
    <title>@yield('title', 'JoCamp — Upgrade Skill, Upgrade Masa Depan')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/jocamp.css') }}">
    @stack('styles')
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top border-bottom">
  <div class="container py-2">
    <a class="navbar-brand brand-mark" href="{{ route('home') }}"><span class="brand-icon">J</span> Jo<span>Camp</span></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-label="Buka navigasi"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="mainNav">
      <ul class="navbar-nav mx-auto gap-lg-2">
        <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Beranda</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('bootcamps.index') }}">Bootcamp</a></li>
        @auth <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a></li> @endauth
      </ul>
      <div class="d-flex gap-2 align-items-center mt-3 mt-lg-0">
        @auth
          <span class="small text-secondary d-none d-xl-inline">Halo, {{ auth()->user()->name }}</span>
          <form method="POST" action="{{ route('logout') }}">@csrf<button class="btn btn-outline-dark rounded-pill px-4">Keluar</button></form>
        @else
          <a class="btn btn-link text-decoration-none text-dark" href="{{ route('login') }}">Masuk</a>
          <a class="btn btn-primary-custom" href="{{ route('register') }}">Mulai Belajar <i class="bi bi-arrow-up-right ms-1"></i></a>
        @endauth
      </div>
    </div>
  </div>
</nav>
@if(session('success')) <div class="container mt-3"><div class="alert alert-success alert-dismissible fade show" role="alert">{{ session('success') }}<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div></div> @endif
@if($errors->any()) <div class="container mt-3"><div class="alert alert-danger"><strong>Periksa kembali:</strong><ul class="mb-0 mt-1">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div></div> @endif
<main>@yield('content')</main>
<footer class="site-footer mt-5">
  <div class="container py-5"><div class="row g-4">
    <div class="col-lg-5"><a class="navbar-brand brand-mark text-white" href="{{ route('home') }}"><span class="brand-icon">J</span> Jo<span>Camp</span></a><p class="text-white-50 mt-3 mb-0">Tempat bertumbuh, membangun skill, dan menyiapkan langkah karier berikutnya.</p></div>
    <div class="col-6 col-lg-3"><h6>Jelajahi</h6><a href="{{ route('bootcamps.index') }}">Semua bootcamp</a><a href="{{ route('register') }}">Buat akun</a></div>
    <div class="col-6 col-lg-4"><h6>Mulai perjalananmu</h6><p class="text-white-50">Belajar hal baru. Bangun karya nyata. Melangkah lebih percaya diri.</p></div>
  </div><hr class="border-secondary mt-4"><div class="small text-white-50">© {{ date('Y') }} JoCamp. Dibuat untuk masa depan yang lebih baik.</div></div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body></html>
