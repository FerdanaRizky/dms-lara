<?php
namespace App\Http\Controllers\Api;
use App\Services\GenieAcsClient;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
class GenieAcsProxyController {
 public function devices(Request $r,GenieAcsClient $a): JsonResponse {return response()->json($a->devices($r->only(['query','projection','limit','sort'])));}
 public function device(string $id,GenieAcsClient $a): JsonResponse {return response()->json($a->device($id));}
 public function task(Request $r,string $id,GenieAcsClient $a): JsonResponse {$d=$r->validate(['name'=>['required','string','in:refreshObject,reboot,factoryReset']]);return response()->json($a->task($id,$d['name']));}
}
