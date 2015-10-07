<?php
/**
 * Created by PhpStorm.
 * User: hlogeon
 * Date: 10/7/15
 * Time: 12:53 PM
 */

namespace App;


use App\Models\IHasMetaTitleAndDescription;
use App\Models\THasMetaDescription;
use App\Models\THasMetaTitle;
use SleepingOwl\Models\SleepingOwlModel;

class Meta extends SleepingOwlModel implements IHasMetaTitleAndDescription{

    use THasMetaDescription, THasMetaTitle;

    protected $guarded = [];

}