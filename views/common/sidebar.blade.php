<div>



@if (Auth::check() && Auth::user()->profile && Auth::user()->profile->quit == 1)
	{{-- PROFILE EXISTS --}}
	<div class="well">
	<h2>Statistika za korisnika: {{ Auth::user()->username }}</h2>
	
		<p><strong>Pusio:</strong> <span class="label label-danger">{{ Auth::user()->profile->days_smoking }} dana</span></p>
		<p><strong>Novca spalio:</strong> <span class="label label-danger">{{ Auth::user()->profile->money_burned }} dinara</span></p>
		<p><strong>Vremena protracio:</strong> <span class="label label-danger">{{ round(Auth::user()->profile->time_wasted) }} dana</span></p>
		<p><strong>prestao sa pusenjem pre:</strong> <span class="label label-success">{{ Auth::user()->profile->non_smoke_days }} dana</span></p>
		<p><strong>novca ustedjeno:</strong> <span class="label label-info">{{ Auth::user()->profile->money_saved }} dinara</span></p>
		<p><strong>ne popuseno:</strong> <span class="label label-info">{{ Auth::user()->profile->not_smoked }} cigareta</span></p>
		<p><strong>vreme ustedjeno:</strong> <span class="label label-info">{{ Auth::user()->profile->time_saved }} sati</span></p>
	
		

	</div>

	

@endif



</div>

<div>
	<div class="well" >
	<h2>Najsvezije teme na Forumu</h2>
	<ul>
		@foreach($last_threads as $thread)
			<li><strong><a href="{{ route('threads.show', [$thread->id]) }}">{{ $thread->title }}</a></strong></li>
		@endforeach
	<ul>
	</div>
</div>

<div>
	<div class="well" >
	<h4>Pomozite nam da rastemo!</h4>
	
	<div class="fb-share-button" data-href="http://zabranjenopusenje.net/" data-layout="button"></div>
	</div>
</div>
