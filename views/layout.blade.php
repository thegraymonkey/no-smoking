<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   	<meta property="og:title" content="Zabranjeno pušenje" />
	<meta property="og:type" content="website"/>
	<meta property="og:description" content="Pušite i dalje? Prestali ste da pušite ili želite da prestanete? Treba vam podrška i savet? Na pravom ste mestu!"/>
	<meta property="og:image" content="http://zabranjenopusenje.net/images/no-smoking1.png"/>
    <link rel="icon" href="../../favicon.ico">

    <title>Zabranjeno Pušenje</title>

    <!-- Bootstrap core CSS -->
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="/bootstrap/css/sticky-footer-navbar.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    
    <link href="/bootstrap/css/carousel.css" rel="stylesheet">
    
    <link href="/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="/bootstrap/css/bootstrap-social.css" rel="stylesheet" >
    @yield('top_css')





    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=1534568586790684&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

  </head>
<!-- NAVBAR
================================================== -->
  
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">    
		<div class="container" >
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
		            <span class="sr-only">Toggle navigation</span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
          		</button>

				<a class="navbar-brand" href="{{ url('/')}}"><img alt="Zabranjeno Pusenje" src="/images/no-smoking1.png" width="30px" height="30px"></a>
				
			</div>
			<div id="navbar" class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li @if($current_page === 'home.index')class="active"@endif><a href="{{ url('feed') }}">Početna</a></li>            
					<li @if($current_page === 'articles.index')class="active"@endif><a href="{{ url('articles') }}">Info</a></li>            
					<li @if($current_page === 'photos.index')class="active"@endif><a href="{{ url('photos/index') }}">Galerija</a></li>
					<li @if($current_page === 'forums.index')class="active"@endif><a href="{{ url('forums')}}">Forum</a></li>
					<li @if($current_page === 'contacts.show')class="active"@endif><a href="{{ url('contacts/show') }}">Kontakt</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right"> 
					@if(Auth::check() and Auth::user()->isAdmin()) 
					<li @if($current_page === 'users.index')class="active"@endif><a href="{{ url('users/index') }}">Korisnici</a></li> 
					@endif       
					@if(Auth::check())
					<li @if($current_page === 'profiles.index')class="active"@endif><a href="{{ url('profile/show') }}">Profil</a></li>
					<li><a href="{{ url('auth/logout') }}">Odjava</a></li>
					@else
					<li @if($current_page === 'auth.login')class="active"@endif><a href="{{ url('auth/login') }}">Prijava</a></li>
					<li @if($current_page === 'auth.register')class="active"@endif><a href="{{ url('auth/register') }}">Registracija</a></li>
					@endif
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>

		

	@yield('welcome')

	
  		
	@yield('intro')
	
		
	
	</div>

	<div class="container">
		<div class="row">
			<div class="main col-md-9">
				@yield('content')
			</div>


			
			<div class="sidebar col-md-3">
				@yield('sidebar')
				
			</div>
		</div>
	</div>


	

	<footer class="footer">
    	<div class="container">
      	  		
        		<h4 class="text-muted">Powered by <a href="http://thegraymonkey.com/">TheGrayMonkey</a></h4>
					  
    	</div>
    </footer>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="/bootstrap/js/bootstrap.min.js"></script>
    <script src="/bootstrap/js/docs.min.js"></script>
	@yield('bottom_js')
</body>
</html>