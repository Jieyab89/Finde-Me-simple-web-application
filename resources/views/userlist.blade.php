@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="form-group">
   @if(request()->segment(1) == 'lists')
   <form action="?" method="get">
   @csrf
   @else
   <form action="/user-list" method="get">
   @csrf
   @endif
    <div class="input-group input-group-alternative mb-4">
       <input class="form-control" name="search-user" placeholder="Search me" type="text">
        <div class="input-group-append">
            <span class="input-group-text"><i class="fa fa-search"></i></span>
        </div>
    </div>
    </form>
  </div>
 @forelse($user_list as $list)
  <div class="row">
    <div class="col-md-6" style="margin: auto;width: 80%;padding: 10px;">
      <center>
        @if($list->photo == "")
        <img class="img-fluid rounded-shape shadow" style="width: 100px;height: 100px; object-fit:cover;" src="/images/default/user.png" alt="{{ config('app.name', 'Laravel') }}" />
        @else
        <img class="img-fluid rounded-shape shadow" style="width: 100px;height: 100px; object-fit:cover;" src="/images/user/{{ $list->photo }}" alt="{{ Auth::user()->name }}" onerror="this.src='/images/default/user.png'" />
        @endif
      </center>
      <div class="card">
        <div class="card-body">
            <h5 style="text-align:center;">{{ $list->name }}</h5>
            <p>Email : {{ $list->email }}</p>
            <p>Gender : {{ $list->gender }}</p>
            <p>Relationship : {{ $list->relationship }}</p>
            <p>Location : {{ $list->alamat }}</p>
            <p>Phone : {{ $list->phone }}</p>
          <br/>
        </div>
      </div>
    </div>
  </div>
  <p></p>
  @empty
  <center>
   <h1>Ooppss.... not found :(</h1>
   <p><a href="{{ route('list') }}">Back</a></p>
  </center>
  @endforelse
</div>
<div style="display:flex;justify-content:center;margin-top:25px;">
  {{ $user_list->links() }}
</div>
@endsection

@extends('layouts.footer')
