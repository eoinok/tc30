<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class court
 * @package App\Models
 * @version February 21, 2023, 5:04 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $bookings
 * @property string $surface
 * @property boolean $floodlights
 * @property boolean $indoor
 * @property number $lat
 * @property number $lng
 */
class court extends Model
{


    public $table = 'court';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $appends = ['name'];


    public $fillable = [
        'surface',
        'floodlights',
        'indoor',
        'lat',
        'lng'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'surface' => 'string',
        'floodlights' => 'boolean',
        'indoor' => 'boolean',
        'lat' => 'float',
        'lng' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'surface' => 'nullable|string|max:30',
        'floodlights' => 'nullable|boolean',
        'indoor' => 'nullable|boolean',
        'lat' => 'nullable|numeric',
        'lng' => 'nullable|numeric'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function bookings()
    {
        return $this->hasMany(\App\Models\Booking::class, 'courtid');
    }
    
    public function getNameAttribute()
    {
        $name = $this->surface;
        if ($this->floodlights) $name .= " Floodlights";
        if ($this->indoor) $name .=" Indoor"; else $name .=" Outdoor";
        return $name;
    }
    
    
}
