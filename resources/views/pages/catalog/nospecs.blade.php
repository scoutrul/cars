@extends('pages.catalog.catalog')

@section('catalog')

	<h3 class="catalog_type">Каталог</h3>
    @if(!isset($no_type) || $no_type === false)
	    @include('inc.type', ['id' => 'catalog-types'])
    @endif

	@include('inc.makes.makes', ['id' => 'catalog-makes'])

@stop