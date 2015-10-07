@extends('pages.catalog.catalog')

@section('catalog')

	<h1 class="catalog_type">{{ $spec->title }}</h1>
    @if(!isset($no_type) || $no_type === false)
	    @include('inc.type', ['id' => 'catalog-types'])
    @endif

	@include('inc.makes.makes', ['id' => 'catalog-specmakes'])

@stop