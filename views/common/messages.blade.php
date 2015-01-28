@if(Session::has('message'))
	<p class="alert alert-success">{{ Session::get('message') }}</p>
@endif

@foreach ($errors->all() as $message)
	<p class="alert alert-danger">{{ $message }}</p>
@endforeach