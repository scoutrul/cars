<?php

/*
 * Describe your menu here.
 *
 * There is some simple examples what you can use:
 *
 * 		Admin::menu()->url('/')->label('Start page')->icon('fa-dashboard')->uses('\AdminController@getIndex');
 * 		Admin::menu(User::class)->icon('fa-user');
 * 		Admin::menu()->label('Menu with subitems')->icon('fa-book')->items(function ()
 * 		{
 * 			Admin::menu(\Foo\Bar::class)->icon('fa-sitemap');
 * 			Admin::menu('\Foo\Baz')->label('Overwrite model title');
 * 			Admin::menu()->url('my-page')->label('My custom page')->uses('\MyController@getMyPage');
 * 		});
 */

Admin::menu()->url('/')
->label('Главная')->icon('fa-dashboard')
->uses('\App\Http\Controllers\AdminController@index');

Admin::menu(\App\Meta::class)->icon('fa-ticket');

Admin::menu(\App\User::class)->icon('fa-users');

Admin::menu(\App\Spec::class)->icon('fa-bookmark');

Admin::menu(\App\Company::class)->icon('fa-building');

Admin::menu(\App\Feedback::class)->icon('fa-comment');

Admin::menu(\App\Request::class)->icon('fa-folder');

Admin::menu(\App\Page::class)->icon('fa-book');

Admin::menu(\App\Comment::class)->icon('fa-comments');

Admin::menu()->url('makes')->uses('App\Http\Controllers\AdminController@makes')->label('Марки и модели')->icon('fa-truck');

Admin::menu(\App\CarModel::class)->icon('fa-ticket');

Admin::menu(\App\CType::class)->icon('fa-suitcase');
Admin::menu(\App\MetaTag::class)->icon('fa-tags');