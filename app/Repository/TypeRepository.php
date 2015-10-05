<?php
/**
 * Created by PhpStorm.
 * User: hlogeon
 * Date: 10/4/15
 * Time: 9:37 PM
 */

namespace App\Repository;


use App\Type;

class TypeRepository extends AbstractRepository{


    protected function getModelClass()
    {
        return new Type();
    }


}