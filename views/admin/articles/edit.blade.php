@extends('layout')

@section('intro')
	
		@include('common.intro', [
		'intro_title' => 'Admin članci',
		'intro_subtitle' => ''  
	])
	
@stop


@section('content')

@include('common.messages')

<form method="POST" action="{{ route('admin.articles.update', [$article->id]) }}">
	
	<input type="hidden" name="user_id" value="{{ $article->user->id }}">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input type="hidden" name="_method" value="PUT">

	

	<div class="form-group">	
		<label>Tema</label>
		<textarea  class="form-control" name="title">{{ $article->title }}</textarea>
	</div>

	<div class="form-group">	
		<label for="avatar">Vaša slika</label>
		<input class="form-control" type="file" name="image" id="image">
	</div>

	<div class="form-group">	
		<label>Sadržaj</label>
		<textarea  class="form-control" name="content">{{ $article->content }}</textarea>
	</div>

	<div class="form-group">	
		<input class="btn btn-warning" type="submit" value="Sačuvaj"/>
	</div>

</form>

@stop

@section('sidebar')
  
    @include('common.sidebar')
  
@stop