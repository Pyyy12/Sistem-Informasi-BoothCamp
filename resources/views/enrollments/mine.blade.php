@extends('layouts.app')
@section('title','Pendaftaran Saya — JoCamp')
@section('content')
<section class="dashboard-section"><div class="container"><a href="{{ route('dashboard') }}" class="back-link"><i class="bi bi-arrow-left"></i> Dashboard</a><div class="my-4"><span class="section-kicker">YOUR ENROLLMENTS</span><h1 class="page-title">Pendaftaran saya</h1><p class="text-secondary">Pantau status program yang kamu pilih.</p></div><div class="content-panel">
@forelse($enrollments as $enrollment)<div class="learning-row"><div class="learning-symbol"><i class="bi bi-journal-check"></i></div><div class="flex-grow-1"><h3><a href="{{ route('bootcamps.show',$enrollment->bootcamp) }}">{{ $enrollment->bootcamp->title }}</a></h3><p>{{ $enrollment->bootcamp->category->name }} · {{ $enrollment->bootcamp->duration_weeks }} minggu</p><small class="text-secondary">Pembayaran: {{ ucfirst($enrollment->payment_status) }}</small></div><span class="status-pill status-{{ $enrollment->status }}">{{ ucfirst($enrollment->status) }}</span></div>
@empty<div class="empty-state">Belum ada pendaftaran. <a href="{{ route('bootcamps.index') }}">Cari bootcamp</a></div>@endforelse
<div class="mt-4">{{ $enrollments->links() }}</div></div></div></section>
@endsection
