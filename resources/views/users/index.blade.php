@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
         <h1 style="text-align:center;">Activity</h1>
         <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">title</th>
                <th scope="col">created</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
            @forelse($total_post as $post)
              <tr>
                <td>{{ $post->title }}</td>
                <td>{{ $post->created_at }}</td>
                <td>
									<div><a class="btn btn-primary btn-sm" href="{{ route('users.post.edit', $post->id) }}"><i class="fa fa-edit"></i></a></div>
								</td>
                <td>
                  <div><a class="btn btn-danger btn-sm" href="{{ route('users.post.hapus', $post->id) }}"><i class="fa fa-trash"></i></a></div>
                </td>
              </tr>
            </tbody>
            @empty
              <p style="text-align:center;color:red;">Opss... not found :(</p>
            @endforelse
          </table>
        </div>
      </div>
    </div>
    {{ $total_post->links() }}
</div>
@endsection
