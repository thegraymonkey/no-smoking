@extends('layout')

  @section('welcome')


    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img src="/images/welcome1.jpg" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Dobrodosli.</h1>
              <p>Pušite i dalje? Prestali ste da pušite ili želite da prestanete? Treba vam podrška i savet? .</p>
              <p>Na pravom ste mestu!</p>
              <p><a class="btn btn-lg btn-primary" href="{{ url('auth/register') }}" role="button">Registruj se</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="/images/welcome2.jpg" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Pušenje ubija!</h1>
              <p>Sve informacije o tome koliko je pušenje štetno i o tome da ne postoji ni jedan jedini razlog da ikada više zapalite cigaretu.</p>
              <p><a class="btn btn-lg btn-primary" href="{{ url('articles') }}" role="button">Saznaj više</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="/images/welcome3.png" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Forum.</h1>
              <p>Razne diskusije koje za temu imaju pušenje i ostavljanje cigareta. Pročitajte savete, iskustva i podelite svoju borbu sa drugima.</p>
              <p><a class="btn btn-lg btn-primary" href="{{ url('forums') }}" role="button">Prelistaj forum</a></p>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div><!-- /.carousel -->


    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

      <!-- Three columns of text below the carousel -->
      <div class="row">
        <div class="col-lg-4">
          <img class="img-circle" src="{{ $last_photo->getPath() }}" alt="Generic placeholder image" style="width: 140px; height: 140px;">
          <h2>Galerija</h2>
          <p>Poslednja dodata slika u galeriji. </br> Dodajte motivacione ili obrazovne slike i svoj komentar koje svi mogu da vide.</p>
          <p><a class="btn btn-default" href="{{ url('photos/index') }}" role="button">Pogledaj &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="/images/heading2.jpg" alt="Generic placeholder image" style="width: 140px; height: 140px;">
          <h2>Poslednja tema na forumu</h2>
          <p><strong>{{ $last_thread->title }}</strong></br>{{ \Illuminate\Support\Str::limit($last_thread->content, 100) }}</p>
          <p><a class="btn btn-default" href="{{ route('threads.show', [$last_thread->id]) }}" role="button">Pročitaj &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="/images/heading3.jpg" alt="Generic placeholder image" style="width: 140px; height: 140px;">
          <h2>Kontakt</h2>
          <p>Samo napred, mi uvažavamo vaše mišljenje i želimo da čujemo vaše sugestije. </br> Brzo i lako.</p>
          <p><a class="btn btn-default" href="{{ url('contacts/show') }}" role="button">Piši nam &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->


      <!-- START THE FEATURETTES -->

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">Kampanja Ministarstva Zdravlja. <span class="text-muted"></span></h2>
          <p class="lead">Da li ministarstvo zdravlja i nadležne institucije ulažu dovoljno u edukaciju mladih i prevenciju pušenja? Osim nekoliko mlakih kampanja putem "reklama" i televizije ja druga ulaganja ne videh. Ako se ne slažete samnom slobodno otvorite temu na forumu. <br><a href="http://www.zdravlje.gov.rs/index.php" target="blank">Ministarstvo zdravlja Republike Srbije</a></p>
        </div>
        <div class="col-md-5">
          <img class="featurette-image img-responsive" src="/images/feauture1.jpg" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-5">
          <img style="margin-top:60px" class="featurette-image img-responsive" src="/images/feauture2.jpg" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
        </div>
        <div class="col-md-7">
          <h2 class="featurette-heading">Da, pušenje je ozbiljan problem!</h2>
          <p class="lead">O tome koliko je pušenje štetno i koliko je teško prestati najbolje govori činjenica da je <a href="http://www.drajzerova.org.rs/" target="blank">Specijalna bolnica za bolesti zavisnosti</a> u Drajzerovoj u svoj program uvrstila i <strong> Odvikavanje od pušenja</strong>!</p>
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">Moramo sami da preduzmemo nešto!</h2>
          <p class="lead">Ne može niko umesto nas da prestane!</p>
        </div>
        <div class="col-md-5">
          <img class="featurette-image img-responsive" src="/images/feauture3.jpg" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
        </div>
      </div>

      

      <!-- /END THE FEATURETTES -->

      </div>
       <!-- /.container -->

      @stop
      
      