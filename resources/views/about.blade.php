@extends('layouts.app')

@section('content')
<!-- custom css -->
<style>

.space{
  margin-top: 25px;
}
.card img {
  height: 280px;
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
<h1 style="text-align: center;">What is {{ config('app.name', 'Laravel') }} ?</h1><br>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
<p></p>
<div class="btn-group" style="display: flex;align-items: center;justify-content: center;">
  <button><a href="" style="color:white;">Feed</a></button>
  <button><a href="" style="color:white;">Chat</a></button>
  <button><a href="" style="color:white;">User</a></button>
</div>
  <div class="space"></div>
   <div class="input-group input-group-alternative mb-4">
		 <input class="form-control" name="search" placeholder="What are you looking for ? " type="text">
			<div class="input-group-append">
			 <span class="input-group-text"><i class="fa fa-search"></i></span>
			</div>
	 </div>
    <div class="space"></div>
    <div class="container">
      <div class="card-deck">
        <div class="card">
         <img class="card-img-top" src="" alt="">
          <div class="card-body">
            <h5 class="card-title"></h5>
            <p class="card-text"></p>
          </div>
          <div class="card-footer">
            <p class="card-text"><i class="fa fa-user" style="font-size:15px">&nbsp; </i></p>
            <i class="fa fa-clock-o" style="font-size:14px">&nbsp;</i>&nbsp;
          </div>
        </div>
      </div>
    </div>
    <div style="display:flex;justify-content:center;margin-top:25px;">
    </div>
@endsection
@extends('layouts.footer')
