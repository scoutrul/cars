<?php
/**
 * Created by PhpStorm.
 * User: hlogeon
 * Date: 10/1/15
 * Time: 3:26 PM
 */

namespace App\Repository;


use App\Make;
use App\Spec;

class MakesRepository extends AbstractRepository{


    protected function getModelClass()
    {
        return new Make;
    }


    public function getForCatalogIndex()
    {
        return \App\Make::whereHas('companies', function($q){
            $q->whereStatus(1);
        })
            ->orderBy('soviet', 'DESC')
            ->orderBy('title', 'ASC')
            ->get();
    }


    public function getForCatalogBySpec(Spec $spec)
    {
        return \App\Make::whereHas('companies', function($q) use ($spec){

            $q->where('spec_id', $spec->id);
            $q->whereStatus(1);

        })->get();
    }



}