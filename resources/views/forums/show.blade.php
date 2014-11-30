@extends('layout')



@section('intro')
	@include('common.intro', [
		'intro_title' => $forum->topic,
		'intro_subtitle' => $forum->description  
	])
@stop





@section('content')



	<table class="table table-hover">
	  	<th>naslov teme</th>
	  	<th>korisnik:</th>
	  	<th>vreme postavljanja:</th>
	  	<th></th>
	  	<th></th>

	@foreach($forum->threads as $thread)
	<tr>
		<td><a href="{{ route('threads.show', [$thread->id]) }}">{{ $thread->title }}</a></td>
		<td><small>{{ $thread->user->username }}</small></td>
		<td><small>{{ $thread->created_at->diffForHumans() }}</small></td>
		<td>@if(Auth::check() and $thread->isDeletable(Auth::user()->id))
			<form action="{{ route('threads.destroy', [$thread->id]) }}" method="post">
				<input type="hidden" name="forum_id" value="{{ $forum->id }}">
				<input type="hidden" name="_method" value="delete">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="submit" value="obrisi" class="btn btn-xs btn-danger">
			</form>
			@endif
		</td>
		<td>@if(Auth::check() and $thread->isEditable(Auth::user()->id))
			<a class="btn btn-xs btn-warning" href="{{ route('threads.edit', [$thread->id]) }}">izmeni</a>
			@endif
		</td>
	</tr>
	@endforeach
</table>

<div class="well">
@include('threads.create')
</div>

@stop

@section('sidebar')
	
		@include('common.sidebar')
	
@stop