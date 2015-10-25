<?php

Admin::model(App\User::class)->title('Пользователи')
->as('users')
->with('company.models')
->columns(function ()
{
	// Describing columns for table view
	Column::string('id', '№');
	Column::string('name', 'Имя');
	Column::string('email', 'Email');
	Column::display('confirmed', 'Подтвержден');
})->form(function ()
{
	// Describing elements in create and editing forms
	FormItem::select('confirmed', 'Статус')
		->list([1 => 'Подтвержден', 0 => 'Не подтвержден']);
	FormItem::text('name', 'Имя');
	FormItem::text('email', 'Email');

});