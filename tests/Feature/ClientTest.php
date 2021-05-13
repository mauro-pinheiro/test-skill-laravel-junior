<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Client;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClientTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /**
     * @test
     */
    public function clientIndex()
    {
        Client::factory($total = $this->faker->numberBetween(15, 50))->create();

        $response = $this->json('GET', route('clients.index'));

        $response
            ->assertOk()
            ->assertJsonPath('meta.total', $total);
    }

    /**
     * @test
     */
    public function clientStore()
    {
        $client = Client::factory([
            'created_at' => now(),
            'updated_at' => now(),
        ])->make();

        $response = $this->json('POST', route('clients.store'), $client->toArray());

        $response->assertCreated();
        $this->assertDatabaseHas('clients', $client->getAttributes());
    }

    /**
     * @test
     */
    public function clientShow()
    {
        $client = Client::factory([
            'created_at' => now(),
            'updated_at' => now(),
        ])->create();

        $response = $this->json('GET', route('clients.show', $client));

        // dd($response->decodeResponseJson());

        $response
            ->assertOk()
            ->assertJsonPath('data.name', $client->name);
    }

    /**
     * @test
     */
    public function clientUpdate()
    {
        $clientOnDB = Client::factory([
            'created_at' => now(),
            'updated_at' => now(),
        ])->create();

        $clientUpdate = Client::factory([
            'updated_at' => now(),
        ])->make();

        $response = $this->json('PUT', route('clients.update', $clientOnDB), $clientUpdate->toArray());

        $response->assertOk();
        $this->assertDatabaseHas('clients', $clientUpdate->getAttributes());
    }

    /**
     * @test
     */
    public function clientDestory()
    {
        $client = Client::factory()->create();

        $response = $this->json('DELETE', route('clients.destroy', $client));

        $response->assertNoContent();
        $this->assertDatabaseMissing('clients', $client->getAttributes());
    }
}
