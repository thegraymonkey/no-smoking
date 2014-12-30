@extends('layout')

@section('intro')
	
		@include('common.intro', [
		'intro_title' => 'Admin galerija.',
		'intro_subtitle' => ''  
	])
	
@stop

@section('content')


    <ul style="padding:0; margin:0" class="row">
    	@foreach($photos as $photo)
        <li style="list-style:none; margin: 5px 0" class="col-md-2 col-sm-4">
        	
        	<img src="{{ url($photo->getPath('thumb')) }}"/>
        		<form action="{{ route('admin.photos.destroy', [$photo->id]) }}" method="post">
					<input type="hidden" name="_method" value="delete">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="submit" value="obriši" class="btn btn-xs btn-danger">
				</form>

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