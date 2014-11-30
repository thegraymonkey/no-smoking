@extends('layout')

@section('intro')
	
		@include('common.intro', [
		'intro_title' => 'Galerija.',
		'intro_subtitle' => 'Dodajte motivacione ili obrazovne slike i svoj komentar koje svi mogu da vide.'  
	])
	
@stop

@section('content')

<div class="well">
@include('photos.create')
</div>

    <ul style="padding:0; margin:0" class="row">
    	@foreach($photos as $photo)
        <li style="list-style:none; margin: 5px 0" class="col-md-2 col-sm-4">
        	<a class="fancybox" rel="group1" title="{{ $photo->description }}" href="{{ url($photo->getPath('large')) }}">
        		<img src="{{ url($photo->getPath('thumb')) }}"/>
        	</a>
        </li>
        @endforeach
    </ul>

{!! $photos->render() !!}

@stop


@section('sidebar')

	@include('common.sidebar')

@stop

@section('bottom_js')
	<script type="text/javascript" src="{{ asset('assets/fancybox/source/jquery.fancybox.js') }}"></script>
	<script type="text/javascript">
		$(".fancybox").fancybox();
	</script>
@stop


@section('top_css')
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/fancybox/source/jquery.fancybox.css') }}">
@stop