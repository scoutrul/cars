<?php namespace App;


use \SleepingOwl\Models\SleepingOwlModel as Model;


class MetaTag extends Model {


	protected $fillable = ['spec_id', 'type_id', 'make_id', 'model_id', 'tags', 'description', ];


    /**
     * Get the rubric of given meta description
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function spec()
    {
        return $this->belongsTo('App\Spec', 'spec_id');
    }


    /**
     * Get car type of given meta description
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
   public function type()
    {
        return $this->belongsTo('App\Type', 'type_id');
    }


    /**
     * Get car mark of given meta description
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function make()
    {
        return $this->belongsTo('App\Make', 'make_id');
    }


    /**
     * Get car model of given meta description
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function model()
    {
        return $this->belongsTo('App\CarModel', 'model_id');
    }


}
