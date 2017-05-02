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
		@if(Session::get('message') != null)
		<div id="message">
	    	<p>{{ Session::get('message') }}</p>
	    </div>
	    @endif
    
	<header>
		<div id="logo"><img src="/images/a4logo.jpg"></div>

		<nav>
			<ul>
				<li><a href="/library">Library of Books</a> |</li>
				<li><a href="/library/create">Create A Book</a> |</li>
				<li><a href="/search">Search For A Book</a></li>
			</ul>
		</nav>
	</header>
	
	<section>
      @yield('content')
    </section>
	
</body>
</html>