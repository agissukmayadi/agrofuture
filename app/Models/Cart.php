<?php

namespace App\Models;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Cart extends Pivot
{

    protected $table = 'carts';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $foreignKey = 'user_id';
    protected $relatedKey = 'product_id';
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function scopeAvailableItem(Builder $builder)
    {
        $builder->whereHas('product', function ($query) {
            $query->where('stock', '>', 0)
                ->whereNull('deleted_at');
        });
    }

    public function scopeUnavailableItem(Builder $builder)
    {
        $builder->whereHas('product', function ($query) {
            $query->withTrashed()
                ->where(function ($query) {
                    $query->where('stock', 0)->whereNull('deleted_at');
                })->orWhereNotNull('deleted_at');
        });
    }
}