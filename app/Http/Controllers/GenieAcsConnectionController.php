<?php
namespace App\Http\Controllers;
use App\Services\GenieAcsClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
class GenieAcsConnectionController {
 public function edit(): View { return view('settings.genieacs'); }
 public function update(Request $request): RedirectResponse {
  $data=$request->validate(['url'=>['required','url'],'username'=>['nullable','string'],'password'=>['nullable','string']]);
  $this->writeEnv('GENIEACS_NBI_URL',$data['url']);$this->writeEnv('GENIEACS_USERNAME',$data['username']??'');
  if(!empty($data['password'])) $this->writeEnv('GENIEACS_PASSWORD',$data['password']);
  Artisan::call('config:clear');return back()->with('status','Konfigurasi koneksi disimpan.');
 }
 public function test(GenieAcsClient $acs): RedirectResponse { $acs->test();return back()->with('status','Koneksi GenieACS berhasil.'); }
 private function writeEnv(string $key,string $value): void {
  $path=base_path('.env');abort_unless(is_file($path)&&is_writable($path),500,'.env tidak dapat ditulis.');
  $env=file_get_contents($path);$line=$key.'="'.addcslashes($value,"\\\"").'"';
  $pattern='/^'.preg_quote($key,'/').'=.*/m';$env=preg_match($pattern,$env)?preg_replace($pattern,$line,$env):rtrim($env)."\n".$line."\n";
  file_put_contents($path,$env,LOCK_EX);
 }
}
