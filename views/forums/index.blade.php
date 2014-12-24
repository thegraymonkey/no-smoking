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
	@foreach($forums as $forum)
	<tr>
		<td><a href="{{ route('forums.show', [$forum->id]) }}">{{ $forum->topic }}</a></td>
		<td>{{ $forum->threads->count() }}</td>
		<td>{{ $forum->last_activity ? $forum->last_activity->diffForHumans() : null }}</td>
	</tr>
	@endforeach
</table>

@stop

@section('sidebar')
	
		@include('common.sidebar')
	
@stop