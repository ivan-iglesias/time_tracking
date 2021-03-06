<?php

namespace App\Model\Record;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
    protected $table = 'records';

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
        'user_id', 'check_in', 'check_out', 'night_shift', 'project_id', 'type', 'comments', 'ip'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['check_in', 'check_out'];

    /**
     * Get the user that owns the record.
     */
    public function user()
    {
        return $this->belongsTo(\App\User::class);
	}

	/**
     * Get the project that owns the record.
     */
    public function project()
    {
        return $this->belongsTo(\App\Model\Project\Project::class);
    }

    /**
     * Get the ticket records associated with the record.
     */
    public function ticket()
    {
        return $this->hasMany(\App\Model\Ticket\Ticket::class);
    }
}
