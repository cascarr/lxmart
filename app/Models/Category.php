<?php

namespace App\Models;

use App\Traits\UUID;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Product;

class Category extends Model
{
    use HasFactory, UUID, Sluggable, SoftDeletes;

    /**
     * fillables
     */
    protected $fillable = [
        'name',
        'slug',
    ];

    protected $dates = ['deleted_at'];

    /**
     * Many Subcategories belong to a Category
    */
    public function subcategories() {

        return $this->hasMany(Subcategory::class);

    }

    /**
     * A Category has many products
    */
    public function products() {

        return $this->hasMany(Product::class, 'category_id');

    }

    /**
     * A Slug should be assigned to a Category
     * derieved from it's name
    */
    public function sluggable(): array {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

}
