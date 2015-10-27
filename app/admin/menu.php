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


Admin::menu()->label('

<!-- Yandex.Metrika informer -->
<a href="https://metrika.yandex.ru/stat/?id=32453035&amp;from=informer"
target="_blank" rel="nofollow"><img src="https://informer.yandex.ru/informer/32453035/3_0_FFB953FF_FF9933FF_1_pageviews"
style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)" onclick="try{Ya.Metrika.informer({i:this,id:32453035,lang:ru});return false}catch(e){}" /></a>
<!-- /Yandex.Metrika informer -->

<!-- Yandex.Metrika counter -->
<script src="https://mc.yandex.ru/metrika/watch.js" type="text/javascript"></script>
<script type="text/javascript">
try {
    var yaCounter32453035 = new Ya.Metrika({
        id:32453035,
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true
    });
} catch(e) { }
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/32453035" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

');