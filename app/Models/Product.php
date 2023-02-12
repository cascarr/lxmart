<?php

namespace App\Models;

use App\Traits\UUID;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Category;
use App\Models\Subcategory;

class Product extends Model
{
    use HasFactory, UUID, Sluggable, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'price',
        'description',
        'product_img',
        'category_id',
        'subcategory_id',
    ];

    protected $dates = ['deleted_at'];

    /**
     * A Product belongs to a particular category
    */
    public function category() {

        return $this->belongsTo(Category::class);

    }

    /**
     * A Product belongs to a particular subcategory
    */
    public function subcategory() {

        return $this->belongsTo(Subcategory::class);

    }

    /**
     * A Slug should be assigned to a product
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
