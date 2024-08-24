<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shipment extends Model
{
    use HasUuids;
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = [
        'order_id',
        'tracking_number',
        'name',
        'phone',
        'address',
        'city',
        'province',
        'courier',
        'service',
        'estimate',
        'cost',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
