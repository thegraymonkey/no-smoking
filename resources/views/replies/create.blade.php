@if(!Auth::check())

<p class="alert alert-info">To add reply you need to be logged in. Click <a href="{{ url('auth/login') }}">here</a> to login!</p>

@else

@include('common.messages')

<form method="POST" action="{{ route('replies.store') }}">
	
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