<!DOCTYPE html>

<html lang="ru">

	<head>
		<meta charset="UTF-8">
        @include('inc.meta')
		<link rel="stylesheet" href="{{ URL::to('/') }}/css/style.css">
		<link href='http://fonts.googleapis.com/css?family=Roboto:500,700italic,300,700,500italic,300italic' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="{{ URL::to('/') }}/css/vendor/popup.css">
		<link rel="stylesheet" href="{{ URL::to('/') }}/css/vendor/jcrop.css">
		<link rel="stylesheet" href="{{ URL::to('/') }}/css/vendor/quill.snow.css">
<!-- 		<meta http-equiv="cache-control" content="max-age=0" />
		<meta http-equiv="cache-control" content="no-cache" />
		<meta http-equiv="cache-control" content="no-store" />
		<meta http-equiv="cache-control" content="must-revalidate" />
		<meta http-equiv="expires" content="0" />
		<meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
		<meta http-equiv="pragma" content="no-cache" /> -->
		<meta name="viewport" content="width=1240">

	</head>

	<body data-home="{{ URL::to('/') }}" data-csrf="{{ csrf_token() }}">
		
		@include('inc.header')


		@include('inc.menu')
		

		@yield('body')

		
		<div id="fill-up-profile-popup" class="mfp-hide popup popup_error">
			Что бы пользоваться всеми возможностями сайта - заполните профиль.
		</div>
		
		@include('inc.footer')

		<div id="alert-popup" class="popup mfp-hide popup--alert">

			<div class="popup_content">
				<div class="popup_button">Закрыть</div>
			</div>

		</div>


<!-- Yandex.Metrika counter -->
<script src="https://mc.yandex.ru/metrika/watch.js" type="text/javascript"></script>
<script type="text/javascript">
try {
    var yaCounter32453035 = new Ya.Metrika({
        id:32453035,
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
    });
} catch(e) { }
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/32453035" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->


		<script src="{{ URL::to('/') }}/js/vendor/jquery.js"></script>
		<script src="{{ URL::to('/') }}/js/vendor/jquery-ui.js"></script>
		<script src="{{ URL::to('/') }}/js/vendor/photoset-grid.js"></script>
		<script src="{{ URL::to('/') }}/js/vendor/quill.js"></script>
		<script src="{{ URL::to('/') }}/js/vendor/jcrop.js"></script>
		<script src="{{ URL::to('/') }}/js/vendor/sticky.js"></script>
		<script src="{{ URL::to('/') }}/js/vendor/handlebars.js"></script>
		<script src="{{ URL::to('/') }}/js/vendor/autosize.min.js"></script>
		<script src="{{ URL::to('/') }}/js/vendor/selectbox.js"></script>
		<script src="{{ URL::to('/') }}/js/vendor/underscore.js"></script>
		<script src="{{ URL::to('/') }}/js/vendor/backbone.js"></script>
		<script src="{{ URL::to('/') }}/js/vendor/popup.js"></script>
		<script src="{{ URL::to('/') }}/js/script.js"></script>
		
	</body>

</html>