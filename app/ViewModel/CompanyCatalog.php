<?php
/**
 * Created by PhpStorm.
 * User: hlogeon
 * Date: 10/1/15
 * Time: 4:06 PM
 */

namespace App\ViewModel;


use App\Company;

class CompanyCatalog {


    /**
     * @param Company|array $company
     * @return array
     */
    public static function present($company)
    {
        if(is_array($company) || $company instanceof \Traversable)
            return static::presentMany($company);
        return static::presentOne($company);
    }


    public static function presentOne(Company $company)
    {
        $arr = array();
        $t = array();
        $arr['name'] = $company->name;
        $arr['about'] = $company->about;
        $arr['phone'] = $company->phone;
        $arr['logo'] = $company->logo;
        $arr['address'] = $company->address;

        $t[] = $company->spec->title;
        $t[] = $company->type->title;

        foreach($company->makes as $k => $v){

            $t[] = $v->title;

        }

        $arr['tags'] = $t;
        return $arr;
    }

    public static function presentMany($companies)
    {
        $companiesArray = [];
        foreach($companies as $key => $val){
            $companiesArray[] = static::presentOne($val);

        }
        return $companiesArray;
    }

}