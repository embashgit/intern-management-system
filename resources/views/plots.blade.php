<!DOCTYPE html>
<html lang="en">
<head>
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous"> -->
<link href="{{asset('admin/css/bootstrap.css')}}" rel="stylesheet">
<link href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('admin/fonts/bootstrap-glyphicons.css')}}" rel="stylesheet">
<link href="{{asset('admin/fonts/glyphiconshalflings-regular.svg')}}" >
<link href="{{asset('admin/fonts/glyphiconshalflings-regular.woff')}}" >
<link href="{{asset('admin/fonts/glyphiconshalflings-regular.eot')}}">
<link href="{{asset('admin/fonts/glyphiconshalflings-regular.ttf')}}" >
<link href="{{asset('admin/fonts/glyphiconshalflings-regular.otf')}}" >
<link href="{{asset('admin/fonts/bootstrap-glyphicon.css')}}" >

    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<div class="container">
@yield('content')

</div>
<footer>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script> -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script> -->

<script src="{{asset('admin/js/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('admin/js/bootstrap.min.js')}}"></script>
<script src="{{asset('admin/js/bootstrap.js')}}"></script>

</footer>
</body>
</html>

