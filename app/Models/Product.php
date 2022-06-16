<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use App\Models\AgeAudience;
use App\Models\Brand;
use App\Models\Manufacturer;
use App\Models\Material;
use App\Models\Cart;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $Product_id
 * @property int    $Category_id
 * @property int    $Manufacturer_id
 * @property int    $Brand_id
 * @property int    $Age_audience_id
 * @property int    $Material_id
 * @property int    $Details_amount
 * @property int    $Delivered_date
 * @property int    $updated_at
 * @property int    $created_at
 * @property string $Name
 * @property string $Weight
 * @property string $Size
 * @property string $Packing_size
 * @property string $Description
 * @property string $VenCode
 * @property float  $Price
 */
class Product extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'Product';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'Product_id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Category_id', 'Name', 'Manufacturer_id', 'Brand_id', 'Price', 'Age_audience_id', 'Weight', 'Size', 'Material_id', 'Packing_size', 'Details_amount', 'Description', 'VenCode', 'Delivered_date', 'updated_at', 'created_at'
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
        'Product_id' => 'int', 'Category_id' => 'int', 'Name' => 'string', 'Manufacturer_id' => 'int', 'Brand_id' => 'int', 'Price' => 'double', 'Age_audience_id' => 'int', 'Weight' => 'string', 'Size' => 'string', 'Material_id' => 'int', 'Packing_size' => 'string', 'Details_amount' => 'int', 'Description' => 'string', 'VenCode' => 'string', 'Delivered_date' => 'timestamp', 'updated_at' => 'timestamp', 'created_at' => 'timestamp'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'Delivered_date', 'updated_at', 'created_at'
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
    public function categories()
    {
        return $this->belongsTo(Product::class, 'Category_id');
        return $this->hasMany(Category::class, 'Category_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'Category_id');
    }

    public function cart()
    {
        return $this->hasMany(Cart::class, 'Product_id');
    }

    // Relations ...

    public function ageaudience()
    {
        return $this->belongsTo(AgeAudience::class, 'Age_audience_id');
    }

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class, 'Manufacturer_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'Brand_id');
    }

    public function material()
    {
        return $this->belongsTo(Material::class, 'Material_id');
    }
}