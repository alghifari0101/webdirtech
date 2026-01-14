<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class CvData extends Model
{
    protected $fillable = [
        'user_id',
        'full_name',
        'email',
        'phone',
        'location',
        'summary',
        'experience',
        'education',
        'skills',
        'projects',
        'languages',
        'template',
        'language',
        'photo_path',
        'organizations',
    ];

    protected function casts(): array
    {
        return [
            'experience' => 'array',
            'education' => 'array',
            'skills' => 'array',
            'projects' => 'array',
            'languages' => 'array',
            'organizations' => 'array',
            'certifications' => 'array',
            'section_order' => 'array',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }}
