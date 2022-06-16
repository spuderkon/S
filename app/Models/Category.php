<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $Category_id
 * @property int    $Parent_id
 * @property string $Name
 */
class Category extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'Category';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'Category_id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Name', 'Parent_id'
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
        'Category_id' => 'int', 'Name' => 'string', 'Parent_id' => 'int'
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
        return  $this->hasMany(Category::class, 'Category_id');
    }
    
    public function subcategory(){

        return $this->hasMany(Category::class, 'Parent_id');

    }

    
}
