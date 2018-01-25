
@if (session()->has('success'))
  <div class="alert alert-success alert-dismissable fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <p>
      <strong>Success: </strong>{{session('success')}}
    </p>
  </div>
@endif

@if(count($errors) > 0)
  <div class="alert alert-danger alert-dismissable fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      @foreach($errors->all() as $error)
        <ul>
          <li>{{ $error }}</li>
        </ul>
      @endforeach
  </div>
@endif
