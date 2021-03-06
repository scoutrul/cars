<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use \Auth;

use Illuminate\Http\Request;

class UserController extends Controller {

	public function profile() {

		if(Auth::user()->company && Auth::user()->company->status){

			$user = \App\User::with(['company' => function($q){
				$q->with('spec');
				$q->with('type');
				$q->with('makes');
			}])->find(Auth::id());

			$company = $user->company;

			return view('pages.company-profile')
				->with('user', $user);

		} else {

			$user = \Auth::user();

			return view('pages.user-profile')->with('user', $user);

		}

	}

	public function edit() {

		$data = \Input::all();

		$user = \Auth::user();

		$user->update($data);

		return $user;

	}

	public function changeEmail() {

		$newEmail = \Input::get('email');

		$user = Auth::user();

		$user->email = $newEmail;
		$user->save();

	}

	public function changePassword() {
		
		$current = \Input::get('current');

		$new = \Input::get('new');

		$newRepeat = \Input::get('newRepeat');

		$user = Auth::user();

		if( ! \Hash::check($current, $user->password) ){
			return 'wrong';
		}

		if( $new != $newRepeat)
			return 'wrong';

		$user->password = \Hash::make($new);
		$user->save();

		return 'ok';

	}

	public function repeat_message() {

		$user = Auth::user();

		if( $user->confirmed ) {
			return redirect()->route('home');
		}

		$code = md5(\Hash::make($user->email));

		$user->confirmation_code = $code;
		$user->save();

		\Mail::send('emails.verify', ['code' => $code], function($msg) use ($user){
			$msg->to($user->email)
			->subject('Подтверждение почты');
		});	

		return redirect()->route('profile');

	}

	public function create() {

		$input = (object)\Input::all();

		$validator = \Validator::make(
			['email' => $input->email],
			['email' => 'required|email|unique:users']

		);

		if($validator->fails()){
			return 'hello lamer';
		}

		$code = md5(\Hash::make($input->email));

		$user = \App\User::create([
			'email' => $input->email,
			'password' => \Hash::make($input->password),
			'confirmation_code' => $code
		]);

		\Auth::login($user);

		\Mail::queue('emails.verify', ['code' => $code], function($msg) use ($user){
			$msg->to($user->email)
			->subject('Подтверждение почты');
		});

		return redirect()->route('profile');

	}

	public function verify($code) {

		$user = \App\User::where('confirmation_code', $code)->first();

		if(!$user) {
			return redirect()->route('home');
		}

		$user->confirmed = true;

		$user->confirmation_code = null;

		$user->save();

		return redirect()->route('profile');

	}

	public function authenticate() {

		$input = (object)\Input::all();

		if(Auth::attempt(['email' => $input->email, 'password' => $input->password], true)){

			return route('profile');

		} else {

			return 'mismatch';

		}

	}

	public function avatar() {

		$input = (object)\Input::all();

		$image = \Image::make($input->src);

		$coords = (object)$input->coords;

		$user = \Auth::user();

		if($image->height() < 115 or $image->height() > 7000) {
			return 'hello lamer';
		}

		if($image->width() < 115 or $image->width() > 7000) {
			return 'hello lamer';
		}

		$image->crop( (int)$coords->w, (int)$coords->h, (int)$coords->x, (int)$coords->y );

		$name = md5(\Hash::make($input->src . \Auth::id()));

		$dirname = 'img/user' . \Auth::id();

		$fullname = $dirname . '/' . $name . '.jpg';

		if( ! file_exists($dirname) ){
			mkdir($dirname, 0777, true);
		}

		if( file_exists($user->ava) ){
			unlink($user->ava);
		}

		$user->ava = $fullname;

		$user->save();

		$image->save($fullname);

		return \URL::to('/') . '/' . $user->ava;

	}

}
