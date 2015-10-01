<?php
/**
 * Created by PhpStorm.
 * User: hlogeon
 * Date: 10/1/15
 * Time: 3:07 PM
 */

namespace App\Http\ViewComposers;


use Illuminate\View\View;

class TypesComposer {

    public function compose(View $view)
    {
        $types = \App\Singleton::types();
        $view->with('types', $types);
    }

}