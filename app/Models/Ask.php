<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * Ask Model.
 * 
 * Follows Rule 1.4 (Strict PHP 8.4) and Rule 4.1 (Eloquent Casts).
 */
final class Ask extends Model
{
    /** @use HasFactory<\Database\Factories\AskFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'question',
        'answer',
        'slug',
    ];

    /**
     * Get the route key for the model.
     * 
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * Boot the model animations and observers.
     * 
     * @return void
     */
    protected static function boot(): void
    {
        parent::boot();

        static::creating(function (Ask $ask) {
            $ask->slug = Str::slug($ask->question);
        });

        static::updating(function (Ask $ask) {
             if ($ask->isDirty('question')) {
                $ask->slug = Str::slug($ask->question);
            }
        });
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }
}
