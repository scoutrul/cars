@extends('pages.catalog.catalog')

@section('catalog')

	<h1 class="catalog_type">Каталог</h1>
    @if(!isset($no_type) || $no_type === false)
	    @include('inc.type', ['id' => 'catalog-types'])
    @endif

	@include('inc.makes.makes', ['id' => 'catalog-makes'])

@stop