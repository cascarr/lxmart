<?php

namespace App\Models;

use App\Traits\UUID;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Product;

class Subcategory extends Model
{
    use HasFactory, UUID, Sluggable, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'category_id',
    ];

    protected $dates = ['deleted_at'];

    public function category() {

        return $this->belongsTo(Category::class);

    }

    /**
     * A Subcategory has many products
     */
    public function products() {

        return $this->hasMany(Product::class, 'subcategory_id');

    }

    /**
     * A Slug should be assigned to a Subcategory
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
