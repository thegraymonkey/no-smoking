@if(Session::has('message'))
	<p class="alert alert-warning">{{ Session::get('message') }}</p>
@endif

@foreach ($errors->all() as $message)
	<p class="alert alert-danger">{{ $message }}</p>
@endforeach