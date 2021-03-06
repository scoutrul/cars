<?php

Admin::model(App\Feedback::class)->title('Отзывы')
->as('feedbacks')
->with(['make', 'model', 'user', 'likes', 'dislikes'])
->denyCreating()
->columns(function ()
{

	Column::status();

	Column::string('id', '№');
	Column::string('header', 'Заголовок');
	Column::string('content', 'Контент');

	Column::string('user.name', 'Пользователь');

	Column::string('make.title', 'Марка');
	Column::string('model.title', 'Модель');

	Column::count('likes', 'Лайки');
	Column::count('dislikes', 'Дизлайки');

})->form(function ()
{

	FormItem::select('status', 'Статус')
	->list([1 => 'Подтвержден', 2 => 'Отклонен']);

	FormItem::text('header', 'Заголовок')->required();

	FormItem::ckeditor('content', 'Контент');

});