@extends('layouts.app')
@section('title','Devices') @section('heading','Devices')
@section('content')<div class="table-wrap"><table><thead><tr><th>Device ID</th><th>Manufacturer</th><th>Model</th><th>Serial Number</th><th>Last Inform</th><th></th></tr></thead><tbody>
@forelse($devices as $device)<tr><td>{{ $device['_id'] ?? '—' }}</td><td>{{ data_get($device,'_deviceId.Manufacturer.0._value','—') }}</td><td>{{ data_get($device,'_deviceId.ProductClass.0._value','—') }}</td><td>{{ data_get($device,'_deviceId.SerialNumber.0._value','—') }}</td><td>{{ $device['_lastInform'] ?? '—' }}</td><td><a class="btn secondary" href="{{ route('devices.show',['deviceId'=>$device['_id']]) }}">Detail</a></td></tr>@empty<tr><td colspan="6">Tidak ada perangkat atau koneksi GenieACS belum tersedia.</td></tr>@endforelse
</tbody></table></div>@endsection
