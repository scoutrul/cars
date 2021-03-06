<?php

/*
 * Describe you custom columns and form items here.
 *
 * There is some simple examples what you can use:
 *
 *		Column::register('customColumn', '\Foo\Bar\MyCustomColumn');
 *
 * 		FormItem::register('customElement', \Foo\Bar\MyCustomElement::class);
 *
 * 		FormItem::register('otherCustomElement', function (\Eloquent $model)
 * 		{
 *			AssetManager::addStyle(URL::asset('css/style-to-include-on-page-with-this-element.css'));
 *			AssetManager::addScript(URL::asset('js/script-to-include-on-page-with-this-element.js'));
 * 			if ($model->exists)
 * 			{
 * 				return 'My edit code.';
 * 			}
 * 			return 'My custom element code';
 * 		});
 */

Column::register('status', \App\Columns\StatusColumn::class);

Column::register('info', \App\Columns\RequestInfoColumn::class);

Column::register('in_menu', \App\Columns\InMenuColumn::class);

Column::register('content', \App\Columns\PageContentColumn::class);

Column::register('soviet', \App\Columns\SovietColumn::class);

Column::register('display', \App\Columns\DisplayColumn::class);