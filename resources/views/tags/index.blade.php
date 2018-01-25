@extends('main')

@section('title', 'All Tags')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <h2>All Tags</h2>
        <table class="table table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($tags as $tag)
                <tr>
                  <td>{{ $tag->id }}</td>
                  <td><a href="{{ route('tags.show', ['tag_id' => $tag->id]) }}">{{ $tag->name }}</a></td>
                </tr>
              @endforeach
            </tbody>
        </table>
      </div>

      <div class="col-md-4">
        <div class="well">
          <h2>Create New Tag</h2>
          {{ Form::open(['route' => 'tags.store']) }}
            <div class="form-group">
              {{ Form::label('name', 'Tag Name:') }}
              {{ Form::text('name', null, ['class' => 'form-control', 'autofocus' => 'autofocus']) }}
            </div>
            <div class="form-group">
              {{ Form::submit('Create new tag', ['class' => 'btn btn-primary btn-block']) }}
            </div>
          {{ Form::close() }}
        </div>
      </div>
    </div>
  </div>
@endsection
