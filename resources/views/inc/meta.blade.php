<?php
    $crumb = '';
    if(isset($bread) && is_array($bread)){
        foreach($bread as $b){
            if(isset($b->title))
                $crumb .= $b->title .'|';
        }
    }
?>


@if(isset($meta_title))
    <title>{{$meta_title}}</title>
@else
    <title>Комтранс Клуб | {{$crumb}}</title>
@endif

@if(!empty($meta_tag_description))
    <meta name="description" content="{!! $meta_tag_description->description !!}">
    @if(!empty($meta_tag_description->tags))
        <meta name="keywords" content="{!! $meta_tag_description->description !!}">
    @endif
@elseif(isset($meta_description))
    <meta name="Description" content="{!! $meta_description !!}">
@endif