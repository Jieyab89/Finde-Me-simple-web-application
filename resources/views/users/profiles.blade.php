@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
          <center>
           @if(Auth::user()->photo == "")
             <img class="img-fluid rounded-circle shadow" style="margin-top: 25px;width: 100px;height: 100px; object-fit:cover;" src="/images/default/user.png" alt="{{ config('app.name', 'Laravel') }}" />
             @else
             <img class="img-fluid rounded-circle shadow" style="margin-top: 25px;width: 100px;height: 100px; object-fit:cover;" src="/images/user/{{ Auth::user()->photo }}" alt="{{ Auth::user()->name }}" onerror="this.src='/images/default/user.png'" />
             @endif
            </center>

            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
            <p></p>
            <div class="card">
              <div class="card-body">
                <div class="container">
                  <form action="{{ route('users.update') }}" method="post" enctype="multipart/form-data">
                      @csrf
					  @method('put')

                      <div class="form-group row">
                          <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                          <div class="col-md-6">
                              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                              @error('name')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                          <div class="col-md-6">
                              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

                              @error('email')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                          <div class="col-md-6">
                            <input type="radio" id="gender" name="gender" value="Pria">
                              <label for="pria">Pria</label><br>
                              <input type="radio" id="gender" name="gender" value="Wanita">
                              <label for="wanita">Wanita</label><br>
                              @error('gender')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Relationship') }}</label>
                          <div class="col-md-6">
                            <input type="radio" id="relationship" name="relationship" value="Married">
                              <label for="pria">Married</label><br>
                              <input type="radio" id="relationship" name="relationship" value="Single">
                              <label for="wanita">Single</label><br>
                              @error('gender')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>

                          <div class="col-md-6">
                              <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ $user->alamat }}" required autocomplete="alamat">

                              @error('alamat')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                          <div class="col-md-6">
                              <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $user->phone }}" required autocomplete="phone">

                              @error('phone')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Photo') }}</label>

                          <div class="col-md-6">
                            <input type="file" name="photo" class="form-control" id="customFile" />
                          </div>
                      </div>

                      <div class="form-group row mb-0">
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  {{ __('Update profile') }}
                              </button>
                          </div>
                      </div>
                  </form>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
