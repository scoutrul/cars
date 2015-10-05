<?php
/**
 * Created by PhpStorm.
 * User: hlogeon
 * Date: 10/5/15
 * Time: 1:26 PM
 */

namespace App\Models;


trait THasMetaDescription {

    protected $descriptionFieldName = 'description';

    public function hasMetaDescription()
    {
        return true;
    }


}