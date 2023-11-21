<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PollingStation extends Model
{
    use HasFactory;

    protected $fillable = [
        'SNO',
        'locality',
        'building_location',
        'polling_area',
        'total_votes',
        'constituency_id'
    ];

    public function constituency(): BelongsTo
    {

        return $this->belongsTo(Constituency::class);

    }
}
