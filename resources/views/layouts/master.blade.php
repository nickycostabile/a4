<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>
		@yield('title', 'BetterReads')
	</title>

	<link href="/css/stylesheet.css" type='text/css' rel='stylesheet'>

	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i" rel="stylesheet">
</head>

<body>

	<header>
		<h1>better reads</h1>
	</header>
	
	<section>
      @yield('content')
    </section>
	
</body>
</html>