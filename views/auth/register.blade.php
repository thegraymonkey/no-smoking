@extends('layout')

@section('intro')
	
		@include('common.intro', [
		'intro_title' => 'Registrujte se!',
		'intro_subtitle' => 'Registrujte se i postanite deo aktivne zajednice kako bi pomogli i sebi i drugima da ta ružna navika postane prošlost.'  
	])
	
@stop

@section('content')

@include('common.messages')

<div class="row">
  <div class="col-sm-offset-4 col-sm-4">
    <a href="{{ ('social/facebook') }}" class="btn btn-block btn-social btn-facebook">
      <i class="fa fa-facebook"></i> Registruj se sa Fejsbukom
    </a>
  </div>
</div>
<div class="row">
  <div class="col-sm-offset-3 col-sm-6">
    <p>Radi poštovanja anonimnosti vaše korisničko ime neće biti prikazano ali ga možete kreirati na vašem profilu.</p>
  </div>
</div>

  <hr>

<div class="row">
  <div class="col-sm-offset-4 col-sm-4">
    <strong><p>Ili unesi podatke u polja ispod:</p></strong>
  </div>
</div>

<div class="well">
<form class="form-horizontal" role="form" method="POST" action="{{ url('auth/register') }}">
  <div class="form-group">
  	<input type="hidden" name="_token" value="{{ csrf_token() }}">
    <label for="inputEmail3" class="col-sm-3 control-label">E-mejl adresa</label>
    <div class="col-sm-9">
      <input type="email" class="form-control" id="inputEmail3" placeholder="E-mejl adresa" name="email" required autofocus>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">Korisničko ime</label>
    <div class="col-sm-9">
      <input type="username" class="form-control" id="inputPassword3" placeholder="Korisničko ime" name="username" required>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">Šifra</label>
    <div class="col-sm-9">
      <input type="password" class="form-control" id="inputPassword3" placeholder="Šifra" name="password" required>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-3 col-sm-9">
      <button type="submit" class="btn btn-primary">Registruj me</button>
    </div>
  </div>
</form>
</div>

@stop
@section('sidebar')
  
    @include('common.sidebar')
    @include('common.sidebar_forum')
    @include('common.sidebar_fb')
  
@stop

