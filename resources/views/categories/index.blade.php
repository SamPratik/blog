@extends('main')

@section('title', 'All Categories')

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <h2>All Categories</h2>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($categories as $category)
              <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="col-md-4">
        <div class="well">
          <h2>  Create New Category</h2>
          {{ Form::open(['route' => 'categories.store']) }}

          {{ Form::label('name', 'Category Name:') }}
          {{ Form::text('name', null, ['class' => 'form-control']) }}<br />
          {{ Form::submit('Create New category', ['class' => 'btn btn-primary btn-block']) }}

          {{ Form::close() }}
        </div>
      </div>
    </div>
  </div>

@endsection
