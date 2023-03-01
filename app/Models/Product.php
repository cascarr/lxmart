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
        'product_imgpath',
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
     * A Product has many Comments
    */
    public function comments() {
        return $this->hasMany(Comment::class);
    }

    /**
     * A Product has many CommentReplies
    */
    public function comment_replies() {
        return $this->hasMany(CommentReply::class);
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
