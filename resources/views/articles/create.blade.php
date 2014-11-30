@if(!Auth::check())

<p class="alert alert-info">To add an article you need to be logged in. Click <a href="{{ url('auth/login') }}">here</a> to login!</p>

@else

@include('common.messages')

<form method="POST" action="{{ route('articles.store') }}" enctype="multipart/form-data">
		
	<input type="hidden" name="_token" value="{{ csrf_token() }}">	

	<div class="form-group">
		<p><label>Novi clanak</label></p>
		<label>Naslov</label>
		<textarea  class="form-control" name="title"></textarea>
	</div>

	<div class="form-group">	
		<label for="photo">Vasa slika</label>
		<input class="form-control" type="file" name="photo" id="photo">
	</div>

	<div class="form-group">
		<label>Sadrzaj</label>
		<textarea  class="form-control" name="content"></textarea>
	</div>

	<div class="form-group">
		<input class="btn btn-primary" type="submit" value="Objavi clanak"/>
	</div>

</form>

@endif