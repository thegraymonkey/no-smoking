@extends('layout')


@section('intro')
  
    @include('common.intro', [
    'intro_title' => 'Pišite nam!',
    'intro_subtitle' => 'Samo napred, mi uvažavamo vaše mišljenje i želimo da čujemo vaše sugestije.'  
  ])
  
@stop
  

@section('content')

@include('common.messages')

<div class="well">

  <form role="form" action="{{ url('contacts/send') }}" method="POST">

    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    
    <div class="form-group">
      <label for="email">E-mejl adresa</label>
      <input type="email" class="form-control" id="email" placeholder="Email" name="email" required autofocus>
    </div>

    <div class="form-group">
      <label for="subject">Predmet</label>
      <input type="text" class="form-control" id="subject" placeholder="Predmet" name="subject">
    </div>

    <div class="form-group">
      <label for="message">Poruka</label>
      <textarea class="form-control" type="text" id="message" placeholder="Poruka" name="message"></textarea>
    </div>
    
    <div class="form-group">
    <button type="submit" class="btn btn-primary">Pošalji</button>
    </div>

  </form>

</div>

@stop

@section('sidebar')
  
    @include('common.sidebar')
  
@stop