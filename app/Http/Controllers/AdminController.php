<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AdminController extends Controller {

	public function index() {

		$requests = \App\Request::whereStatus(0)->count();

		$comments = \App\Comment::whereStatus(0)->count();

		$feedbacks = \App\Feedback::whereStatus(0)->count();

		return view('admin.index')
			->with(compact('requests', 'feedbacks', 'comments'));

	}

	public function makes() {

		$makes = \App\Make::with('models.type')->get();

		$types = \App\Type::all();

		return view('admin.makesmodels')
		->with('types', $types)
		->with('makes', $makes);

	}

	public function removeMake() {

		$id = \Input::get('id');

		\App\Make::destroy($id);

	}

	public function removeModel() {

		$id = \Input::get('id');

		\App\CarModel::destroy($id);

	}

	public function createMake() {

		$title = \Input::get('title');
		$url = \Input::get('url');

		$make = new \App\Make;

		$make->title = $title;
		$make->name = $url;

		$make->save();

		$models = \Input::get('models');

		if($models) {

			foreach($models as $m) {

				$mo = (object)$m;

				$model = new \App\CarModel;

				$model->title = $mo->title;
				$model->name = $mo->url;
				$model->type_id = $mo->type;
				$model->make_id = $make->id;

				$model->save();

			}

		}

	}

	public function makesmodels() {

		$id = \Input::get('id');
		$title = \Input::get('title');
		$url = \Input::get('url');

		$models = \Input::get('models');

		$make = \App\Make::find($id);

		if($title)
			$make->title = $title;

		if($url)
			$make->name = $url;

		$make->save();

		if($models) {

			foreach($models as $m) {

				$mo = (object)$m;

				if($mo->new) {

					$model = new \App\CarModel;

					$model->title = $mo->title;
					$model->name = $mo->url;
					$model->type_id = $mo->type;
					$model->make_id = $make->id;

				} else {

					$model = \App\CarModel::find($mo->id);

					$model->title = $mo->title;
					$model->name = $mo->url;
					$model->type_id = $mo->type;

				}

				$model->save();

			}

		}

	}

}
