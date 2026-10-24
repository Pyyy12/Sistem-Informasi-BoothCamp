@extends('layouts.app')
@section('title','JoCamp — Upgrade Skill, Upgrade Masa Depan')
@section('content')
<section class="hero-section">
  <div class="container position-relative">
    <div class="row align-items-center g-5">
      <div class="col-lg-7">
        <div class="eyebrow"><span class="pulse-dot"></span> Belajar skill masa depan dimulai di sini</div>
        <h1 class="hero-title">Skill baru.<br><span>Masa depan baru.</span></h1>
        <p class="hero-copy">Belajar langsung dari praktisi, kerjakan proyek nyata, dan siapkan dirimu untuk kesempatan karier yang lebih luas.</p>
        <div class="d-flex flex-wrap gap-3 mt-4"><a href="{{ route('bootcamps.index') }}" class="btn btn-primary-custom btn-lg">Jelajahi Bootcamp <i class="bi bi-arrow-up-right ms-2"></i></a><a href="#kenapa-jocamp" class="btn btn-soft btn-lg">Kenapa JoCamp?</a></div>
        <div class="hero-proof mt-5"><div class="avatar-stack"><span>R</span><span>N</span><span>D</span><span><i class="bi bi-plus"></i></span></div><div><strong>{{ number_format(max($totalStudents, 1200)) }}+</strong><small class="d-block text-secondary">Pembelajar bertumbuh bersama</small></div><div class="proof-rating"><span>★★★★★</span><small class="d-block text-secondary">Belajar dengan mentor praktisi</small></div></div>
      </div>
      <div class="col-lg-5">
        <div class="hero-art">
          <div class="art-orbit orbit-one"></div><div class="art-orbit orbit-two"></div>
          <div class="floating-card float-top"><span class="mini-icon purple"><i class="bi bi-code-slash"></i></span><div><strong>Build real projects</strong><small>Belajar sambil praktik</small></div></div>
          <div class="learning-window"><div class="window-dots"><i></i><i></i><i></i><span>jocamp.dev</span></div><div class="code-art"><p><span class="code-purple">const</span> future = {</p><p class="ps-3">skills: <span class="code-green">'growing'</span>,</p><p class="ps-3">mindset: <span class="code-green">'limitless'</span>,</p><p class="ps-3">nextStep: <span class="code-yellow">'you'</span></p><p>};</p><div class="code-success"><i class="bi bi-check-circle-fill"></i> Project ready to launch</div></div></div>
          <div class="floating-card float-bottom"><span class="mini-icon orange"><i class="bi bi-trophy"></i></span><div><strong>Portfolio-ready</strong><small>Karya nyata, bukan teori saja</small></div></div>
          <div class="sparkle sparkle-one">✦</div><div class="sparkle sparkle-two">✧</div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="stats-strip"><div class="container"><div class="row g-3 text-center"><div class="col-6 col-lg-3"><strong>Project-based</strong><span>Belajar lewat praktik</span></div><div class="col-6 col-lg-3"><strong>Mentor praktisi</strong><span>Insight dari industri</span></div><div class="col-6 col-lg-3"><strong>Fleksibel</strong><span>Belajar sesuai ritme</span></div><div class="col-6 col-lg-3"><strong>Career-ready</strong><span>Siap melangkah maju</span></div></div></div></section>
<section class="section-pad" id="program"><div class="container"><div class="section-heading"><div><span class="section-kicker">PILIH JALURMU</span><h2>Temukan skill yang<br>membawamu lebih jauh.</h2></div><a href="{{ route('bootcamps.index') }}" class="text-link">Lihat semua program <i class="bi bi-arrow-up-right"></i></a></div>
<div class="row g-4 mt-2">
@forelse($featured as $index => $bootcamp)
<div class="col-md-6 col-xl-4"><article class="course-card h-100"><div class="course-visual visual-{{ $index+1 }}"><span class="course-category">{{ $bootcamp->category->name }}</span><div class="visual-symbol"><i class="bi {{ ['bi-code-slash','bi-bezier2','bi-bar-chart-line'][($index)%3] }}"></i></div><span class="visual-number">0{{ $index+1 }}</span></div><div class="course-body"><div class="course-meta"><span><i class="bi bi-clock"></i> {{ $bootcamp->duration_weeks }} minggu</span><span><i class="bi bi-bar-chart"></i> {{ $bootcamp->level }}</span></div><h3><a href="{{ route('bootcamps.show',$bootcamp) }}">{{ $bootcamp->title }}</a></h3><p>{{ $bootcamp->excerpt }}</p><div class="mentor-row"><span class="mentor-avatar">{{ strtoupper(substr($bootcamp->mentor_name,0,1)) }}</span><div><small>Mentor</small><strong>{{ $bootcamp->mentor_name }}</strong></div><div class="course-price ms-auto">{{ $bootcamp->price > 0 ? 'Rp '.number_format($bootcamp->price,0,',','.') : 'Gratis' }}</div></div><a class="course-arrow" href="{{ route('bootcamps.show',$bootcamp) }}" aria-label="Lihat {{ $bootcamp->title }}"><i class="bi bi-arrow-up-right"></i></a></div></article></div>
@empty
<div class="col-12"><div class="empty-state">Program unggulan sedang disiapkan. Jalankan seeder untuk memuat data demo.</div></div>
@endforelse
</div></div></section>
<section class="section-pad bg-soft-section" id="kenapa-jocamp"><div class="container"><div class="text-center mx-auto section-intro"><span class="section-kicker">LEBIH DARI SEKADAR KELAS</span><h2>Belajar yang terasa<br><span>hasilnya.</span></h2><p>Kami bantu kamu mengubah rasa ingin tahu menjadi kemampuan yang bisa ditunjukkan.</p></div><div class="row g-4 mt-4">
<div class="col-md-4"><div class="benefit-card"><span class="benefit-icon purple"><i class="bi bi-kanban"></i></span><h4>Proyek nyata</h4><p>Bangun portofolio dari studi kasus yang relevan dengan kebutuhan industri.</p></div></div>
<div class="col-md-4"><div class="benefit-card"><span class="benefit-icon orange"><i class="bi bi-people"></i></span><h4>Mentor berpengalaman</h4><p>Dapatkan arahan, feedback, dan tips praktis dari orang yang berkecimpung di bidangnya.</p></div></div>
<div class="col-md-4"><div class="benefit-card"><span class="benefit-icon green"><i class="bi bi-graph-up-arrow"></i></span><h4>Progress terarah</h4><p>Belajar bertahap dengan tujuan jelas agar kamu terus bergerak maju.</p></div></div>
</div></div></section>
<section class="cta-section"><div class="container"><div class="cta-box"><div><span class="section-kicker text-white-50">YOUR NEXT CHAPTER STARTS HERE</span><h2>Siap naik level<br>bareng JoCamp?</h2><p>Temukan program yang cocok dan mulai bangun masa depanmu.</p></div><a href="{{ route('bootcamps.index') }}" class="btn btn-light btn-lg rounded-pill px-4">Mulai sekarang <i class="bi bi-arrow-up-right ms-2"></i></a><div class="cta-decoration">J</div></div></div></section>
@endsection
