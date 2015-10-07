<?php
/**
 * Created by PhpStorm.
 * User: hlogeon
 * Date: 10/5/15
 * Time: 1:28 PM
 */

Admin::model(App\Meta::class)->title('Мета')
    ->as('meta')
    ->columns(function ()
    {

        Column::string('id', '№');
        Column::string('name', 'Ключ');
        Column::string('title', 'Заголовок');
        Column::string('description', 'Описание');

    })->form(function ()
    {

        FormItem::text('name', 'Ключ');
        FormItem::text('meta_title', 'Meta Заголовок');
        FormItem::textarea('description', 'Описание');
    });