<?php namespace App;

use App\Models\IHasMetaTitleAndDescription;
use App\Models\THasMetaDescription;
use App\Models\THasMetaTitle;
use \SleepingOwl\Models\SleepingOwlModel as Model;

class Spec extends Model implements IHasMetaTitleAndDescription{

    use THasMetaDescription, THasMetaTitle;

	protected $table = 'specs';

	protected $fillable = ['title', 'name', 'description'];

	public function companies() {
		return $this->hasMany('App\Company', 'spec_id');
	}

}
