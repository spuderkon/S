<?php

namespace App\Models;

use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int  $Cart_id
 * @property int  $User_id
 * @property int  $Product_id
 * @property int  $Product_amount
 * @property float $Total
 * @property int  $updated_at
 * @property int  $created_at
 * @property int $Order_date
 */
class Cart extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'Cart';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'Cart_id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'User_id', 'Product_id', 'Product_amount', 'Total', 'Order_date', 'updated_at', 'created_at'
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
        'Cart_id' => 'int', 'User_id' => 'int', 'Product_id' => 'int', 'Product_amount' => 'int', 'Total' => 'double','Order_date' => 'timestamp', 'updated_at' => 'timestamp', 'created_at' => 'timestamp'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'Order_date', 'updated_at', 'created_at'
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
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class,'Product_id');
    }
}
