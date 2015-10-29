<?php

Admin::model(App\MetaTag::class)->title('Мета теги и описание')
    ->as('meta_tags')
    ->with(['spec', 'type', 'make', 'model'])
    ->async()
    ->columns(function ()
    {
        Column::string('id', '№');
        Column::string('spec.title', 'Рубрика');
        Column::string('type.title', 'Тип');
        Column::string('make.title', 'Марка');
        Column::string('model.title', 'Модель');
        Column::string('tags', 'Теги');
        Column::string('description', 'Описание');

    })->form(function ()
    {
        FormItem::select('spec_id', 'Рубрика')->list(\App\Spec::class);
        FormItem::select('type_id', 'Тип авто')->list(\App\Type::class);
        FormItem::select('make_id', 'Марка авто')->list(\App\Make::class);
        FormItem::select('model_id', 'Модель авто')->list(\App\CarModel::class);
        FormItem::text('tags', 'Ключевые слова');
        FormItem::ckeditor('description', 'Описание');

        FormItem::view('admin.meta-tags');
    });