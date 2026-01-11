<?php

declare(strict_types=1);

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * User Model.
 * 
 * Follows Rule 1.4 (Strict PHP 8.4) and Rule 4.1 (Eloquent Casts).
 */
final class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'role',
        'is_active',
        'is_premium',
        'premium_until',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_active' => 'boolean',
            'is_premium' => 'boolean',
            'premium_until' => 'datetime',
        ];
    }

    /**
     * Get dynamic premium status.
     * If is_premium is manually set to true but premium_until is past, 
     * this still helps but better to rely on premium_until logic.
     */
    public function getIsPremiumAttribute($value): bool
    {
        if (!$value) return false;
        
        if ($this->premium_until && $this->premium_until->isPast()) {
            return false;
        }

        return (bool) $value;
    }
}
