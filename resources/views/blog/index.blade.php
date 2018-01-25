@extends('main')

@section('title', 'Index')

@section('ActiveBlog', 'active')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1><strong>Blog</strong></h1>
        </div>
    </div>

    @foreach ($posts as $post)
      <div class="row">
          <div class="col-md-8 col-md-offset-2">
              <h2><strong>{{ $post->title }}</strong></h2>
              <h5><strong>Published: </strong>{{ $post->created_at }}</h5>
              <p>
                  {{ substr(strip_tags($post->body), 0, 300) }}{{ strlen(strip_tags($post->body)) > 300 ? "..." : "" }}
              </p>
              {{ Html::linkAction('BlogController@single', 'Read More', [$post->slug], ['class' => 'btn btn-primary']) }}
              @if (!$loop->last)
                  <hr />
              @endif
          </div>
      </div>
    @endforeach

    <div class="row text-center">
        <div class="col-md-12">
            {{ $posts->links() }}
        </div>
    </div>


@endsection
