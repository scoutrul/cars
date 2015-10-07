<?php namespace App\Http\Controllers;

use App\Meta;

class HomeController extends Controller {

	public function index() {

		$makes = \App\Make::whereHas('companies', function($q){
			$q->whereStatus(1);
		})
		->orderBy('soviet', 'DESC')
		->orderBy('title', 'ASC')
		->get();

		$types = \App\Type::count();

		$makesTypes = [];

		for($i=1; $i<=$types; $i++) {
			$makesTypes[] = \App\Make::select('id')
				->whereHas('companies', function($q) use($i){
					$q->where('type_id', $i);
					$q->whereStatus(1);
				})
				->get();
		}

		$ids = array();

		foreach ($makesTypes as $v) {

			$tmp = [];
			
			foreach ($v as $value) {
				$tmp[] = $value->id;
			}

			$ids[] = json_encode($tmp);

		}

        $view = view('pages.home')
            ->with('ids', $ids)
            ->with('makes', $makes);

        $meta = Meta::where('name', 'index');
        if($meta->count() > 0){
            $meta = $meta->first();
            $meta_title = $meta->meta_title;
            $description = $meta->description;
            $view->with('meta_title', $meta_title)->with('meta_description', $description);
        }
		return $view;

	}

}