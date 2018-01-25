@extends('main')

@section('title', 'Contact')

@section('ActiveContact', 'active')

@section('content')

    <!-- main-content -->
    <div class="container">

        <div class="row col-md-8 col-md-offset-2">
          <h2>Contact Me</h2>
          {{ Form::open(['route' => 'contact']) }}

            <div class="form-group">
              {{ Form::label('name', 'Name: ') }}
              {{ Form::text('name', null, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
              {{ Form::label('email', 'E-mail: ') }}
              {{ Form::email('email', null, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
              {{ Form::label('subject', 'Subject: ') }}
              {{ Form::text('subject', null, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
              {{ Form::label('message', 'Message: ') }}
              {{ Form::textarea('message', null, ['class' => 'form-control', 'rows' => 5]) }}
            </div>

            <div class="form-group col-md-4 col-md-offset-4">
              {{ Form::submit('Send Mail', ['class' => 'btn btn-primary btn-block']) }}
            </div>

          {{ Form::close() }}

        </div>

    </div>
    <!-- end-main-content -->
 @endsection
