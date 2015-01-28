@extends('layout')

@section('intro')
	
		@include('common.intro', [
		'intro_title' => 'Prijavite se!',
		'intro_subtitle' => 'Da bi koristili sve prednosti sajta i aktivno učestvovali u vašem putu ka oslobođenju od opake zavisnosti.'  
	])
	
@stop

@section('content')

@include('common.messages')




 <a href="{{ ('social/facebook') }}" class="btn btn-block btn-social btn-facebook">
    <i class="fa fa-facebook"></i> Prijavi se pomoću Fejsbuka
  </a>
  
  <hr>

  <strong><p>Ili unesi podatke u polja ispod:</p></strong>



<form class="form-horizontal well" role="form" method="POST" action="{{ url('auth/login') }}">
   	
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

  <div class="form-group">
    <label for="inputEmail3" class="col-sm-3 control-label">E-mejl adresa</label>
    <div class="col-sm-9">
      <input type="email" class="form-control" id="inputEmail3" placeholder="E-mejl adresa" name="email" required autofocus>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">Šifra</label>
    <div class="col-sm-9">
      <input type="password" class="form-control" id="inputPassword3" placeholder="Šifra" name="password" required>
    </div>
  </div>
  <div class="form-group">  
        <label for="checkbox" class="col-sm-offset-3 col-sm-2">Zapamti me!</label>
          <div class="col-sm-7">
          <input type="checkbox" name="remember" value="1">
        </div>
      </div>
  <div class="form-group">
    <div class="col-sm-offset-3 col-sm-9">
      <button type="submit" class="btn btn-primary">Prijavi me</button>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-3 col-sm-9">
      <a  href="#">Zaboravljena šifra?</a>
    </div>
  </div>
</form>

@stop

@section('sidebar')
  
    @include('common.sidebar')
    @include('common.sidebar_forum')
    @include('common.sidebar_fb')
  
@stop
