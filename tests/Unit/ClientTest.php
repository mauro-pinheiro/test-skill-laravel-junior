<?php

namespace Tests\Unit;

use App\Models\User;
use App\Models\Client;
use Tests\CreatesApplication;
use Illuminate\Foundation\Testing\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClientTest extends TestCase
{
    use CreatesApplication;
    use RefreshDatabase;
    use WithFaker;

    public function test_can_get_display_name_attribute()
    {
        $display_name = 'Sara Test';
        $client = Client::factory([
            'user_id' => User::factory([
                'name' => $display_name,
            ]),
        ])->create();
        $this->assertIsString($client->display_name);
        $this->assertEquals($display_name, $client->display_name);
    }
}
