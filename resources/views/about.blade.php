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
</div>
@endsection
@extends('layouts.footer')
