<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable, HasApiTokens, SoftDeletes;

    protected $fillable = [
        'name', 'email', 'phone', 'password', 'otp', 'otp_expires_at',
        'role', 'parent_id', 'pan_number',
        'street_address', 'city', 'state', 'pincode',
        'wallet_balance', 'wallet_limit', 'status',
    ];

    protected $hidden = ['password', 'remember_token', 'otp'];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password'          => 'hashed',
            'wallet_balance'    => 'decimal:2',
            'wallet_limit'      => 'decimal:2',
        ];
    }

    // ── Hierarchy ────────────────────────────────────────────

    /** The user who created/owns this user (one level up) */
    public function parent()
    {
        return $this->belongsTo(User::class, 'parent_id');
    }

    /** Direct children (one level down) */
    public function children()
    {
        return $this->hasMany(User::class, 'parent_id');
    }

    // ── Finance ──────────────────────────────────────────────

    public function walletLedger()
    {
        return $this->hasMany(WalletLedger::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function commissions()
    {
        return $this->hasMany(Commission::class);
    }

    public function commissionSlabs()
    {
        return $this->hasMany(CommissionSlab::class);
    }

    public function settlements()
    {
        return $this->hasMany(Settlement::class, 'recipient_id');
    }

    // ── KYC ──────────────────────────────────────────────────

    public function kycDocuments()
    {
        return $this->hasMany(KycDocument::class);
    }

    // ── Notifications ────────────────────────────────────────

    public function sentNotifications()
    {
        return $this->hasMany(PlatformNotification::class, 'sent_by');
    }

    public function notificationReads()
    {
        return $this->hasMany(NotificationRead::class);
    }

    // ── Audit ────────────────────────────────────────────────

    public function auditLogs()
    {
        return $this->hasMany(AuditLog::class);
    }

    // ── Helpers ──────────────────────────────────────────────

    public function isAdmin(): bool       { return $this->role === 'admin'; }
    public function isSuperDist(): bool   { return $this->role === 'super-distributor'; }
    public function isDistributor(): bool { return $this->role === 'distributor'; }
    public function isRetailer(): bool    { return $this->role === 'retailer'; }

    /** Roles this user is allowed to create */
    public function creatableRoles(): array
    {
        return match ($this->role) {
            'admin'              => ['super-distributor', 'distributor', 'retailer'],
            'super-distributor'  => ['distributor', 'retailer'],
            'distributor'        => ['retailer'],
            default              => [],
        };
    }
}
