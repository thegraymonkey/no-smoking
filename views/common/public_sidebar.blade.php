<div>



@if ($profile && $profile->quit == 1)
	{{-- PROFILE EXISTS --}}
	<div class="well">
	<h2>Statistika za korisnika: {{ $profile->user->username }}</h2>
	
		<p><strong>Pušio:</strong> <span class="label label-danger">{{ $profile->days_smoking }} dana</span></p>
		<p><strong>Novca spalio:</strong> <span class="label label-danger">{{ $profile->money_burned }} dinara</span></p>
		<p><strong>Vremena protraćio:</strong> <span class="label label-danger">{{ round($profile->time_wasted) }} dana</span></p>
		<p><strong>prestao sa pušenjem pre:</strong> <span class="label label-success">{{ $profile->non_smoke_days }} dana</span></p>
		<p><strong>novca ušteđeno:</strong> <span class="label label-info">{{ $profile->money_saved }} dinara</span></p>
		<p><strong>ne popušeno:</strong> <span class="label label-info">{{ $profile->not_smoked }} cigareta</span></p>
		<p><strong>vreme uštedjeno:</strong> <span class="label label-info">{{ $profile->time_saved }} sati</span></p>
	
		

	</div>

	

@endif

</div>

<div>
	<div class="well" >
	<h2>Najsvežije teme na Forumu</h2>
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