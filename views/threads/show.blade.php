@extends('layout')

@section('intro')
	@include('common.intro', [
		'intro_title' => link_to_route('forums.show', $thread->forum->topic, [$thread->forum->id]),
		'intro_subtitle' => $thread->forum->description  
	])
@stop

@section('content')
	<div class="page-header">
		<h1>{{ $thread->title }}</h1>
			
			<div class="col-md-1">	
				@if ($thread->user->profile && $thread->user->profile->avatar)
					<img src="/upload/profile/{{ $thread->user->profile->getStatusAvatar() }}"/>
				@else
					<img src="/images/blank.png"/>
				@endif
			</div>
			<div class="col-md-11">
				@if(Auth::check())
				<h1><small>by <a href="{{ url('/profile/public/' . $thread->user->username ) }}">{{ $thread->user->username }}</a> {{ $thread->created_at->diffForHumans() }}</small></h1></p>
				@else
				<h1><small>by {{ $thread->user->username }} {{ $thread->created_at->diffForHumans() }}</small></h1></p>
				@endif
			</div>	
		
		<p>{!! nl2br($thread->content) !!} </p>
		
	</div>
@include('common.messages')
	
	<table class="table well" >
	@foreach($thread->replies as $reply)

	<tr>
		<td width="8%">
			@if ($reply->user->profile && $reply->user->profile->avatar)
				<img src="/upload/profile/{{ $reply->user->profile->getStatusAvatar() }}"/>
			@else
				<img src="/images/blank.png"/>
			@endif
		</td>
		<td width="10%">
			@if(Auth::check())
			<small><a href="{{ url('/profile/public/' . $reply->user->username ) }}">{{ $reply->user->username }}</a></small><br />
			@else
			<small>{{ $reply->user->username }}</small><br />
			@endif
			<small>{{ $reply->created_at->diffForHumans() }}</small>
		</td>
		<td width="60%">{!! nl2br($reply->content) !!}</td>
		<td width="8%">
			@if(Auth::check() and $reply->isDeletable(Auth::user()))
			<form action="{{ route('replies.destroy', [$reply->id]) }}" method="post">
				<input type="hidden" name="thread_id" value="{{ $thread->id }}">
				<input type="hidden" name="_method" value="delete">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="submit" value="obriši" class="btn btn-xs btn-danger">
			</form>
			@endif
		</td>
		<td width="8%">
			@if(Auth::check() and $reply->user_id === Auth::user()->id || Auth::user()->isAdmin())
				<a class="btn btn-xs btn-warning" href="{{ route('replies.edit', [$reply->id]) }}">izmeni</a>
			@endif
		</td>
	</tr>
	@endforeach
	</table>
	
	
	<div>
	@include('replies.create', $thread)
	</div>
	
@stop

@section('sidebar')
  
    @include('common.sidebar')
    @include('common.sidebar_forum')
    @include('common.sidebar_fb')
  
@stop
