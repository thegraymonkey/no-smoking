@if(!Auth::check())

<p class="alert alert-info">Da bi ostavili poruku morate biti ulogovani. Kliknite <a href="{{ url('auth/login') }}">ovde</a> za ulazak!</p>

@else



<form method="POST" action="{{ route('messages.store') }}">
	
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input name="profile_id" type="hidden" value="{{ $profile->id }}">

	<div class="form-group">
		<label>Ostavi poruku</label>
		<textarea  class="form-control" name="content"></textarea>
	</div>

	<div class="form-group">
		<input class="btn btn-primary" type="submit" value="Posalji"/>
	</div>

</form>

@endif