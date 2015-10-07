<?php
/**
 * Created by PhpStorm.
 * User: hlogeon
 * Date: 10/5/15
 * Time: 1:34 PM
 */

namespace App\Models;


interface IHasMetaTitleAndDescription {

    public function hasMetaTitle();

    public function hasMetaDescription();

}