@extends('layouts.app')

@section('content')
<div class="container">
  <form action="{{ route('upload.post') }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('post')
    <div class="form-group">
      <label for="exampleInputEmail1">Title</label>
      <input type="text" name="title" class="form-control" aria-describedby="emailHelp" placeholder="title">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Content</label>
      <textarea type="text" name="content" rows="10" class="form-control" aria-describedby="emailHelp" placeholder="content"></textarea>
    </div>
    <div class="form-group">
      <label class="form-label" for="customFile">Upload file</label>
      <input type="file" name="photo" class="form-control" id="customFile" />
    </div>
    <button type="submit" class="btn btn-primary">Post</button>
  </form>
</div>
@endsection
