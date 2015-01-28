@extends('layout')



@section('intro')
	@include('common.intro', [
		'intro_title' => $forum->topic,
		'intro_subtitle' => $forum->description  
	])
@stop





@section('content')

@include('common.messages')


	<table class="table table-hover table-striped">
	  	<th>naslov teme</th>
	  	<th>korisnik:</th>
	  	<th>postavljeno:</th>
	  	<th>broj komentara:</th>
	  	<th>broj pregleda:</th>
	  	<th></th>
	  	<th></th>
	@foreach($forum->threads as $thread)
	<tr>
		<td><a href="{{ route('threads.show', [$thread->id]) }}">{{ $thread->title }}</a></td>
		<td><small>{{ $thread->user->username }}</small></td>
		<td><small>{{ $thread->created_at->diffForHumans() }}</small></td>
		<td><small>{{ $thread->replies->count() }}</small></td>
		<td><small></small></td>
		<td>@if(Auth::check() and $thread->isDeletable(Auth::user()))
			<form action="{{ route('threads.destroy', [$thread->id]) }}" method="post">
				<input type="hidden" name="forum_id" value="{{ $forum->id }}">
				<input type="hidden" name="_method" value="delete">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="submit" value="obriši" class="btn btn-xs btn-danger">
			</form>
			@endif
		</td>
		<td>@if(Auth::check() and $thread->isEditable(Auth::user()))
			<a class="btn btn-xs btn-warning" href="{{ route('threads.edit', [$thread->id]) }}">izmeni</a>
			@endif
		</td>
	</tr>
	@endforeach
</table>


@include('threads.create')


@stop

@section('sidebar')
  
    @include('common.sidebar')
    @include('common.sidebar_forum')
    @include('common.sidebar_fb')
  
@stop