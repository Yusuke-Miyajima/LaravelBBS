<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<title>@yield('title')</title>
</head>
<body>
@include ('inc_header')
@yield('content')
@include ('inc_footer')
</body>
</html>