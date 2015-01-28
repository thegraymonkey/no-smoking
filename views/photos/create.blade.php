@if(!Auth::check())

<p class="alert alert-info">Da bi dodali sliku morate biti prijavljeni. Kliknite <a href="{{ url('auth/login') }}">ovde</a> za prijavu!</p>

@else

@include('common.messages')

<form class="well" method="post" action="{{ url('photos/store') }}" enctype="multipart/form-data">

	<input type="hidden" name="_token" value="{{ csrf_token() }}">
		
	<div class="form-group">	
		<label for="avatar">Vaša slika</label>
		<input class="form-control" type="file" name="image" id="image" >
		<p> ( maksimalana veličina 1024kb, podržani formati: png,jpg,gif... ) </p>
	</div>
	<div class="form-group">
		<label>Opis slike</label>
		<textarea  class="form-control" name="description"></textarea>
	</div>

	<div class="form-group">
		<input class="btn btn-primary" type="submit" value="Snimi sliku"/>
	</div>

</form>

@endif