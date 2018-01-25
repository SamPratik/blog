@extends('main')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endpush

@section('title', "$post->title")

@section('content')
  <div class="row">
    <div class="col-md-8">
      <h1>{{$post->title}}</h1>
      <img src="{{ asset('images/' . $post->image) }}" alt="post image" />
      <p class="lead">{!! $post->body !!}</p>
      <hr />
      <p>
        @foreach ($post->tags as $tag)
          <span class="label label-primary">{{ $tag->name }}</span>
        @endforeach
      </p>

      <div class="row">
        <h3>Comments {{ $post->comments()->count() }} total</h3>

        <table class="table table-striped">
          <thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Comment</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($post->comments as $comment)
              <tr>
                <td>{{ $comment->name }}</td>
                <td>{{ $comment->email }}</td>
                <td>{{ $comment->comment }}</td>
                <td style="width:100px;">
                  <a href="{{ route('comments.delete', $comment->id) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                  <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

    <div class="col-md-4">
      <div class="well">
        <div>
          <dl class="dl-horizontal">
            <label>Created At: </label>
            <p>{{ date('jS F, Y h:ia', strtotime($post->created_at)) }}</p>
          </dl>
        </div>
        <div>
            <label>Updated At: </label>
            <p>{{ date('jS F, Y h:ia', strtotime($post->updated_at)) }}</p>
        </div>
        <div>
            <label>Category: </label>
            <p>{{ $post->category->name }}</p>
        </div>
        <div>
          <dl class="dl-horizontal">
            <label>Slug: </label>
            <p><a href="{{ route('blog.single', ['slug' => $post->slug]) }}">{{ route('blog.single', ['slug' => $post->slug]) }}</a></p>
          </dl>
        </div>

        <div class="row">
          <div class="col-md-6">
            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-block">Edit</a>
          </div>
          <div class="col-md-6">
            {{-- <a href="{{ route('posts.destroy', $post->id) }}" class="btn btn-danger btn-block">Delete</a> --}}
            {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}
            {!! Form::close() !!}
          </div>
        </div><br />

        <div class="row">
            <div class="col-md-12">
                {{ Html::linkRoute('posts.index', '<< See all posts', [], ['class' => 'btn btn-default btn-block']) }}
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
