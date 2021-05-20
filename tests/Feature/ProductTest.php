<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Product;
use App\Models\Category;

class ProductTest extends TestCase
{
    /** @test */
    public function test_product_is_instance_of_product_model(){
        $category = Category::factory()->make();
        $category->save();

        
        $product = Product::factory()->make();
        $product->save();

        $product->categories()->attach($category->id);

        $this->assertInstanceOf(Product::class, $product);
    }

    /** @test */
    public function test_product_creation_is_saved_to_database(){
        $category = Category::factory()->make();
        $category->save();

        
        $product = Product::factory()->make();
        $product->save();

        $product->categories()->attach($category->id);

        
        $this->assertDatabaseHas('products', $product->getAttributes());

    }
}
