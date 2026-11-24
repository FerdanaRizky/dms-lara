@extends('layouts.app')
@section('title','Dashboard') @section('heading','Dashboard')
@section('content')
@if($error)<div class="alert error">GenieACS belum terhubung: {{ $error }}. Periksa pengaturan koneksi.</div>@endif
<div class="grid"><section class="card"><div class="muted">Total perangkat</div><div class="stat">{{ $total ?? '—' }}</div></section><section class="card"><div class="muted">Online (informasi 5 menit terakhir)</div><div class="stat">{{ $online ?? '—' }}</div></section><section class="card"><div class="muted">Platform</div><div class="stat">Laravel</div><div class="muted">Native PHP web application</div></section></div>
<div class="card" style="margin-top:18px"><h3>ACS Operations</h3><p class="muted">Pemetaan seluruh fitur ACS Panel lama masih memerlukan source aplikasi asli.</p><a class="btn" href="{{ route('devices.index') }}">Lihat perangkat</a></div>
@endsection
