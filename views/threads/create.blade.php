@if(!Auth::check())

<p class="alert alert-info">Da bi započeli temu morate biti prijavljeni. Kliknite <a href="{{ url('auth/login') }}">ovde</a> za prijavu!</p>

@else

<div class="well">
<form method="POST" action="{{ route('threads.store') }}">
		
	<input type="hidden" name="_token" value="{{ csrf_token() }}">	
	<input name="forum_id" type="hidden" value="{{ $forum->id }}"/>

	<div class="form-group">
		<p><label>Nova tema</label></p>
		<label>Naslov</label>
		<textarea  class="form-control" name="title"></textarea>
	</div>

	<div class="form-group">
		<label>Sadržaj</label>
		<textarea  class="form-control" name="content"></textarea>
	</div>

	<div class="form-group">
		<input class="btn btn-primary" type="submit" value="Započni temu"/>
	</div>

</form>
</div>
@endif