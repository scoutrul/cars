<?php
/**
 * Created by PhpStorm.
 * User: hlogeon
 * Date: 10/1/15
 * Time: 3:52 PM
 */

namespace App\Repository;


use App\CarModel;
use App\Make;

class CarModelRepository extends AbstractRepository{


    protected function getModelClass()
    {
        return new CarModel();
    }

    public function getByMakeWithCompanies(Make $make)
    {
        return $this->modelClass->where('make_id', $make->id)->has('companies')->get();
    }

    public function getFirstByNameAndMake($name, $make)
    {
        return $this->modelClass->where('make_id', $make->id)->where('name', $name)->get();
    }



}