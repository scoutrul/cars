<?php
/**
 * Created by PhpStorm.
 * User: hlogeon
 * Date: 10/1/15
 * Time: 2:42 PM
 */

namespace App\Http\ViewComposers;


use Illuminate\View\View;

class CurrentSpecsComposer {

    protected $current;

    protected $specs;

    public function __construct()
    {
        $this->specs = \App\Singleton::specs();
    }

    public function compose(View $view)
    {
        $data = $view->getData();
        if(isset($data['current']))
            $this->current = $data['current'];
        else
            $this->current = false;
        $view->with('specs', $this->specs)->with('current', $this->current);
    }

}