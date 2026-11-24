<?php
namespace App\Services;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;
use RuntimeException;
class GenieAcsClient
{
 private function request(): PendingRequest {
  $base=rtrim((string)config('services.genieacs.url'),'/');
  if($base==='') throw new RuntimeException('GenieACS NBI URL belum dikonfigurasi.');
  $request=Http::baseUrl($base)->acceptJson()->timeout((int)config('services.genieacs.timeout',15));
  return config('services.genieacs.username') ? $request->withBasicAuth(config('services.genieacs.username'),(string)config('services.genieacs.password')) : $request;
 }
 public function devices(array $query=[]): array { return $this->request()->get('/devices/',$query)->throw()->json() ?? []; }
 public function device(string $deviceId): ?array {
  $rows=$this->request()->get('/devices/',['query'=>json_encode(['_id'=>$deviceId],JSON_THROW_ON_ERROR)])->throw()->json() ?? [];
  return $rows[0] ?? null;
 }
 public function task(string $deviceId,string $name,array $parameters=[]): array {
  $allowed=['refreshObject','getParameterValues','setParameterValues','reboot','factoryReset','download','upload','addObject','deleteObject'];
  if(!in_array($name,$allowed,true)) throw new RuntimeException('Jenis task tidak diizinkan.');
  return $this->request()->post('/devices/'.rawurlencode($deviceId).'/tasks',['name'=>$name]+$parameters)->throw()->json() ?? [];
 }
 public function test(): bool { $this->request()->get('/devices/',['limit'=>1])->throw(); return true; }
}
