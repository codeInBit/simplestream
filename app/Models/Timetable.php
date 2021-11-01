<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Timetable extends Model
{
    use SoftDeletes;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uuid', 'channel_id', 'programme_id', 'date', 'start_time', 'end_time', 'timezone'
    ];

    /**
     * Get the channel that owns the timetable.
     * @return BelongsTo
    */
    public function channel(): BelongsTo
    {
        return $this->belongsTo('App\Models\Channel');
    }

    /**
     * Get the programme that owns the timetable.
     * @return BelongsTo
    */
    public function programme(): BelongsTo
    {
        return $this->belongsTo('App\Models\Programme');
    }
}
