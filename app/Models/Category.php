<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'code', 'is_active'];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function commissionSlabs()
    {
        return $this->hasMany(CommissionSlab::class);
    }

    public function commissions()
    {
        return $this->hasMany(Commission::class);
    }
}
