<?php

namespace App\Model\Timetable;

use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
    protected $table = 'timetables';

    /**
	 * Indicates if the model should be timestamped.
	 */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'from_date', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['from_date'];

    /**
     * Get the user that owns the timetable.
     */
    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }

}
