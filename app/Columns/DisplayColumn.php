<?php

namespace App\Columns;

use SleepingOwl\Admin\Columns\Column\BaseColumn;


class DisplayColumn extends BaseColumn
{

    public function render($instance, $totalCount)
    {
        $content = ($instance->{$this->name}) ? 'Да' : 'Нет';
        return parent::render($instance, $totalCount, $content);
    }

}