@extends('layout')

@section('intro')
	
		@include('common.intro', [
		'intro_title' => 'Zabranjeno-pušenje Forum',
		'intro_subtitle' => 'Kreirajte temu u omiljenoj sekciji foruma i započnite diskusiju, podelite svoja osećanja i frustracije... Podržite druge i nađite podršku.'  
	])
	
@stop



@section('content')



<table class="table table-striped table-hover" >
	<th>sekcija foruma</th>
	<th>broj započetih tema:</th>
	<th>poslednja aktivnost</th>
	<th></th>
	<th></th>
	@foreach($forums as $forum)
	<tr>
		<td><a href="{{ route('forums.show', [$forum->id]) }}">{{ $forum->topic }}</a></td>
		<td>{{ $forum->threads->count() }}</td>
		<td>{{ $forum->last_activity ? $forum->last_activity->diffForHumans() : null }}</td>
		<td>@if(Auth::check() and Auth::user()->isAdmin())
			<form action="{{ route('forums.destroy', [$forum->id]) }}" method="post">
				<input type="hidden" name="_method" value="delete">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="submit" value="obriši" class="btn btn-xs btn-danger">
			</form>
			@endif
		</td>
		<td>@if(Auth::check() and Auth::user()->isAdmin())
			<a class="btn btn-xs btn-warning" href="{{ route('forums.edit', [$forum->id]) }}">izmeni</a>
			@endif
		</td>
	</tr>
	@endforeach
</table>

@include('forums.create')

@stop

@section('sidebar')
	
		@include('common.sidebar')
	
@stop