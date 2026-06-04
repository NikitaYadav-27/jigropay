<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Settlement extends Model
{
    protected $fillable = [
        'initiated_by', 'recipient_id',
        'amount', 'fee', 'net_amount',
        'method', 'status',
        'account_holder', 'account_number', 'ifsc', 'bank_name',
        'remarks',
    ];

    protected $casts = [
        'amount'     => 'decimal:2',
        'fee'        => 'decimal:2',
        'net_amount' => 'decimal:2',
    ];

    public function initiator()
    {
        return $this->belongsTo(User::class, 'initiated_by');
    }

    public function recipient()
    {
        return $this->belongsTo(User::class, 'recipient_id');
    }
}
