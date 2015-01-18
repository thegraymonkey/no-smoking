@extends('layout')

@section('intro')
	
		@include('common.intro', [
		'intro_title' => 'Prijavite se!',
		'intro_subtitle' => 'Da bi koristili sve prednosti sajta i aktivno učestvovali u vašem putu ka oslobođenju od opake zavisnosti.'  
	])
	
@stop

@section('content')

@include('common.messages')


<strong><p>Prijavi se uz pomoć:  <button class="btn btn-primary"><a style="color: white" href="{{ ('social/facebook') }}">Facebook</button></a> -a, ili unesi podatke u formu ispod...  </p></strong> 




<div class="well">

<form class="form-horizontal" role="form" method="POST" action="{{ url('auth/login') }}">
   	
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
        <label for="checkbox" style="margin-left:230px">Zapamti me!</label>
          <input type="checkbox" name="remember" value="1">
      </div>
  <div class="form-group">
    <div class="col-sm-offset-3 col-sm-9">
      <button type="submit" class="btn btn-primary">Prijavi me</button>
    </div>
  </div>
</form>
</div>
@stop

@section('sidebar')
  
    @include('common.sidebar')
  
@stop
