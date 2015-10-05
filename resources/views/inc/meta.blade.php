<?php
    $crumb = '';
    if(isset($bread)){
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
@if(isset($meta_description))
    <meta name="Description" content="{{$meta_description}}">
@endif