<?php
/**
 * Created by PhpStorm.
 * User: hlogeon
 * Date: 10/1/15
 * Time: 3:26 PM
 */

namespace App\Repository;


use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository
{

    /**
     * @var Model
     */
    protected $modelClass;

    public function __construct()
    {
        $this->modelClass = $this->getModelClass();
    }


    public function getById($id)
    {
        return $this->modelClass->find($id);
    }

    public function getFirstByName($name)
    {
        return $this->modelClass->where('name', $name)->first();
    }

    abstract protected function getModelClass();


}
