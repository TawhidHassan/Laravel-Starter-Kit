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
     * Set a value for setting
     *
     * @param $key
     * @param $value
     * @return bool
     */
    public static function set($key, $value)
    {
        if ($setting = self::getAllSettings()->where('name', $key)->first()) {
            return $setting->update([
                'name' => $key,
                'value' => $value]) ? $value : false;
        }
        return self::add($key, $value);
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

/**
     * Add a settings value
     *
     * @param $key
     * @param $value
     * @return bool
     */
    public static function add($key, $value)
    {
        if (self::has($key)) {
            return self::set($key, $value);
        }
        return self::create(['name' => $key, 'value' => $value]) ? $value : false;
    }

    /**
     * Update Settings
     *
     * @param $data
     * @return void
     */
    public static function updateSettings($data)
    {
        foreach ($data as $key => $value) {
            self::set($key, $value);
        }
    }
}
