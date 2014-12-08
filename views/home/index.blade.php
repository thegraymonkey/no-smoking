@extends('layout')

@section('intro')
	
		@include('common.intro', [
		'intro_title' => trans('home.heading'),
		'intro_subtitle' => 'Mesto za vase misli, osecanja i frustracije...'  
	])
	
@stop

@section('content')

	@if(Auth::check())

	@include('common.messages')
	
<div class="well">

	<form method="POST" action="{{ route('posts.store') }}">

		<input type="hidden" name="_token" value="{{ csrf_token() }}">

		<div class="form-group">
			<label>Vas post</label>
		<textarea  class="form-control" name="content" placeholder="Podelite vase misli"></textarea>
		</div>

		<div class="form-group">
		<input class="btn btn-primary" type="submit" value="Sacuvaj"/>
		</div>

	</form>

</div>
	
	@else
	<p class="alert alert-info">To add post you need to be logged in. Click <a href="{{ url('auth/login') }}">here</a> to login!</p>
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
				<small>by: <a href="#">{{ $post->user->username }}</a> {{ $post->created_at->diffForHumans() }}</small>
				<p>{!! nl2br($post->content) !!}</p>
				@if($post->link_title and $post->link_url)
				<div class="post-meta well">
					<h1 class="small">{{ $post->link_title }}</h1>
					<p>{{ $post->link_description }}</p>
					<a href="{{ $post->link_url }}">link</a>
				</div>
				@endif
			</div>

			<div class="col-md-1">
				@if(Auth::check() and $post->user_id === Auth::user()->id || Auth::user()->isAdmin())
				<form action="{{ route('posts.destroy', [$post->id]) }}" method="post">
					<input type="hidden" name="_method" value="delete">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="submit" value="delete" class="btn btn-xs btn-danger">
				</form>
				@endif
			</div>
			<div class="col-md-1">
				@if(Auth::check() and $post->user_id === Auth::user()->id || Auth::user()->isAdmin())
				<a class="btn btn-xs btn-warning" href="{{ route('posts.edit', [$post->id]) }}">edit</a>
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
