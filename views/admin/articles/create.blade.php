@if(Auth::check() and Auth::user()->isAdmin())

@include('common.messages')

<form class="well" method="POST" action="{{ route('admin.articles.store') }}" enctype="multipart/form-data">
		
	<input type="hidden" name="_token" value="{{ csrf_token() }}">	

	<div class="form-group">
		<p><label>Novi članak</label></p>
		<label>Naslov</label>
		<textarea  class="form-control" name="title"></textarea>
	</div>

	<div class="form-group">	
		<label for="photo">Vaša slika</label>
		<input class="form-control" type="file" name="photo" id="photo">
	</div>

	<div class="form-group">
		<label>Sadržaj</label>
		<textarea  class="form-control" name="content"></textarea>
	</div>

	<div class="form-group">
		<input class="btn btn-primary" type="submit" value="Objavi članak"/>
	</div>

</form>

@endif