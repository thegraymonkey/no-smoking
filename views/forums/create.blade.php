@include('common.messages')

@if(Auth::user()->isAdmin())

<div class="well">
<form method="POST" action="{{ route('forums.store') }}">
		
	<input type="hidden" name="_token" value="{{ csrf_token() }}">	

	<div class="form-group">
		<label>Naslov</label>
		<textarea  class="form-control" name="topic"></textarea>
	</div>

	<div class="form-group">
		<label>Opis</label>
		<textarea  class="form-control" name="description"></textarea>
	</div>

	<div class="form-group">
		<input class="btn btn-primary" type="submit" value="Kreiraj novu sekciju foruma"/>
	</div>

</form>
</div>
@endif