<div>

@if (Auth::check() && Auth::user()->profile )
	{{-- PROFILE EXISTS --}}
	<div class="well">
	<h2>Statistika za korisnika: {{ Auth::user()->username }}</h2>
	
		<p><strong>Pušio:</strong> <span class="label label-danger">{{ Auth::user()->profile->days_smoking }} dana</span></p>
		<p><strong>Novca spalio:</strong> <span class="label label-danger">{{ Auth::user()->profile->money_burned }} dinara</span></p>
		<p><strong>Vremena protraćio:</strong> <span class="label label-danger">{{ round(Auth::user()->profile->time_wasted) }} dana</span></p>
		@if(Auth::user()->profile->quit == 1)
		<p><strong>prestao sa pušenjem pre:</strong> <span class="label label-success">{{ Auth::user()->profile->non_smoke_days }} dana</span></p>
		<p><strong>novca ušteđeno:</strong> <span class="label label-info">{{ Auth::user()->profile->money_saved }} dinara</span></p>
		<p><strong>ne popušeno:</strong> <span class="label label-info">{{ Auth::user()->profile->not_smoked }} cigareta</span></p>
		<p><strong>vreme uštedjeno:</strong> <span class="label label-info">{{ round(Auth::user()->profile->time_saved, 2) }} dana</span></p>
		@else
		<p class="alert alert-danger"><strong>Mislite o tome...</strong></p>
		@endif
	</div>

	

@endif

</div>


