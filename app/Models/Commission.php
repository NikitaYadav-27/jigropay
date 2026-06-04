<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
    protected $fillable = [
        'transaction_id', 'user_id', 'category_id', 'slab_id',
        'transaction_volume', 'commission_amount', 'status',
    ];

    protected $casts = [
        'transaction_volume' => 'decimal:2',
        'commission_amount'  => 'decimal:2',
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function slab()
    {
        return $this->belongsTo(CommissionSlab::class, 'slab_id');
    }
}
