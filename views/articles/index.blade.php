@extends('layout')

@section('intro')
	
		@include('common.intro', [
		'intro_title' => 'Info strana',
		'intro_subtitle' => 'Clanci o pusenju, ostavljanu cigareta i stetnosti istih.'  
	])
	
@stop



@section('content')

@if(Auth::check() and Auth::user()->isAdmin())
	<p class="alert alert-info">If you see this you are the Administrator. Click <a href="{{ route('admin.articles.index') }}">here</a> to delete, edit or add new article!</p>
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