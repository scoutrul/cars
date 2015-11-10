<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Traits\MailTrait;
use Illuminate\Http\Request;

class CompanyController extends Controller {

	use MailTrait;

	public function create() {

		if( $msg = $this->makeValidation() )
			return $msg;

		if( ! is_null(\Input::get('logo'))) {
			$image = $this->storeImage();

			if ($image->failed)
				return $image->messages;
		}

		$company = new \App\Company(\Input::all());

		$company->logo = !empty($image->src) ? $image->src : 'img/noavatar.png';

		$company->user_id = \Auth::id();
		$company->type_id = \Input::get('type') != 0 ? \Input::get('type') : null;
		$company->spec_id = \Input::get('spec');
		$company->ctype_id = \Input::get('cType');
		$company->save();

		if( ! \Input::get('light_spec')) {
			if ($this->attach_makes_models($company, \Input::get('makesmodels')))
				return 'hello lamer 1';
		}

        $this->newCompany($company);

		return route('profile');

	}

	public function makeValidation() {

		if( ! \Auth::user()->is_ready() )
			return 'not ready';

		if( \Auth::user()->company )
			return 'has company';

		$rules = [
			'name' => 'required',
			'address' => 'required',
			'phone' => 'required',
			'about' => 'required',
			'cType' => 'required',
		];

		if( ! \Input::get('light_spec')){
			$rules = array_merge($rules, ['type' => 'required|exists:types,id']);
		}

		$validator = \Validator::make(\Input::all(), $rules);

		if($validator->fails())
			return $validator->failed();

	}

	public function storeImage() {

		$logo = \Input::get('logo');

		$image = \Image::make( $logo );

		$result = new \stdClass;
		$result->messages = array();
		$result->failed = false;

		if($image->height() < 115 or $image->height() > 7000) {
			$result->messages[] = 'height doesnt fits';
			$result->failed = true;
		}

		if($image->width() < 115 or $image->width() > 7000) {
			$result->messages[] = 'width doesnt fits';
			$result->failed = true;
		}

		$name = md5(\Hash::make($logo . \Auth::id()));

		$dirname = 'img/user' . \Auth::id();

		$src = $dirname . '/' . $name . '.jpg';

		if( ! file_exists($dirname) ){
			mkdir($dirname, 0777, true);
		}

		$image->save($src, 100);

		$result->src = $src;

		return $result;

	}

	public function attach_makes_models (\App\Company $company, $makesmodels) {


		// check for validity
		foreach ($makesmodels as $m) {
			$make = (object)$m;

			if($make->id != 0){
			
				if( ! \App\Make::isInType($make->id, $company->type_id))
					return 'make not in type';


				if( $make->models != 0 ) {

					foreach ($make->models as $model) {

						if (! \App\CarModel::isInMake($model, $make->id))
							return 'model is not in make';

					}
				}
			}

		}

		// attach

		foreach ($makesmodels as $m) {

			$make = (object)$m;

			if($make->id == 0){
				$company->makes()->sync( \App\Make::lists('id') );
			}else{
				$company->makes()->attach($make->id);
			}


			if( $make->models == 0 || $make->models[0] == 0 ) {  // all models

				$company->models()->attach( \App\CarModel::getModelsArrayByMake($make->id) );

			} else {

				foreach ($make->models as $model) {
					
					$company->models()->attach($model);

				}

			}

		}

	}

	public function avatar() {

		$input = (object)\Input::all();

		$image = \Image::make($input->src);

		$coords = (object)$input->coords;

		$company = \Auth::user()->company;

		if($image->height() < 115 or $image->height() > 7000) {
			return 'hello lamer 2';
		}

		if($image->width() < 115 or $image->width() > 7000) {
			return 'hello lamer 3';
		}

		$image->crop( (int)$coords->w, (int)$coords->h, (int)$coords->x, (int)$coords->y );

		$name = md5(\Hash::make($input->src . \Auth::id()));

		$dirname = 'img/user' . \Auth::id();

		$fullname = $dirname . '/' . $name . '.jpg';

		if( ! file_exists($dirname) ){
			mkdir($dirname, 0777, true);
		}

		if( file_exists($company->logo) ){
			unlink($company->logo);
		}

		$company->logo = $fullname;

		$company->save();

		$image->save($fullname);

		return \URL::to('/') . '/' . $company->logo;

	}

	public function edit() {

		$data = \Input::all();

		$company = \Auth::user()->company;

		$company->update($data);

		return $company;
		
	}

	public function signUp() {

		$input = (object)\Input::all();

		$validator = \Validator::make(
			['email' => $input->email],
			['email' => 'required|email|unique:users']
		);

		if($validator->fails()){
			return 'hello lamer 4';
		}

		$code = md5(\Hash::make($input->email));

		$user = \App\User::create([
			'email' => $input->email,
			'password' => \Hash::make($input->pass),
			'confirmation_code' => $code
		]);

		\Auth::login($user);

		$this->verifyUser($code, $user);

		$this->create();

		return route('profile');
	}

}
