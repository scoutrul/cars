<?php
/**
 * Created by PhpStorm.
 * User: hlogeon
 * Date: 10/1/15
 * Time: 3:33 PM
 */

namespace App\Repository;


use App\Spec;

class SpecsRepository extends AbstractRepository{


    protected function getModelClass()
    {
        return new Spec();
    }


    public function getForCatalogByName($name)
    {
        return \App\Spec::whereName($name)->select('id', 'name', 'title')->first();
    }

}