<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class memberimages
 * @package App\Models
 * @version February 15, 2023, 7:54 pm UTC
 *
 * @property \App\Models\Member $memberid
 * @property integer $memberid
 * @property string $description
 * @property string $imagefile
 */
class memberimages extends Model
{


    public $table = 'memberimages';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'memberid',
        'description',
        'imagefile'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'memberid' => 'integer',
        'description' => 'string',
        'imagefile' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'memberid' => 'required|integer'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function memberid()
    {
        return $this->belongsTo(\App\Models\Member::class, 'memberid');
    }
}
