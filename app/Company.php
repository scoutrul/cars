<?php namespace App;

use \SleepingOwl\Models\SleepingOwlModel as Model;

class Company extends Model {

	protected $table = 'companies';

	protected $fillable = ['ctype_id', 'name', 'address', 'phone', 'about', 'status'];

	protected $appends = ['title'];


	public function user() {
		return $this->belongsTo('App\User', 'user_id');
	}

	public function type() {
		return $this->belongsTo('App\Type', 'type_id');
	}

	public function spec() {
		return $this->belongsTo('App\Spec', 'spec_id');
	}


	/**
	 * Get the Type of ownership fo current company
	 *
	 * @return mixed
	 */
	public function cType() {
		return $this->belongsTo('App\CType', 'ctype_id');
	}



	public function models() {

		return $this->belongsToMany(
				'App\CarModel', 'company_models', 
				'company_id', 'model_id'
			);

	}

	public function makes() {

		return $this->belongsToMany(
				'App\Make', 'company_makes', 
				'company_id', 'make_id'
			);

	}

	public function rooms() {
		return $this->hasMany('App\Room', 'company_id');
	}


	/**
	 * Get company name with type of ownership
	 *
	 * @return string
	 */
	public function getTitleAttribute()
	{
		return ( ! is_null($this->cType) && $this->cType->display) ? $this->cType->name . ' ' . $this->name : $this->name;
	}


}
