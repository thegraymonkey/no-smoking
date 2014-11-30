@if(!Auth::check())

<p class="alert alert-info">To add start a topic you need to be logged in. Click <a href="{{ url('auth/login') }}">here</a> to login!</p>

@else

@include('common.messages')

<form method="POST" action="{{ route('threads.store') }}">
		
	<input type="hidden" name="_token" value="{{ csrf_token() }}>">	
	<input name="forum_id" type="hidden" value="{{ $forum->id }}"/>

	<div class="form-group">
		<p><label>Nova tema</label></p>
		<label>Naslov</label>
		<textarea  class="form-control" name="title"></textarea>
	</div>

	<div class="form-group">
		<label>Sadrzaj</label>
		<textarea  class="form-control" name="content"></textarea>
	</div>

	<div class="form-group">
		<input class="btn btn-primary" type="submit" value="Zapocni temu"/>
	</div>

</form>

@endif