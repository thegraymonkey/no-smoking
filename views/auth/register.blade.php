@extends('layout')

@section('intro')
	
		@include('common.intro', [
		'intro_title' => 'Registrujte se!',
		'intro_subtitle' => 'Registracija je brza i laka. Neka ona bude vaš prvi korak ka oslobođenju. Registrujte se i postanite deo aktivne zajednice kako bi pomogli i sebi i drugima da ta ružna navika postane prošlost.'  
	])
	
@stop

@section('content')

@include('common.messages')

<strong><p>Registruj se uz pomoć:  <button class="btn btn-primary"><a style="color: white" href="{{ ('social/facebook') }}">Facebook</button></a> -a, ili unesi podatke u formu ispod...  </p></strong>
<p>Radi poštovanja anonimnosti vaše korisničko ime neće biti prikazano ali ga možete kreirati na vašem profilu.</p>
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
  
@stop

