@extends('main')

@section('title', 'Show Post')

@section('stylesheets')
  {{ Html::style('css/select2.min.css') }}
@endsection

@push('scripts')
	{{-- <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=3q5z432nr1paneatbtlt428ivmicf55vxaxnmwvz2jzq94it"></script> --}}
	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
@endpush

@push('scripts')
	<script>
	  var editor_config = {
	    path_absolute : "{{ URL::to('/') }}/",
	    selector: "textarea",
	    plugins: [
	      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
	      "searchreplace wordcount visualblocks visualchars code fullscreen",
	      "insertdatetime media nonbreaking save table contextmenu directionality",
	      "emoticons template paste textcolor colorpicker textpattern"
	    ],
	    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
	    relative_urls: false,
	    file_browser_callback : function(field_name, url, type, win) {
	      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
	      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

	      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
	      if (type == 'image') {
	        cmsURL = cmsURL + "&type=Images";
	      } else {
	        cmsURL = cmsURL + "&type=Files";
	      }

	      tinyMCE.activeEditor.windowManager.open({
	        file : cmsURL,
	        title : 'Filemanager',
	        width : x * 0.8,
	        height : y * 0.8,
	        resizable : "yes",
	        close_previous : "no"
	      });
	    }
	  };

	  tinymce.init(editor_config);
	</script>
@endpush

@section('content')
  <div class="row">

    {!! Form::model( $post, ['route' => ['posts.update', $post->id], 'method' => 'PUT', 'files' => true] ) !!}
    <div class="col-md-8">

        <div class="form-group">
          {!! Form::label('title', 'Post Title: ') !!}
          {!! Form::text('title', $value = null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
          {!! Form::label('slug', 'Slug: ') !!}
          {!! Form::text('slug', null, array('class' => 'form-control')) !!}
        </div>
        <div class="form-group">
          {!! Form::label('category_id', 'Category:') !!}
          {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
          {!! Form::label('tag_id', 'Tags:') !!}
          {!! Form::select('tag_id[]', $tags, null, ['class' => 'js-example-basic-multiple form-control', 'multiple' => 'multiple']) !!}
        </div>
        <div class="form-group">
          {{ Form::label('featured_image', 'Upload Image:') }}
          {{ Form::file('featured_image') }}
        </div>
        <div class="form-group">
          {!! Form::label('body', 'Post Body: ') !!}
          {!! Form::textarea('body', $value = null, ['class' => 'form-control']) !!}
        </div>

    </div>

    <div class="col-md-4">
      <div class="well">
        <div>
          <dl class="dl-horizontal">
            <dt>Created At: </dt>
            <dd>{{ date('jS F, Y h:ia', strtotime($post->created_at)) }}</dd>
          </dl>
        </div>
        <div>
          <dl class="dl-horizontal">
            <dt>Updated At: </dt>
            <dd>{{ date('jS F, Y h:ia', strtotime($post->updated_at)) }}</dd>
          </dl>
        </div>

        <div class="row">
          <div class="col-md-6">
            <a href="{{ route('posts.destroy', $post->id) }}" class="btn btn-danger btn-block">Cancel</a>
          </div>
          <div class="col-md-6">
            {{-- <a href="{{ route('posts.destroy', $post->id) }}" class="btn btn-success btn-block">Save Changes</a> --}}
            {!! Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) !!}
          </div>
        </div>
      </div>
    </div>
    {!! Form::close() !!}

  </div>
@endsection

@section('scripts')
  {{ Html::script('js/select2.min.js') }}
  <script type="text/javascript">
		$(".js-example-basic-multiple").select2();
    $(".js-example-basic-multiple").select2().val({!! json_encode($tag_ids) !!}).trigger('change');
	</script>
@endsection
