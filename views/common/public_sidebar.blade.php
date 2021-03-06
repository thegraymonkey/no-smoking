<div>



@if ($profile)
	{{-- PROFILE EXISTS --}}
	<div class="well">
	<h3>Statistika za korisnika: {{ $profile->user->username }}</h3>
	
		<p><strong>Pušio:</strong> <span class="label label-danger">{{ $profile->days_smoking }} dana</span></p>
		<p><strong>Novca spalio:</strong> <span class="label label-danger">{{ $profile->money_burned }} dinara</span></p>		
		<p><strong>Vremena protraćio:</strong> <span class="label label-danger">{{ round($profile->time_wasted) }} dana</span></p>
		@if($profile->quit == 1)
		<p><strong>prestao sa pušenjem pre:</strong> <span class="label label-success">{{ $profile->non_smoke_days }} dana</span></p>
		<p><strong>novca ušteđeno:</strong> <span class="label label-info">{{ $profile->money_saved }} dinara</span></p>
		<p><strong>ne popušeno:</strong> <span class="label label-info">{{ $profile->not_smoked }} cigareta</span></p>
		<p><strong>vreme uštedjeno:</strong> <span class="label label-info">{{ round($profile->time_saved,2) }} dana</span></p>
		@else
		<p class="alert alert-danger"><strong>Posavetujete korisnika {{ $profile->user->username }} da prestane sa pušenjem</strong></p>
		@endif
		

	</div>

	

@endif

</div>

