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
	
	<div class="jumbotron" style="border: 1px solid #e5e5e5;">
		<div class="row">		
			<div class="col-md-6">
				<h2>{{ $article->title }}</h2>
				<p>dodao/la: {{ $article->user->username }} pre {{ $article->created_at->diffForHumans() }}</p>
				@if($article->user->profile)
				<img src="/upload/profile/{{ $article->user->profile->getStatusAvatar() }}" />
				@else
				<img src="/images/blank.png"/>
				@endif
			</div>
			<div class="col-md-6">
				<img src="{{ url($article->getImagePath()) }}"/>
			</div>
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