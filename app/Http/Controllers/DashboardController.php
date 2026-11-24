<?php
namespace App\Http\Controllers;
use App\Services\GenieAcsClient;
use Illuminate\View\View;
use Throwable;
class DashboardController {
 public function __invoke(GenieAcsClient $acs): View {
  $online=null;$total=null;$error=null;
  try {$devices=$acs->devices(['projection'=>'["_id","_lastInform"]']);$total=count($devices);$online=count(array_filter($devices,fn($d)=>isset($d['_lastInform']) && strtotime($d['_lastInform'])>now()->subMinutes(5)->timestamp));}
  catch(Throwable $e){$error=$e->getMessage();}
  return view('dashboard',compact('total','online','error'));
 }
}
