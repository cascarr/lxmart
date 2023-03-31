<?php

namespace App\Models;

use App\Traits\UUID;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Cart;
use App\Models\Product;
use App\Models\CustomerOrder;

class OrderedProduct extends Model
{
    use HasFactory, UUID, SoftDeletes;

    protected $table = 'ordered_products';

    protected $fillable = [
        'selling_price',
        'quantity',
        'total_amount',
        'product_id',
        'customer_order_id',
    ];

    protected $dates = ['deleted_at'];

    /**
     * An OrderedProduct belongsTo a CustomerOrder
     */
    public function customerOrder() {
        return $this->belongsTo(CustomerOrder::class, 'customer_order_id', 'id');
    }

    /**
     * An OrderedProduct belongsTo a Product table
     */
    public function product() {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

}
