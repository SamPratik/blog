@extends('main')

@section('title', 'Create Post')

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

	<h2 class="text-center">Create New Post</h2>

	<form class="col-md-8 col-md-offset-2" action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
		<div class="form-group">
			<label for="title">Title:</label>
			<input type="text" class="form-control" name="title" value="{{ old('title') }}">
		</div>
		<div class="form-group">
				<label for="slug">URL Slug: </label>
				<input class="form-control" type="text" name="slug" value="{{ old('slug') }}" />
		</div>
		<div class="form-group">
			<label for="category_id">Category:</label>
			<select class="form-control" name="category_id">
				@foreach ($categories as $category)
					<option value="{{ $category->id }}" @if (old('category_id') == $category->id) selected @endif>
						{{ $category->name }}
					</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<label for="tag_id">Tags: </label>
			<select name="tag_id[]" class="js-example-basic-multiple form-control" multiple="multiple">
				@foreach ($tags as $tag)
					<option value="{{ $tag->id }}">{{ $tag->name }}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
		  <label for="featured_image">Upload Image:</label>
		  <input name="featured_image" type="file">
		</div>
		<div class="form-group">
			<label for="post">Post Body:</label>
			<textarea class="form-control" name="body">{{ old('body') }}</textarea>
		</div>
		<button type="submit" class="btn btn-primary btn-block">Create Post</button>
	</form>

@endsection

@section('scripts')
	{{ Html::script('js/select2.min.js') }}
	<script type="text/javascript">
		$(".js-example-basic-multiple").select2();
	</script>
@endsection
