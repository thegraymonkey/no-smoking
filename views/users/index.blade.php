@extends('layout')

@section('intro')
	
		@include('common.intro', [
		'intro_title' => 'Lista korisnika',
		'intro_subtitle' => 'U otvorenoj zajednici kao što je ova uvek ima korisnika koji krše pravila.'  
	])
	
@stop



@section('content')



<table class="table table-striped table-hover" >
	<th>Id</th>
	<th>Korisničko ime</th>
	<th>Profilna slika</th>
	<th>E-mejl</th>
	<th></th>
	
	@foreach($users as $user)
	<tr>
		<td>{{ $user->id }}</td>
		<td>{{ $user->username }}</td>
		@if($user->profile)
		<td>{{ $user->profile->getStatusAvatar }}</td>
		@endif
		<td>{{ $user->email }}</td>
		<td>@if(Auth::check() and Auth::user()->isAdmin())
			<form action="{{ route('users.destroy', [$user->id]) }}" method="post">
				<input type="hidden" name="_method" value="delete">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="submit" value="obriši korisnika" class="btn btn-xs btn-danger">
			</form>
			@endif
		</td>
	</tr>
	@endforeach
</table>



@stop

@section('sidebar')
	
		@include('common.sidebar')
	
@stop