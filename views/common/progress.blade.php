<label>1 dan -- Organizam se oporavlja od unosa Ugljen Monoksida</label>
	@if($profile->non_smoke_one_day < 100)	
	<div class="progress">
	  <div class="progress-bar progress-bar-striped active " role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: {{ $profile->non_smoke_one_day }}%">
	    <span>{{ $profile->non_smoke_one_day }}% </span>
	  </div>
	</div>
	@else
	<div class="progress">
  		<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
    		<span>100% -- Svaka Čast! Uspeli ste!</span>
  		</div>
	</div>
	@endif

	<label>2 dana -- Smanjuje se rizik od srčanog udara </label>
 	@if($profile->non_smoke_two_days < 100)	
	<div class="progress">
	  <div class="progress-bar progress-bar-striped active " role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: {{ $profile->non_smoke_two_days }}%">
	    <span>{{ $profile->non_smoke_two_days }}% </span>
	  </div>
	</div>
	@else
	<div class="progress">
  		<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
    		<span>100% -- Svaka Čast! Uspeli ste!</span>
  		</div>
	</div>
	@endif

	<label>7 dana -- bez nikotina u organizmu</label>
 	@if($profile->non_smoke_seven_days < 100)	
	<div class="progress">
	  <div class="progress-bar progress-bar-striped active " role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: {{ $profile->non_smoke_seven_days }}%">
	    <span>{{ $profile->non_smoke_seven_days }}% </span>
	  </div>
	</div>
	@else
	<div class="progress">
  		<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
    		<span>100% -- Svaka Čast! Uspeli ste!</span>
  		</div>
	</div>
	@endif

	<label>10 dana -- Nestanak fizičke zavisnosti</label>
 	@if($profile->non_smoke_ten_days < 100)	
	<div class="progress">
	  <div class="progress-bar progress-bar-striped active " role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: {{ $profile->non_smoke_ten_days }}%">
	    <span>{{ $profile->non_smoke_ten_days }}% </span>
	  </div>
	</div>
	@else
	<div class="progress">
  		<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
    		<span>100% -- Svaka Čast! Uspeli ste!</span>
  		</div>
	</div>
	@endif

	<label>30 dana -- poboljšanje kondicije i disanja </label>
 	@if($profile->non_smoke_month < 100)	
	<div class="progress">
	  <div class="progress-bar progress-bar-striped active " role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: {{ $profile->non_smoke_month }}%">
	    <span>{{ $profile->non_smoke_month }}% </span>
	  </div>
	</div>
	@else
	<div class="progress">
  		<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
    		<span>100% -- Svaka Čast! Uspeli ste!</span>
  		</div>
	</div>
	@endif

	<label>3 meseca -- pluća otpornija na infekcije </label>
 	@if($profile->non_smoke_three_month < 100)	
	<div class="progress">
	  <div class="progress-bar progress-bar-striped active " role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: {{ $profile->non_smoke_three_month }}%">
	    <span>{{ $profile->non_smoke_three_month }}% </span>
	  </div>
	</div>
	@else
	<div class="progress">
  		<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
    		<span>100% -- Svaka Čast! Uspeli ste!</span>
  		</div>
	</div>
	@endif

	<label>1 godina -- rizik od srčanog udara smanjen za 50%</label>
 	@if($profile->non_smoke_year < 100)	
	<div class="progress">
	  <div class="progress-bar progress-bar-striped active " role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: {{ $profile->non_smoke_year }}%">
	    <span>{{ $profile->non_smoke_year }}% </span>
	  </div>
	</div>
	@else
	<div class="progress">
  		<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
    		<span>100% -- Svaka Čast! Uspeli ste!</span>
  		</div>
	</div>
	@endif