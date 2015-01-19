@extends('layout')

@section('intro')
	
		@include('common.intro', [
		'intro_title' => 'Info strana',
		'intro_subtitle' => 'Članci o pušenju, ostavljanju cigareta i štetnosti istih.'  
	])
	
@stop



@section('content')

@if(Auth::check() and Auth::user()->isAdmin())
	<p class="alert alert-info">Ako vidite ovo vi ste Administrator. Kliknite <a href="{{ route('admin.articles.index') }}">ovde</a> da bi obrisali, izmenili ili dodali novi članak!</p>
@endif

@foreach ($articles as $article)
	
		<div style="margin-bottom:50px" class="row blog-post">		
			<div class="col-md-6">
				<h1 class="blog-post-title">{{ $article->title }}</h1>
				<p class="blog-post-meta">{{ $article->created_at->diffForHumans() }}</p>
			</div>
			<div class="col-md-6">
				<img src="{{ url($article->getImagePath()) }}" width="225px" height="200px"/>
			</div>
		</div>
	
	<p>{{ $article->content }}</p>

	
	<hr class="featurette-divider">
	
@endforeach

{!! $articles->render() !!}



@stop

@section('sidebar')
	
		@include('common.sidebar')
	
@stop