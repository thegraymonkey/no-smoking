@extends('layout')

@section('intro')
	
		@include('common.intro', [
		'intro_title' => 'Info strana',
		'intro_subtitle' => 'Clanci o pusenju, ostavljanu cigareta i stetnosti istih.'  
	])
	
@stop



@section('content')

@foreach ($articles as $article)
	
	<div class="jumbotron">
		<div class="row">		
			<div class="col-md-6">
				<h1>{{ $article->title }}</h1>
				<p>dodao/la: {{ $article->user->username }} pre {{ $article->created_at->diffForHumans() }}</p>
				<img src="/upload/profile/{{ $article->user->profile->getStatusAvatar() }}" />
			</div>
			<div class="col-md-6">
				<img src="{{ url($article->getImagePath()) }}"/>
			</div>
		</div>
	</div>
	<p>{{ $article->content }}</p>

	<div class="row" style="margin: 10px 0 50px 0">
		<div class="col-md-1">
			<form action="{{ route('admin.articles.destroy', [$article->id]) }}" method="post">
				<input type="hidden" name="_method" value="delete">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="submit" value="delete" class="btn btn-xs btn-danger">
			</form>
		</div>
		<div class="col-md-1">
			<a class="btn btn-xs btn-warning" href="{{ route('admin.articles.edit', [$article->id]) }}">edit</a>
		</div>	
	</div>
	<hr class="featurette-divider">
	
@endforeach

{!! $articles->render() !!}

<div class="well">
@include('admin.articles.create')
</div>

@stop

@section('sidebar')
	
		@include('common.sidebar')
	
@stop