<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Client;
use App\Models\Product;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    protected function setUp(): void
    {
        parent::setUp();
        Client::factory(10)->create();
    }

    /**
     * @test
     */
    public function productIndex()
    {
        Product::factory($total = $this->faker->numberBetween(15, 50))->create();

        $response = $this->json('GET', route('products.index'));

        $response
            ->assertOk()
            ->assertJsonPath('meta.total', $total);
    }

    /**
     * @test
     */
    public function productStore()
    {
        $this->withoutExceptionHandling();
        $product = Product::factory([
            'created_at' => now(),
            'updated_at' => now(),
        ])->make();

        $response = $this->json('POST', route('products.store'), $product->toArray());

        // dd($product->getAttributes(), Product::first()->getAttributes());

        // $id = $response->decodeResponseJson()->json('id');
        // $product->id = $id;

        $response->assertCreated();
        $this->assertDatabaseHas('products', $product->getAttributes());
    }

    /**
     * @test
     */
    public function productShow()
    {
        $product = Product::factory([
            'created_at' => now(),
            'updated_at' => now(),
        ])->create();

        $response = $this->json('GET', route('products.show', $product));

        // dd($response->decodeResponseJson());

        $response
            ->assertOk()
            ->assertJsonPath('data.name', $product->name);
    }

    /**
     * @test
     */
    public function productUpdate()
    {
        $productOnDB = Product::factory([
            'created_at' => now(),
            'updated_at' => now(),
        ])->create();

        $productUpdate = Product::factory([
            'updated_at' => now(),
        ])->make();

        $response = $this->json('PUT', route('products.update', $productOnDB), $productUpdate->toArray());

        $response->assertOk();
        $this->assertDatabaseHas('products', $productUpdate->getAttributes());
    }

    /**
     * @test
     */
    public function productDestory()
    {
        $product = Product::factory()->create();

        $response = $this->json('DELETE', route('products.destroy', $product));

        $response->assertNoContent();
        $this->assertDatabaseMissing('products', $product->getAttributes());
    }
}
