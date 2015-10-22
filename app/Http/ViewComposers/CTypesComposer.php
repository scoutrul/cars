<?php


namespace App\Http\ViewComposers;


use Illuminate\View\View;

class CTypesComposer {

    /**
     * Define type of ownerships and compose it to view
     *
     * @param View $view
     */
    public function compose(View $view)
    {
        $ctypes = \App\Singleton::ctypes();
        $view->with('ctypes', $ctypes);
    }

}