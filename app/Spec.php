<?php namespace App;

use App\Models\IHasMetaTitleAndDescription;
use App\Models\THasMetaDescription;
use App\Models\THasMetaTitle;
use \SleepingOwl\Models\SleepingOwlModel as Model;

class Spec extends Model implements IHasMetaTitleAndDescription{

    use THasMetaDescription, THasMetaTitle;

	protected $table = 'specs';

	protected $fillable = ['title', 'name', 'description', 'meta_title'];

	public function companies() {
		return $this->hasMany('App\Company', 'spec_id');
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
