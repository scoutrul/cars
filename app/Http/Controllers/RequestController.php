<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Traits\MailTrait;
use App\User;
use Illuminate\Http\Request;

class RequestController extends Controller {

	use MailTrait;

	public function create(Request $request) {

        $input = (object)\Input::all();

        if( ! \Auth::check() && !empty($input->email) && !empty($input->pass) ){
            $this->signUp($request->only(['email', 'pass']));
        }

		if( ! \Auth::user()->is_ready() )
			return 'hello lamer0';


		$request = new \App\Request;

		$request->type_id = $input->type;

		if( ! $input->new && ! $input->old )
			return 'hello lamer1';
		else {
			$request->new = $input->new;
			$request->old = $input->old;
		}

		if(\App\Make::isInType($input->make, $input->type))
			$request->make_id = $input->make;
		else
			return 'hello lamer2';

		if(\App\CarModel::isInMake($input->model, $input->make))
			$request->model_id = $input->model;
		else
			return 'hello lamer3';

		if( ! $input->year )
			return 'hello lamer4';
		else
			$request->year = $input->year;

		if( ! $input->more )
			return 'hello lamer5';
		else
			$request->text = $input->more;

		$request->user_id = \Auth::id();

		$request->save();

		// send email to admin
		$this->newRequest($request);

		return $this->createRooms($request);

	}

	public function createRooms($request){

		$companies = \App\Company::whereHas('models', function($q) use($request){
			$q->whereId($request->model_id);
		})
		->with('user')
		->whereTypeId($request->type_id)
		->get();


		foreach ($companies as $company) {
			$room = new \App\Room;
			$room->request_id = $request->id;
			$room->company_id = $company->id;
			$room->save();

			$this->companyRequest($request, $company, $room);
		}

	}


    /**
     * Find Or Create User and Auth him
     *
     * @param $data
     * @return bool
     */
    protected function signUp($data)
    {

        $user = User::where('email', $data['email'])->first();

        if(!$user) {

            $validator = \Validator::make(
                ['email' => $data['email']],
                ['email' => 'required|email|unique:users']
            );

            if ($validator->fails()) {
                return false;
            }

            $code = md5(\Hash::make($data['email']));

            $user = \App\User::create([
                'email' => $data['email'],
                'password' => \Hash::make($data['pass']),
                'confirmation_code' => $code
            ]);

            $this->verifyUser($code, $user);
        }

        \Auth::login($user);

        return $user;

    }

}
