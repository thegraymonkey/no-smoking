@extends('layout')

@section('intro')
	
		@include('common.intro', [
		'intro_title' => 'Zabranjeno-pusenje Forum',
		'intro_subtitle' => 'Kreirajte temu u omiljenoj sekciji foruma i zapocnite diskusiju, podelite svoja osecanja i frustracije... Podrzite druge i nadjite podrsku.'  
	])
	
@stop



@section('content')



<table class="table well" >
	<th>sekcija foruma</th>
	<th>broj zapocetih tema:</th>
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