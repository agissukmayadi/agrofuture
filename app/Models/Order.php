<?php

namespace App\Models;

use App\Models\OrderDetail;
use App\Models\Shipment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasUuids;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($order) {
            $order->invoice_number = $order->generateInvoiceNumber();
        });
    }

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'user_id',
        'invoice_number',
        'payment_token',
        'total',
        'paid_at',
        'shipped_at',
        'cancelled_at',
        'success_at',
        'failed_at',
        'note_cancelled',
        'note_failed',
        'status',
    ];

    private function generateInvoiceNumber()
    {
        $prefix = 'INV';
        $date = Carbon::now()->format('Ymd'); // Current date in YYYYMMDD format

        // Find the latest order for the current date
        $lastOrder = self::where('invoice_number', 'LIKE', "$prefix/$date/%")
            ->latest('created_at')
            ->first();

        if ($lastOrder) {
            // Extract the last sequence number and increment it
            $lastSequence = (int) str_replace("$prefix/$date/", '', $lastOrder->invoice_number);
            $nextSequence = $lastSequence + 1;
        } else {
            // Initialize sequence number if no previous order
            $nextSequence = 1;
        }

        // Format the next sequence number to ensure it is zero-padded
        $formattedSequence = str_pad($nextSequence, 4, '0', STR_PAD_LEFT);

        return "$prefix/$date/$formattedSequence";
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function shipment()
    {
        return $this->hasOne(Shipment::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

}
