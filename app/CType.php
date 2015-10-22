<?php namespace App;


use \SleepingOwl\Models\SleepingOwlModel as Model;


/**
 * Type of ownership
 *
 * Class CType
 * @package App
 */
class CType extends Model {

    protected $table = 'ctypes';

    protected $fillable = ['name', 'display', ];


    /**
     * Get all companies with such type of ownership
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function companies()
    {
        return $this->hasMany('App\Company');
    }



    /**
     * Get the array for admin panel with names and ids
     *
     * @return array
     */
    public static function getList()
    {
        return static::lists('name', 'id');
    }

}
