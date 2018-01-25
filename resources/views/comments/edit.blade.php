@extends('main')

@section('title', 'Edit Comment')

@section('content')

  <div class="row">

    <div class="container">
      <div class="col-md-8 col-md-offset-2">
        <h2>Edit Comment</h2>
        {{ Form::model($comment, ['route' => ['comments.update', $comment->id], 'method' => 'PUT']) }}

          <div class="form-group">
            {{ Form::label('name', 'Name: ') }}
            {{ Form::text('name', null, ['class' => 'form-control', 'disabled' => 'disabled']) }}
          </div>

          <div class="form-group">
            {{ Form::label('email', 'Email: ') }}
            {{ Form::email('email', null, ['class' => 'form-control', 'disabled' => 'disabled']) }}
          </div>

          <div class="form-group">
            {{ Form::label('comment', 'Comment: ') }}
            {{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => 5]) }}
          </div>

          <div class="form-group">
            {{ Form::submit('Update Comment', ['class' => 'btn btn-primary']) }}
          </div>

        {{ Form::close() }}
      </div>
    </div>

  </div>

@endsection
