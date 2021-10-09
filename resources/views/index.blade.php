@extends('layouts.app')

@section('content')
<!-- custom css -->
<style>

.space{
  margin-top: 25px;
}
.card img {
  height: auto;
  width: 100%;
  object-fit: cover;
  position: relative;
  overflow: hidden;
}
.btn-group button {
  background-color: black; /* Green background */
  border: 1px solid white; /* Green border */
  color: white; /* White text */
  padding: 10px 24px; /* Some padding */
  cursor: pointer; /* Pointer/hand icon */
}

/* Clear floats (clearfix hack) */
.btn-group:after {
  content: "";
  clear: both;
  display: table;
}

.btn-group button:not(:last-child) {
  border-right: none; /* Prevent double borders */
}

/* Add a background color on hover */
.btn-group button:hover {
  background-color: skyblue;
}

</style>

<div class="container">
<p></p>
<div class="btn-group" style="display: flex;align-items: center;justify-content: center;">
  <button><a href="{{ route('index') }}" style="color:white;">Feed</a></button>
  <button><a href="{{ url('/') }}/chatify" style="color:white;">Chat</a></button>
  <button><a href="{{ route('list') }}" style="color:white;">User</a></button>
</div>
  <div class="space"></div>
      <div class="form-group">
			 @if(request()->segment(1) == 'posts')
			 <form action="?" method="get">
			 @csrf
			 @else
			 <form action="/feeds" method="get">
			 @csrf
			 @endif
			  <div class="input-group input-group-alternative mb-4">
					 <input class="form-control" name="search-post" placeholder="Search me" type="text">
						<div class="input-group-append">
								<span class="input-group-text"><i class="fa fa-search"></i></span>
						</div>
			  </div>
				</form>
		  </div>
    <div class="space"></div>
    <div class="container">
    @forelse($user_feed as $feed)
      <div class="card-deck">
        <div class="card">
          <div class="card-body">
            @if($feed->user->photo == "")
            <img class="img-fluid rounded-circle shadow" style="width: 38px;height: 38px; object-fit:cover;" src="/images/default/user.png" alt="{{ config('app.name', 'Laravel') }}" />
            @else
            <img class="img-fluid rounded-circle shadow" style="width: 38px;height: 38px; object-fit:cover;" src="/images/user/{{ $feed->user->photo }}" alt="{{ Auth::user()->name }}" onerror="this.src='/images/default/user.png'" />
            @endif
            &nbsp;&nbsp;<strong>{{ $feed->user->name }}</strong>
            <div class="space"></div>
            <h5 class="card-title">{{ $feed->title }}</h5>
            <p class="card-text">{{ $feed->content }}</p>
            @if(!$user_feed)
            <p>No photo</p>
            @else
            <img src="/feed/{{ $feed->photo }}" alt="{{ config('app.name', 'Laravel') }}" />
            @endif
          </div>
          <div class="card-footer">
            <i class="fa fa-clock-o" style="font-size:14px">&nbsp;</i>{{ $feed->created_at }}&nbsp;
          </div>
        </div>
      </div>
     <div class="space"></div>
      @empty
      <center>
       <h1>Ooppss... not found :(</h1>
       <p><a href="{{ url('/') }}">Back</p>
      </center>
    @endforelse
    </div>
    <div style="display:flex;justify-content:center;margin-top:25px;">
      {{ $user_feed->links() }}
    </div>
@endsection
@extends('layouts.footer')
