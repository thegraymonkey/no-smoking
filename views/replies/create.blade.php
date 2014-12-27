@if(!Auth::check())

<p class="alert alert-info">Da bi poslali odgovor morate biti prijavljeni. Kliknite <a href="{{ url('auth/login') }}">ovde</a> za prijavu!</p>

@else



<form class="well" method="POST" action="{{ route('replies.store') }}">
	
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input name="thread_id" type="hidden" value="{{ $thread->id}}">

	<div class="form-group">
		<label>Tvoj odgovor</label>
		<textarea  class="form-control" name="content"></textarea>
	</div>

	<div class="form-group">
		<input class="btn btn-primary" type="submit" value="Odgovori"/>
	</div>

</form>

@endif