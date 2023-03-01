<?php

namespace App\Models;

use App\Traits\UUID;
use App\Models\User;
use App\Models\Product;
use App\Models\Comment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;

class CommentReply extends Model
{
    use HasFactory, UUID, SoftDeletes;

    protected $table = 'comment_replies';

    /**
     * The attributes that are mass assignable.
    */
    protected $fillable = [
        'body',
        'product_id',
        'comment_id',
        'user_id',
    ];

    protected $dates = ['deleted_at'];

    /**
     * This comment_reply belongs to a Product
    */
    public function product() {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    /**
     * This comment_reply belongs to a Comment
    */
    public function comment() {
        return $this->belongsTo(Comment::class, 'comment_id', 'id');
    }

    /**
     * This comment_reply belongs to a User
    */
    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
