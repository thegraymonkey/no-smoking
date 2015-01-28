@extends('layout')

@section('intro')
	
		@include('common.intro', [
		'intro_title' => 'Izmenite svoj post.',
		'intro_subtitle' => 'Greške se dešavaju svima i mozete lako izmeniti svoj post...'  
	])
	
@stop

@section('content')

@include('common.messages')

<form method="POST" action="{{ route('posts.update', [$post->id]) }}">
	
	<div class="form-group">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input type="hidden" name="_method" value="PUT">	

	<label>Izmenite svoj post</label>
	<textarea  class="form-control" name="content">{{ $post->content }}</textarea>
	</div>

	<div class="form-group">
	<input class="btn btn-warning" type="submit" value="Sačuvaj izmene"/>
	</div>

</form>

@stop

@section('sidebar')
  
    @include('common.sidebar')
    @include('common.sidebar_forum')
    @include('common.sidebar_fb')
  
@stop