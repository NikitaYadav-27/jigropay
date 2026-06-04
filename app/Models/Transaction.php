<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'txn_id', 'bconnect_txn_id', 'operator_ref_id',
        'user_id', 'category_id',
        'amount', 'ccf', 'commission_earned', 'total_settled',
        'consumer_number', 'payment_method', 'ip_address', 'status',
    ];

    protected $casts = [
        'amount'            => 'decimal:2',
        'ccf'               => 'decimal:2',
        'commission_earned' => 'decimal:2',
        'total_settled'     => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function commissions()
    {
        return $this->hasMany(Commission::class);
    }
}
