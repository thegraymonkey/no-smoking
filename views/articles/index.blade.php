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
	
		<div class="row">		
			<div class="col-md-9">
				<h4 class="blog-post-title">{{ $article->title }}</h4>
				<p class="blog-post-meta">{{ $article->created_at->diffForHumans() }}</p>
			</div>
			<div class="col-md-3">
				@if($article->getImagePath())
				<img src="{{ url($article->getImagePath()) }}" width="150px" height="125px"/>
				@endif
			</div>
		</div>
	
	<p>{!!  \Illuminate\Support\Str::limit($article->content, 200) !!}</p>
	<p><a href="{{ route('articles.show', [$article->id]) }}">Pročitaj ceo članak</a></p>

	
	<hr>
	
@endforeach

{!! $articles->render() !!}



@stop

@section('sidebar')
  
    @include('common.sidebar')
    @include('common.sidebar_forum')
    @include('common.sidebar_fb')
  
@stop