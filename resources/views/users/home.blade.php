@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
          <center>
           @if(Auth::user()->photo == "")
             <img class="img-fluid rounded-circle shadow" style="margin-top: 25px;text-align:center;width: 100px;height: 100px; object-fit:cover;" src="/images/default/user.png" alt="{{ config('app.name', 'Laravel') }}" />
             @else
             <img class="img-fluid rounded-circle shadow" style="margin-top: 25px;text-align:center;width: 100px;height: 100px; object-fit:cover;" src="/images/user/{{ Auth::user()->photo }}" alt="{{ Auth::user()->name }}" onerror="this.src='/images/default/user.png'" />
             @endif
            </center>

            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
            <h2 style="margin-top: 25px;text-align:center;">{{ Str::limit(Auth::user()->name, 15) }}</h2>
            <li class="list-group-item"><a class="text-default btn-block" href=""><i class='fa fa-dollar'></i>&nbsp; <b>Buy VIP</b></a></li>
            <li class="list-group-item"><a class="text-default btn-block" href="{{ url('/') }}/chatify" target="_blank" ><i class="fa fa-comments"></i>&nbsp;<b>Chat</b></a></li>
            <li class="list-group-item"><a class="text-default btn-block" href="{{ route('activity') }}" target="_blank" ><i class="fa fa-bar-chart"></i>&nbsp;<b>Activity</b></a></li>
            <li class="list-group-item"><a class="text-default btn-block" href="{{ route('post') }}"><i class="fa fa-pencil"></i>&nbsp;<b>Posting</b></a></li>
            <li class="list-group-item"><a class="text-default btn-block {{ (request()->segment(2) == 'users.profile') ? 'active' : '' }}" href="{{ route('users.profiles') }}"><i class="fa fa-user"></i>&nbsp;<b>Profiles</b></a></li>
            <li class="list-group-item"><a class="text-default btn-block" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i>&nbsp;<b>Logout</b></a></li>
          </div>
        </div>
    </div>
</div>
@endsection
