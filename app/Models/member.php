<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class member
 * @package App\Models
 * @version February 17, 2023, 4:12 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $bookings
 * @property \Illuminate\Database\Eloquent\Collection $memberimages
 * @property string $firstname
 * @property string $surname
 * @property string $membertype
 * @property string $dateofbirth
 * @property string $memberimage
 */
class member extends Model
{


    public $table = 'member';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'firstname',
        'surname',
        'membertype',
        'dateofbirth',
        'memberimage'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'firstname' => 'string',
        'surname' => 'string',
        'membertype' => 'string',
        'dateofbirth' => 'date',
        'memberimage' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'firstname' => 'nullable|string|max:30',
        'surname' => 'nullable|string|max:30',
        'membertype' => 'nullable|string|max:6',
        'dateofbirth' => 'nullable',
        'memberimage' => 'nullable|string'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function bookings()
    {
        return $this->hasMany(\App\Models\Booking::class, 'memberid');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function memberimages()
    {
        return $this->hasMany(\App\Models\Memberimages::class, 'memberid');
    }
}
