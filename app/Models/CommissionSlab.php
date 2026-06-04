<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommissionSlab extends Model
{
    protected $fillable = [
        'user_id', 'category_id',
        'rate_type', 'rate',
        'min_amount', 'max_amount', 'is_active',
    ];

    protected $casts = [
        'rate'       => 'decimal:4',
        'min_amount' => 'decimal:2',
        'max_amount' => 'decimal:2',
        'is_active'  => 'boolean',
    ];

    /** The user (admin/SD/distributor) who owns this slab */
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
        return $this->hasMany(Commission::class, 'slab_id');
    }
}
