<?php
namespace Tests\Unit;
use App\Services\GenieAcsClient;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;
class GenieAcsClientTest extends TestCase {
 public function test_it_lists_devices_from_nbi(): void {
  config(['services.genieacs.url'=>'http://acs.test:7557']);
  Http::fake(['acs.test:7557/devices/*'=>Http::response([['_id'=>'device-1']],200)]);
  $this->assertSame('device-1',(new GenieAcsClient())->devices()[0]['_id']);
 }
 public function test_it_refuses_unsupported_tasks(): void {
  config(['services.genieacs.url'=>'http://acs.test:7557']);
  $this->expectException(\RuntimeException::class);(new GenieAcsClient())->task('device-1','arbitraryCommand');
 }
}
