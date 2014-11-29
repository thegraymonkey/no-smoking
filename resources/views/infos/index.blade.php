@extends('layout')

@section('intro')
	
		@include('common.intro', [
		'intro_title' => 'Info strana',
		'intro_subtitle' => 'Clanci o pusenju, ostavljanu cigareta i stetnosti istih.'  
	])
	
@stop



@section('content')





@stop

@section('sidebar')
	
		@include('common.sidebar')
	
@stop