<?php

Admin::model(App\CType::class)->title('Формы собственности')
    ->as('ctypes')
    ->columns(function ()
    {
        Column::string('id', '№');
        Column::string('name', 'Название');
        Column::display('display', 'Отображается рядом с названием компании');

    })->form(function ()
    {
        FormItem::text('name', 'Название')->required();
        FormItem::checkbox('display', 'Отображать рядом с названием компании');
    });