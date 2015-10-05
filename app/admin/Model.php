<?php
/**
 * Created by PhpStorm.
 * User: hlogeon
 * Date: 10/5/15
 * Time: 1:28 PM
 */

Admin::model(App\CarModel::class)->title('Мета моделей машин')
    ->as('models_meta')
    ->columns(function ()
    {

        Column::string('id', '№');
        Column::string('title', 'Заголовок');

    })->form(function ()
    {

        FormItem::text('meta_title', 'Meta Заголовок');
        FormItem::textarea('description', 'Описание');
    });