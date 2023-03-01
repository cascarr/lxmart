<?php

namespace App\Models;

use App\Traits\UUID;
use App\Models\User;
use App\Models\Product;
use App\Models\CommentReply;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory, UUID, SoftDeletes;

    protected $table = 'comments';

    /**
     * The attribute that are mass assignable.
    */
    protected $fillable = [
        'body',
        'product_id',
        'user_id',
    ];

    protected $dates = ['deleted_at'];

    /**
     * This comment belongs to a User Relationship
    */
    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * This comment belongs to a Product
    */
    public function product() {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    /**
     * A Comment has many replies
    */
    public function comment_replies() {
        return $this->hasMany(CommentReply::class);
    }

}
