<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Get all the settings
     *
     * @return mixed
     */


       /**
     * Get all the settings
     *
     * @return mixed
     */
    public static function getAllSettings()
    {
       return self::all();    
    }


     /**
     * Check if setting exists
     *
     * @param $key
     * @return bool
     */
    public static function has($key)
    {
        return (boolean)self::getAllSettings()->whereStrict('name', $key)->count();
    }


    /**
     * Get a settings value
     *
     * @param $key
     * @param null $default
     * @return bool|int|mixed
     */
    public static function get($key, $default = null)
    {
        if (self::has($key)) {
            $setting = self::getAllSettings()->where('name', $key)->first();
            return $setting->value;
        }
        return $default;
    }
}
