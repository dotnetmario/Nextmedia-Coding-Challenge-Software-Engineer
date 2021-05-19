<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'category_id',
    ];



    /**
     * Relations
     * 
     * 
     */

    /**
     * The products that belong to the category.
     */
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    /**
     * relation to the same model to list children categories
     */
    public function childrenCategories()
    {
        return $this->hasMany(Category::class)->with('categories');
    }


    /**
     * CRUD
     * 
     * 
     */

    /**
     * add a category
     * 
     * @param string name
     * @param int|null category_id
     * 
     * @return Category category
     */
    public function addCategory($name, $category_id = null){
        $category = new Category;

        $category->name = $name;
        $category->category_id = $category_id;

        $category->save();

        return $category;
    }


    /**
     * soft delete a category
     * 
     * @param int id
     * 
     * @return Category category
     */
    public function softDeleteCategory($id){
        $category = (new Category)->where('id', $id);

        if($category->exists()){
            $category->delete();

            return $category;
        }
         
        return null;
    }
}
