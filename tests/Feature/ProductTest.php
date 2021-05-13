<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Client;
use App\Models\Product;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /**
     * @test
     */
    public function productIndex(){
        Client::factory(10)->create();
        Product::factory($total = $this->faker->numberBetween(15,50))->create();
        $response = $this->json('GET', route('products.index'));
        $response
            ->assertOk()
            ->assertJsonPath('meta.total', $total);
    }
    /**
     * @test
     */
    public function productStore(){

    }
    /**
     * @test
     */
    public function productUpdate(){

    }
    /**
     * @test
     */
    public function productDestory(){

    }
}
