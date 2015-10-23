@extends('pages.catalog.catalog')

@section('catalog')
	<h1 class="catalog_type">Каталог</h1>
	@if(!empty($meta_tag_description))
		<div class="model-description">{{ $meta_tag_description->description }}</div>
	@endif

    @if(!isset($no_type) || $no_type === false)
	    @include('inc.type', ['id' => 'catalog-types'])
    @endif

	@include('inc.makes.makes', ['id' => 'catalog-makes'])

@stop