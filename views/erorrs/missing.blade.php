@extends('layout')

@section('intro')
	
		@include('common.intro', [
		'intro_title' => 'Izabrani korisnik nema profil',
		'intro_subtitle' => 'Predložite mu da napravi profil, i ohrabrite ga da ostavi cigarete.'  
	])
	
@stop
<h3>Kliknite <a href="#" onclick="history.go(-1);return false;">ovde</a> za povratak na prethodny stranu.</h3>