@extends('layout')

@section('intro')
	
		@include('common.intro', [
		'intro_title' => 'Najnoviji postovi korisnika!!!',
		'intro_subtitle' => 'Mesto za vaše misli, osećanja i frustracije...'  
	])
	
@stop

@section('content')

	@if(Auth::check())

	@include('common.messages')
	
<div class="well">

	<form method="POST" action="{{ route('posts.store') }}">

		<input type="hidden" name="_token" value="{{ csrf_token() }}">

		<div class="form-group">
			<label>Vaš post</label>
		<textarea  class="form-control" name="content" placeholder="Podelite vaše misli"></textarea>
		</div>

		<div class="form-group">
		<input class="btn btn-primary" type="submit" value="Sačuvaj"/>
		</div>

	</form>

</div>
	
	@else
	<p class="alert alert-info">Da bi dodali post morate biti prijavljeni. Kliknite <a href="{{ url('auth/login') }}">ovde</a> za prijavu!</p>
	@endif

	@if(isset($posts))
		
		@foreach($posts as $post)
		<div class="row well">
			<div class="col-md-1">
				@if ($post->user->profile && $post->user->profile->avatar)
				<img src="/upload/profile/{{ $post->user->profile->getStatusAvatar() }}"/>
				@else
				<img src="/images/blank.png"/>
				@endif
			</div>
			<div class="col-md-9">
				<small><a href="{{ url('/profile/public/' . $post->user->username ) }}">{{ $post->user->username }}</a> {{ $post->created_at->diffForHumans() }}</small>
				<p>{!! nl2br($post->content) !!}</p>
				@if($post->link_title and $post->link_url)
				<div class="post-meta well">
					<h1 class="small">{{ $post->link_title }}</h1>
					<p>{{ $post->link_description }}</p>
					<a href="{{ $post->link_url }}" target="_blank">link</a>
				</div>
				@endif
			</div>

			<div class="col-md-1">
				@if(Auth::check() and $post->isDeletable(Auth::user()))
				<form action="{{ route('posts.destroy', [$post->id]) }}" method="post">
					<input type="hidden" name="_method" value="delete">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="submit" value="obriši" class="btn btn-xs btn-danger">
				</form>
				@endif
			</div>
			<div class="col-md-1">
				@if(Auth::check() and $post->isEditable(Auth::user()))
				<a class="btn btn-xs btn-warning" href="{{ route('posts.edit', [$post->id]) }}">izmeni</a>
				@endif
			</div>
		</div>



		@endforeach

		{!! $posts->render() !!}
	@endif

@stop



@section('sidebar')
	
		@include('common.sidebar')
	
@stop
