@extends('main')

@section('title', "Tag Name Edit")

@section('content')
  <div class="container">
    <div class="row">
      <h2 class="col-md-6 col-md-offset-3">Tag Name Edit</h2>
      <div style="clear:both;"></div>
      <hr />
      {{ Form::model($tag, ['route' => ['tags.update', $tag->id], 'method' => 'PUT']) }}
        <div class="form-group col-md-6 col-md-offset-3">
          {{ Form::label('name', 'Tag Name:') }}
          {{ Form::text('name', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group col-md-2 col-md-offset-5">
          {{ Form::submit('Save Changes', ['class' => 'btn btn-primary btn-block']) }}
        </div>
      {{ Form::close() }}
    </div>
  </div>
@endsection
