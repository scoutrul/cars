@extends('layouts.main')

@section('body')
	<div class="catalog">
		
		<div class="wide-image"></div>

		<div class="container">

			<div class="catalog_left">
				<div class="sticky">
					@include('inc.search')
					
					@include('inc.specs')
				</div>
			</div>
			
			<div class="catalog_middle">
				
				{{-- bread crumps --}}

				{!! Breadcrumbs::render('catalog', $bread) !!}

				<h1 class="catalog_type">
					@if(isset($bread['spec']))

						{{ $bread['spec']->title }}

					@elseif(isset($nospecs))
						{{--{{ $bread['nospecs']->title }}--}}

					@else
                        @if(isset($model))
                            <img src="/{{$make->icon}}">{{$make->title}} / {{$model->title}}
                        @else
						    {{ 'Каталог' }}
                        @endif
						
					@endif

				</h1>
                {{--@if(isset($model))
                    @if($model->description && !empty($model->description))
                        <div class="model-description">
                            {{$model->description}}
                        </div>
                    @endif
                @endif--}}
				@if(!empty($meta_tag_description))
					<div class="catalog-make-description">{{ $meta_tag_description->description }}</div>
				@elseif(!empty($model->description))
					<div class="catalog-make-description">{{ $model->description }}</div>
				@endif


				@if(isset($models))
                    <div class="catalog-make-info">
                        @if($make->icon)
                            <img src="/{{$make->icon}}">
                        @endif

                        <h1 class="catalog-make-title">{{$make->title}}</h1>
						@if(!empty($meta_tag_description))
							<div class="catalog-make-description">{{ $meta_tag_description->description }}</div>
						@elseif(!empty($make->description))
							<div class="catalog-make-description">{{ $make->description }}</div>
						@endif
                    </div>
					<div class="makes makes--catalog">

						<h2>Модельный ряд:</h2>
					
						<ul>	
						
							@foreach($models as $model)
								<li>
									<span>
										
										@if(isset($nospecs))
                                            @if(isset($type))
                                                <a href="{{ route('catalog-nospecs-model-type',
                                                ['make' => $make->name,
                                                'model' => $model->name,
                                                'type' => $type->name,
                                                ]) }}">
                                                    {{ $model->title }}</a>
                                            @else
                                                <a href="{{ route('catalog-nospecs-model',
                                                ['make' => $make->name,
                                                'model' => $model->name,
                                                ]) }}">
                                                    {{ $model->title }}</a>
                                            @endif
										@else
                                            @if(isset($type))
                                                <a href="{{ route('spec-make-model-type',
                                                ['spec' => $spec->name,
                                                'make' => $make->name,
                                                'type' => $type->name,
                                                'model' => $model->name]) }}">
                                                    {{ $model->title }}</a>
                                            @else
                                                <a href="{{ route('spec-make-model',
                                                ['spec' => $spec->name,
                                                'make' => $make->name,
                                                'model' => $model->name]) }}">
                                                    {{ $model->title }}</a>
                                            @endif
										@endif
						
									</span>
								</li>
						
							@endforeach
							
						</ul>
					
					</div>
				@endif

				@include('inc.found', ['make_id' => $make->id])
				
				<div class="company-popup mfp-hide" id="company-main-popup"></div>

				@include('templates.company-template')

				@include('templates.company-preview-template')

			</div>

			<div class="catalog_right">
				
				<div class="sticky">
					@include('inc.company-signup')
					
					@include('inc.feedback')

                    @include('inc.last_reviews')
				</div>

			</div>

		</div>

	</div>

@stop