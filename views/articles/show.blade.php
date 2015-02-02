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


	
		<div class="row">		
			<div class="col-md-7">
				<h1 class="blog-post-title">{{ $article->title }}</h1>
				<p class="blog-post-meta">{{ $article->created_at->diffForHumans() }}</p>
			</div>
			<div class="col-md-5">
				@if($article->getImagePath())
				<img src="{{ url($article->getImagePath()) }}" width="300px" height="250px"/>
				@endif
			</div>
		</div>
	<hr>
	<p>{!! nl2br($article->content) !!}</p>

<hr>

	<p><a href="{{ url('articles') }}">Nazad na listu članaka</a></p>
	






@stop

@section('sidebar')
  
    @include('common.sidebar')
    @include('common.sidebar_forum')
    @include('common.sidebar_fb')
  
@stop