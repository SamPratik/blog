@extends('main')

@push('styles')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endpush

@section('title', "$post->title")

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2>{{ $post->title }}</h2>
            <img src="{{ asset('images/' . $post->image) }}" alt="post image" />
            <p>
                {!! $post->body !!}
            </p>
            <hr />
            <p>
              {{ $post->category->name }}
            </p>

            <h3><i class="fa fa-comment" aria-hidden="true"></i> {{ $post->comments()->count() }} comments</h3>

            @foreach ($post->comments as $comment)
              <div class="media" style="padding-top:20px;">
                <div class="media-left">
                  <img class="media-object" style="width:50px;height:50px;border-radius:50%;" src="{{ 'https://www.gravatar.com/avatar/' . md5(strtolower(trim($comment->email))) . '?s=50&d=mm' }}">
                </div>
                <div class="media-body">
                  <h4 class="media-heading">{{ $comment->name }} <small><i>Posted on {{ $comment->updated_at }}</i></small></h4>
                  <p>{{ $comment->comment }}</p>
                </div>
              </div>
            @endforeach

            <h2 style="padding-bottom:10px;">Comment Here</h2>

            {{ Form::open(['route' => 'comments.store']) }}

              <div class="row">

                {{ Form::hidden('post_id', $post->id) }}

                <div class="form-group col-md-6">
                  {{ Form::label('name', 'Name:') }}
                  {{ Form::text('name', null, ['class' => 'form-control']) }}
                </div>

                <div class="form-group col-md-6">
                  {{ Form::label('email', 'Email:') }}
                  {{ Form::email('email', null, ['class' => 'form-control']) }}
                </div>

              </div>

              <div class="row form-group" style="padding:0px 15px;">
                {{ Form::label('comment', 'Comment') }}
                {{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => 5]) }}
              </div>

              <div class="form-group col-md-4 col-md-offset-4">
                {{ Form::submit('Comment', ['class' => 'btn btn-primary btn-block']) }}
              </div>

            {{ Form::close() }}
        </div>
    </div>
@endsection
