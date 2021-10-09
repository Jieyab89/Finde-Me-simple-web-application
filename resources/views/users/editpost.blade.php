@extends('layouts.app')

@section('content')

<div class="container">
  <form action="{{ route('users.post.update', $post->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('post')
    <div class="form-group">
      <label for="exampleInputEmail1">Title</label>
      <input type="text" name="title" class="form-control" value="{{ $post->title }}"  placeholder="title">
      @error('title')
			 <span class="invalid-feedback" role="alert">
			   <strong>{{ $message }}</strong>
			 </span>
		  @enderror
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Content</label>
      <textarea type="text" name="content" rows="10" class="form-control" placeholder="{{ $post->content }}"></textarea>
      @error('content')
			 <span class="invalid-feedback" role="alert">
			   <strong>{{ $message }}</strong>
			 </span>
		  @enderror
    </div>
    <div class="form-group">
      <label class="form-label" for="customFile">Upload file</label>
      <input type="file" name="photo" class="form-control" id="customFile" />
      @error('photo')
			 <span class="invalid-feedback" role="alert">
			   <strong>{{ $message }}</strong>
			 </span>
		  @enderror
    </div>
    <p>your image</p>
    <img src="/feed/{{ $post->photo }}" width="100px;" alt="{{ config('app.name', 'Laravel') }}" />
    <p></p>
    <button type="submit" class="btn btn-primary">Update</button>
  </form>
</div>
@endsection
