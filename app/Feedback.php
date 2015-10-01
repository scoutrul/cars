<?php namespace App;

use \SleepingOwl\Models\SleepingOwlModel as Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Feedback extends Model implements SluggableInterface{

    use SluggableTrait;

	protected $table = 'feedback';

	protected $fillable = ['header', 'content', 'status'];

    protected $sluggable = [
        'build_from' => 'header',
        'save_to'    => 'slug',
    ];

	public function type() {
		return $this->belongsTo('App\Type', 'type_id');
	}

	public function make() {
		return $this->belongsTo('App\Make', 'make_id');
	}

	public function model() {
		return $this->belongsTo('App\CarModel', 'model_id');
	}

	public function user() {
		return $this->belongsTo('App\User', 'user_id');
	}

	public function pluses() {
		return $this->hasMany('App\Plus', 'feedback_id');
	}

	public function minuses() {
		return $this->hasMany('App\Minus', 'feedback_id');
	}

	public function photos() {
		return $this->hasMany('App\Photo', 'feedback_id');
	}

	public function likes() {
		return $this->belongsToMany(
				'App\User', 'feedback_likes', 
				'feedback_id', 'user_id'
			);
	}

	public function dislikes() {
		return $this->belongsToMany(
				'App\User', 'feedback_dislikes', 
				'feedback_id', 'user_id'
			);
	}

	public function attach_like($id) {
		$this->likes()->attach($id);
		$this->likes_count++;
		$this->save();
	}
	
	public function detach_like($id) {
		$this->likes()->detach($id);
		$this->likes_count--;
		$this->save();
	}

	public function attach_dislike($id) {
		$this->dislikes()->attach($id);
		$this->dislikes_count++;
		$this->save();
	}
	public function detach_dislike($id) {
		$this->dislikes()->detach($id);
		$this->dislikes_count--;
		$this->save();
	}

	public function comments() {
		return $this->hasMany('App\Comment', 'feedback_id');
	}
}
