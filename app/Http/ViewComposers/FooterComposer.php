<?php
/**
 * Created by PhpStorm.
 * User: hlogeon
 * Date: 10/1/15
 * Time: 2:42 PM
 */

namespace App\Http\ViewComposers;


use Illuminate\Contracts\View\View;

class FooterComposer {

    public function compose(View $view)
    {
        $view->with('pages', \App\Page::all());
    }

}