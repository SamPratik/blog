@extends('main')

@section('title', 'Delete Comment')

@section('content')

  <div class="row">
    <div class="container">
      <div class="col-md-8 col-md-offset-2">

        <h2>DELETE THIS COMMENT?</h2>
        <p>
          <strong>Name: </strong>
          {{ $comment->name }}
        </p>
        <p>
          <strong>Email: </strong>
          {{ $comment->email }}
        </p>
        <p>
          <strong>Comment: </strong>
          {{ $comment->comment }}
        </p>
        {{ Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'DELETE']) }}
        {{ Form::submit('YES DELETE THIS COMMENT', ['class' => 'btn btn-danger btn-block']) }}
        {{ Form::close() }}
      </div>
    </div>
  </div>

@endsection
