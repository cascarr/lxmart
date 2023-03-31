<?php

namespace App\Models;

use App\Traits\UUID;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\User;
use App\Models\Product;

class Cart extends Model
{
    use HasFactory, UUID, SoftDeletes;

    protected $fillable = [
        'quantity',
        'user_id',
        'prod_id',
    ];

    protected $dates = ['deleted_at'];

    /**
     * A Cart Item belongs to a particular Product
     */
    public function product() {
        return $this->belongsTo(Product::class, 'prod_id', 'id');
    }

    /**
     * A Cart Item belongs to a particular User
     */
    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
