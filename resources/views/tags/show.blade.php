@extends('main')

@section('title', "$tag->name Tag")

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <h2>{{ $tag->name }} Tag <small>{{ $tag->posts()->count() }} Posts</small></h2>
      </div>
      {{ Form::open(['route' => ['tags.destroy', $tag->id], 'method' => 'DELETE', 'class' => 'col-md-2']) }}
      {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) }}
      {{ Form::close() }}
      <div class="col-md-2">
        <a class="btn btn-primary btn-block" href="{{ route('tags.edit', $tag->id) }}">Edit</a>
      </div>
    </div>
    <hr />
    <div class="row">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Post Title</th>
            <th>Tags</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($tag->posts as $post)
            <tr>
              <td>{{ $post->id }}</td>
              <td>{{ $post->title }}</td>
              <td>
                @foreach ($post->tags as $tag)
                  {{ $tag->name }}
                @endforeach
              </td>
              <td><a class="btn btn-default btn-xs" href="{{ route('posts.show', $post->id) }}">view</a></td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection
