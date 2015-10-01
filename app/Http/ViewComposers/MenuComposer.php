<?php
/**
 * Created by PhpStorm.
 * User: hlogeon
 * Date: 10/1/15
 * Time: 2:42 PM
 */

namespace App\Http\ViewComposers;


use Illuminate\View\View;

class MenuComposer {

    protected $pages;

    protected $catalog = 'active';

    protected $feedback = 'active';

    protected $contacts = 'active';


    public function __construct()
    {
        $this->pages = \App\Page::whereInHeader(1)->get();
        $path = \Request::path();
        $c = strpos($path, 'catalog');
        if($c === false)
            $this->catalog = '';

        $f = strpos($path, 'feedback');
        if($f === false)
            $this->feedback = '';

        $f = strpos($path, 'contacts');
        if($f === false)
            $this->contacts = '';
    }

    public function compose(View $view)
    {
        $view->with('catalog', $this->catalog)
            ->with('feedback', $this->feedback)
            ->with('pages', $this->pages)
            ->with('contacts', $this->contacts);
    }

}