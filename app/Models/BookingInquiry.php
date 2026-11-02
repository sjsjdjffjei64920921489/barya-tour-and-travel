<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BookingInquiry extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'tour_id', 'travel_date', 'travelers', 'message', 'status'];

    protected function casts(): array
    {
        return ['travel_date' => 'date'];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function tour(): BelongsTo
    {
        return $this->belongsTo(Tour::class);
    }
}
