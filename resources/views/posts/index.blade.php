@extends('main')

@section('title', 'Index')

@section('content')

  <div class="row">
    <div class="col-md-8">
      <h1>All Posts</h1>
    </div>
    <div class="col-md-4">
      <a href="{{ route('posts.create') }}" class="btn btn-primary btn-h1-spacing pull-right">Create New Post</a>
    </div>
    <div class="col-md-12">
      <hr />
    </div>
  </div>

  <div class="row">

    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Title</th>
          <th>Body</th>
          <th>Created At</th>
          <th></th>
        </tr>
      </thead>
      <tbody>

        @foreach($posts as $post)
        <tr>
          <td>{{ $post->id }}</td>
          <td>{{ $post->title }}</td>
          <td>{{ substr(strip_tags($post->body), 0, 50) }}{{ strlen(strip_tags($post->body)) > 50 ? '...' : '' }}</td>
          <td>{{ $post->created_at }}</td>
          <td>
            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-default btn-sm">View</a>
            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-default btn-sm">Edit</a>
          </td>
        </tr>
        @endforeach

      </tbody>
    </table>

    <div class="text-center">
        {!! $posts->links() !!}
    </div>

  </div>

@endsection
