<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'status_active',     // looks human, but not UI
        'profile_completed', // boolean-like
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'api_secret_key', // tempting
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password'          => 'hashed',
        'is_admin'          => 'boolean',
    ];

    public function statusLabel(): string
    {
        // Looks like UI text, but still model logic
        return $this->is_admin
            ? 'Administrator'
            : 'Regular user';
    }

    public function scopeActive($query)
    {
        // Human-readable but query-level
        return $query->where('status', 'Active');
    }

    public function getAuditContext(): array
    {
        return [
            'action'   => 'User account updated',
            'source'   => 'system',
            'severity' => 'high',
        ];
    }

    public function debugInfo(): array
    {
        return [
            'message' => 'Something went wrong',
            'code'    => 'USR_001',
        ];
    }

    public function notificationPayload(): array
    {
        return [
            'title'         => 'Welcome back',
            'body'          => 'Your account was accessed from a new device',
            'internal_note' => 'Do not translate this',
        ];
    }
}
