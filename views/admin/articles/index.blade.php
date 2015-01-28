@extends('layout')

@section('intro')
	
		@include('common.intro', [
		'intro_title' => 'Admin Info',
		'intro_subtitle' => 'Obriši, ispravi i dodaj novi članak.'  
	])
	
@stop



@section('content')


@include('admin.articles.create')




@foreach ($articles as $article)
	
	
		<div class="row">		
			<div class="col-md-7">
				<h1>{{ $article->title }}</h1>		
			</div>
			<div class="col-md-5">
				<img src="{{ url($article->getImagePath()) }}" width="300px" height="250px"/>
			</div>
		</div>
	<hr>
	<p>{!! nl2br($article->content) !!}</p>

	<div class="row" style="margin: 10px 0 50px 0">
		<div class="col-md-1">
			<form action="{{ route('admin.articles.destroy', [$article->id]) }}" method="post">
				<input type="hidden" name="_method" value="delete">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="submit" value="obriši" class="btn btn-xs btn-danger">
			</form>
		</div>
		<div class="col-md-1">
			<a class="btn btn-xs btn-warning" href="{{ route('admin.articles.edit', [$article->id]) }}">izmeni</a>
		</div>	
	</div>
	
	<hr>
	
@endforeach

{!! $articles->render() !!}



@stop

@section('sidebar')
  
    @include('common.sidebar')
    @include('common.sidebar_forum')
    @include('common.sidebar_fb')
  
@stop