@extends('layout')

@section('intro')
	
		@include('common.intro', [
		'intro_title' => 'Ulogujte se!',
		'intro_subtitle' => 'Da bi koristili sve prednosti sajta i aktivno ucestvovali u vesem putu ka oslobodjenu od opake zavisnosti.'  
	])
	
@stop

@section('content')

@include('common.messages')

<form class="form-horizontal" role="form" method="POST" action="{{ url('auth/login') }}">
  <div class="form-group">
  	<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <label for="inputEmail3" class="col-sm-2 control-label">E-mejl adresa</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="inputEmail3" placeholder="E-mejl adresa" name="email" required autofocus>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Sifra</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword3" placeholder="Sifra" name="password" required>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">Prijavi me</button>
    </div>
  </div>
</form>
@stop
