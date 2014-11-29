<div>

@if (Auth::check() && Auth::user()->profile)
	{{-- PROFILE EXISTS --}}
	<div class="well">
	<h2>Statistika za korisnika: {{ Auth::user()->username }}</h2>
	
		<p><strong>prestao sa pusenjem pre:</strong> <span class="badge">{{ Auth::user()->profile->non_smoke_days }} dana</span></p>
		<p><strong>novca ustedjeno:</strong> <span class="badge">{{ Auth::user()->profile->money_saved }} dinara</span></p>
		<p><strong>ne popuseno:</strong> <span class="badge">{{ Auth::user()->profile->not_smoked }} cigareta</span></p>
		<p><strong>vreme ustedjeno:</strong> <span class="badge">{{ Auth::user()->profile->time_saved }} minuta</span></p>
	</div>
@endif
</div>

<div>
	<div class="well">
	<h2>Najsvezije teme na Forumu</h2>
	<ul>
		@foreach($last_threads as $thread)
			<li><strong><a href="{{ route('threads.show', [$thread->id]) }}">{{ $thread->title }}</a></strong></li>
		@endforeach
	<ul>
	</div>
</div>