<?php
/**
 * Created by PhpStorm.
 * User: hlogeon
 * Date: 10/1/15
 * Time: 3:46 PM
 */

namespace App\Repository;


use App\CarModel;
use App\Company;
use App\Make;
use App\Spec;
use App\Type;

class CompanyRepository extends AbstractRepository{


    protected function getModelClass()
    {
        return new Company();
    }

    public function getActiveByMakeAndSpec(Make $make, Spec $spec, $limit = 6)
    {
        return \App\Company::whereHas('makes', function($q) use($make){
            $q->whereId($make->id);
        })
            ->whereStatus(1)
            ->where('spec_id', $spec->id)
            ->with('models')
            ->take($limit)
            ->get();
    }

    public function getActiveByMakeAndSpecType(Make $make, Spec $spec, Type $type, $limit = 6)
    {
        return \App\Company::whereHas('makes', function($q) use($make){
            $q->whereId($make->id);
        })
            ->whereStatus(1)
            ->where('spec_id', $spec->id)
            ->where('type_id', $type->id)
            ->with('models')
            ->take($limit)
            ->get();
    }


    public function getActiveByModelAndSpec(CarModel $carModel, Spec $spec, $limit = 6)
    {
        return \App\Company::whereHas('models', function($q) use($carModel){
            $q->whereId($carModel->id);
        })
            ->whereStatus(1)
            ->where('spec_id', $spec->id)
            ->take($limit)
            ->get();
    }


    public function getActiveByModelAndSpecType(CarModel $carModel, Spec $spec, Type $type, $limit = 6)
    {
        return \App\Company::whereHas('models', function($q) use($carModel){
            $q->whereId($carModel->id);
        })
            ->whereStatus(1)
            ->where('spec_id', $spec->id)
            ->where('type_id', $type->id)
            ->take($limit)
            ->get();
    }

    public function getActiveByModel(CarModel $carModel, $limit = 6)
    {
        return \App\Company::whereHas('models', function($q) use($carModel){
            $q->whereId($carModel->id);
        })
            ->whereStatus(1)
            ->take($limit)
            ->get();
    }

    public function getActiveByModelAndType(CarModel $carModel, Type $type, $limit = 6)
    {
        return \App\Company::whereHas('models', function($q) use($carModel){
            $q->whereId($carModel->id);
        })
            ->whereStatus(1)
            ->where('type_id', $type->id)
            ->take($limit)
            ->get();
    }

    public function getActiveByMake(Make $make, $limit = 6)
    {
        return \App\Company::whereHas('makes', function($q) use($make){
            $q->whereId($make->id);
        })
            ->whereStatus(1)
            ->with('models')
            ->take($limit)
            ->get();
    }


    public function getActiveByMakeAndType(Make $make, Type $type, $limit = 6)
    {
        return \App\Company::whereHas('makes', function($q) use($make){
            $q->whereId($make->id);
        })
            ->whereStatus(1)
            ->where('type_id', $type->id)
            ->with('models')
            ->take($limit)
            ->get();
    }


}