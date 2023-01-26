<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class member
 * @package App\Models
 * @version January 25, 2023, 3:03 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $bookings
 * @property string $firstname
 * @property string $surname
 * @property string $membertype
 * @property string $dateofbirth
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
        'dateofbirth'
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
        'dateofbirth' => 'date'
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
        'dateofbirth' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function bookings()
    {
        return $this->hasMany(\App\Models\Booking::class, 'memberid');
    }
}
