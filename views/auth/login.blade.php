@extends('layout')

@section('intro')
	
		@include('common.intro', [
		'intro_title' => 'Prijavite se!',
		'intro_subtitle' => 'Da bi koristili sve prednosti sajta i aktivno učestvovali u vešem putu ka oslobođenju od opake zavisnosti.'  
	])
	
@stop

@section('content')

@include('common.messages')


<strong><p>Prijavi se <button class="btn btn-primary"><a style="color: white" href="{{ ('social/facebook') }}">Facebook</button></a>  ili:</p></strong>

<div class="well">

<form class="form-horizontal" role="form" method="POST" action="{{ url('auth/login') }}">
   	
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">E-mejl adresa</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="inputEmail3" placeholder="E-mejl adresa" name="email" required autofocus>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Šifra</label>
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
</div>
@stop
