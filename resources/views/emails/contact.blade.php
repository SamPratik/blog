<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <title>Document</title>
</head>
<body>

  <div class="panel panel-success">
    <div class="panel-heading">
      <h3 class="panel-title">{{ $request->subject }}</h3>
    </div>
    <div class="panel-body">
      {{ $request->message }}
    </div>
    <div class="panel-footer">
      <strong>From: </strong><small>{{ $request->name }}</small>
    </div>
  </div>

</body>
</html>
