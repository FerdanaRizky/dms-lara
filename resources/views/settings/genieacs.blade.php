@extends('layouts.app')
@section('title','GenieACS Settings') @section('heading','GenieACS Connection')
@section('content')<div class="card stack"><form method="post" action="{{ route('settings.genieacs.update') }}">@csrf @method('put')
<label>NBI URL</label><input class="form-control" type="url" name="url" required placeholder="http://127.0.0.1:7557" value="{{ old('url',config('services.genieacs.url')) }}">
<label>Username (opsional)</label><input class="form-control" name="username" value="{{ config('services.genieacs.username') }}">
<label>Password (kosongkan untuk tidak mengubah)</label><input class="form-control" type="password" name="password">
<button class="btn">Simpan</button></form><form method="post" action="{{ route('settings.genieacs.test') }}" style="margin-top:12px">@csrf<button class="btn secondary">Test koneksi</button></form></div>@endsection
