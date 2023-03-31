<?php

namespace App\Models;

use App\Traits\UUID;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\User;
use App\Models\OrderedProduct;

class CustomerOrder extends Model
{
    use HasFactory, UUID, SoftDeletes;

    protected $table = 'customer_orders';

    protected $fillable = [
        'cc_name',
        'cc_cvv',
        'cc_expirydate',
        'status',
        'tracking_no',
        'customer_id',
    ];

    protected $dates = ['deleted_at'];

    /**
     * A CustomerOrder belongsTo the User table
     */
    public function user() {
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }

    /**
     * A Customer Ordered many Products
     */
    public function orderedProducts() {
        return $this->hasMany(OrderedProduct::class);
    }

}
