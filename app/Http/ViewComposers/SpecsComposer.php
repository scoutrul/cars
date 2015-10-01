<?php
/**
 * Created by PhpStorm.
 * User: hlogeon
 * Date: 10/1/15
 * Time: 2:42 PM
 */

namespace App\Http\ViewComposers;


use Illuminate\View\View;

class SpecsComposer {

    protected $specs;

    public function __construct()
    {
        $this->specs = \App\Singleton::specs();
    }

    public function compose(View $view)
    {
        $view->with('specs', $this->specs);
    }

}