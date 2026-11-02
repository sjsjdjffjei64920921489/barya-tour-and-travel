<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tour extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'destination',
        'category',
        'duration',
        'price',
        'currency',
        'image_url',
        'image_credit',
        'image_credit_url',
        'summary',
        'description',
        'itinerary',
        'is_published',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
            'is_published' => 'boolean',
        ];
    }

    public function bookingInquiries(): HasMany
    {
        return $this->hasMany(BookingInquiry::class);
    }
}
