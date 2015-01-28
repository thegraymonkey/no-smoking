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