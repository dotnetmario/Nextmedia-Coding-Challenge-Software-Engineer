<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
    ];


    /**
     * Relations
     * 
     * 
     */

    /**
     * The category that the product belongs to.
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }


    /**
     * CRUD
     * 
     * 
     */


    /**
     * add a product
     * 
     * @param Category|int category
     * @param string name
     * @param string description
     * @param double price
     * @param string image
     * 
     * @return Product product
     */
    public function addProduct($category, $name, $price, $description = null, $image = null){
        $product = new Product;

        $product->name = $name;
        $product->description = $description;
        $product->price = $price;

        // save the image if it's set
        if(isset($image)){
            $image = $this->saveImage($image);
        }
        $product->image = $image;

        $product->save();

        // check if the category is an integer
        if(gettype($category) === "integer"){
            $category = (new Category)->where('id', $category);

            // if the category exists attach it to the product model else return the model
            if($category->exists()){
                $category = $category->first();
                $product->categories()->attach($category);
            }else{
                return $product;
            }
            
        } // if the category is an object attach it to the model
        else if(gettype($category) === "object"){
            $product->categories()->attach($category);
        }

        return $product;
    }

    /**
     * delete product
     * 
     * @param int product_id
     * 
     * @return Product|null product
     */
    public function softDeleteProduct($id){
        $product = (new Product)->where('id', $id);

        if($product->exists()){
            $product->delete();

            return $product;
        }
         
        return null;
    }

    /**
     * saves product image
     * 
     * @param string image
     */
    public function saveImage($image){
        return $image;
    }

    /**
     * lists products with a limit
     * 
     * @param int perPage
     * @return Collection products
     */
    public function getProductsWithPagination($perPage = 25){
        $products = (new Product)->with('categories');

        if($perPage === 0){
            return $products->get();
        }

        return $products->paginate($perPage);
    }
    // public function getProductsWithPagination($perPage = 25){
    //     $products = (new Product)->with('categories');

    //     if($perPage === 0){
    //         return $products->get();
    //     }

    //     return $products->paginate($perPage);
    // }
}
