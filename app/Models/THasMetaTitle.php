<?php
/**
 * Created by PhpStorm.
 * User: hlogeon
 * Date: 10/5/15
 * Time: 1:26 PM
 */

namespace App\Models;


trait THasMetaTitle {

    protected $titleFieldName = 'meta_title';

    public function hasMetaTitle()
    {
        return true;
    }

}