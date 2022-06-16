<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $Age_audience_id
 * @property string $Age
 */
class AgeAudience extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'Age_audience';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'Age_audience_id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Age'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'Age_audience_id' => 'int', 'Age' => 'string'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var boolean
     */
    public $timestamps = true;

    // Scopes...

    // Functions ...

    // Relations ...
    public function product()
    {
        return $this->hasMany(Product::class, 'Age_audience_id');
    }
}
