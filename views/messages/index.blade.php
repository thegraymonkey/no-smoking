@if ($profile)

<table class="table well" >
	@foreach($profile->messages as $message)

	<tr>
		<td width="8%">
			@if ($message->user->profile && $message->user->profile->avatar)
				<img src="/upload/profile/{{ $message->user->profile->getStatusAvatar() }}"/>
			@else
				<img src="/images/blank.png"/>
			@endif
		</td>
		<td width="10%">
			<small><a href="{{ url('/profile/public/' . $message->user->username ) }}">{{ $message->user->username }}</a></small><br />
			<small>{{ $message->created_at->diffForHumans() }}</small>
		</td>
		<td width="60%">{!! nl2br($message->content) !!}</td>
		<td width="8%">
			@if(Auth::check() && $message->isDeletable(Auth::user()))
			<form action="{{ route('messages.destroy', [$message->id]) }}" method="post">
				<input type="hidden" name="profile_id" value="{{ $profile->id }}">
				<input type="hidden" name="profile_id" value="{{ $profile->user->id }}">
				<input type="hidden" name="_method" value="delete">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="submit" value="obrisi" class="btn btn-xs btn-danger">
			</form>
			@endif
		</td>
		
	</tr>

	@endforeach
	</table>

@else

<h2>No profile no messages :)</h2>

@endif

	