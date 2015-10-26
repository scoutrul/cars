<?php
/**
 * Created by PhpStorm.
 * User: hlogeon
 * Date: 10/5/15
 * Time: 11:19 AM
 */

Admin::model(App\Spec::class)->title('Рубрики')
    ->as('specs')
    ->columns(function ()
    {
        Column::string('id', '№');
        Column::string('title', 'Заголовок');
        Column::string('name', 'Алиас');
        Column::display('light_spec', 'Легкая рубрика');

    })->form(function ()
    {
        FormItem::text('title', 'Заголовок')->required();
        FormItem::text('meta_title', 'Meta Заголовок');
        FormItem::text('name', 'Алиас')->required();
        FormItem::text('description', 'Описание');
        FormItem::checkbox('light_spec', 'Легкая рубрика');

    });