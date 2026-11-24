<?php
namespace App\Http\Controllers;
use App\Services\GenieAcsClient;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
class DeviceController {
 public function index(GenieAcsClient $acs): View { return view('devices.index',['devices'=>$acs->devices()]); }
 public function show(string $deviceId,GenieAcsClient $acs): View { $device=$acs->device($deviceId); abort_unless($device,404); return view('devices.show',compact('device')); }
 public function task(Request $request,string $deviceId,GenieAcsClient $acs): RedirectResponse {
  $data=$request->validate(['name'=>['required','string','in:refreshObject,reboot,factoryReset']]);
  $acs->task($deviceId,$data['name']); return back()->with('status','Task dikirim ke GenieACS.');
 }
}
