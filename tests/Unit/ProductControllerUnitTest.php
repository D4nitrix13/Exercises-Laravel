<?php

namespace Tests\Unit;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

// use PHPUnit\Framework\TestCase;

use Tests\TestCase;


class ProductControllerUnitTest extends TestCase
{
    use RefreshDatabase;
    public function testCreateUser()
    {
        $this->assertEquals(expected: 5, actual: 2 + 3);

        $user = User::factory()->create([
            'name' => 'Joker',
            'email' => 'joker@email.com',
        ]);

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => 'Joker',
            'email' => 'joker@email.com',
        ]);
    }

    public function testCreateProduct()
    {
        $product = Product::factory()->create();

        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'name' => $product->name,
            'description' => $product->description,
            'price' => $product->price,
            'user_id' => $product->user_id,
        ]);
    }
}
