<?php namespace App;

use App\Models\IHasMetaTitleAndDescription;
use App\Models\THasMetaDescription;
use App\Models\THasMetaTitle;
use \SleepingOwl\Models\SleepingOwlModel as Model;

class Spec extends Model implements IHasMetaTitleAndDescription{

    use THasMetaDescription, THasMetaTitle;

	protected $table = 'specs';

	protected $fillable = ['title', 'name', 'light_spec', 'description', 'meta_title'];


	/**
	 * Get companies of current rubric
	 *
	 * @return mixed
	 */
	public function companies() {
		return $this->hasMany('App\Company', 'spec_id');
	}


	/**
	 * Get if is light current spec
	 *
	 * @return mixed
	 */
	public function getLightAttribute()
	{
		return (bool)$this->light_spec;
	}

	/**
	 * Get the array for admin panel with titles and ids
	 *
	 * @return array
	 */
	public static function getList()
	{
		return static::lists('title', 'id');
	}


}
