<!DOCTYPE html>
<html>
	<head>
		<title>@yield("title")</title>
		
		<meta charset=utf-8 />


		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<!-- Custom CSS -->	  
	    <link rel="stylesheet" type="text/css" href="{{Asset('assets/css/mystyle.css')}}">
		<link rel="stylesheet" type="text/css" href="{{Asset('assets/css/bootstrap.css')}}"/>
		  
		<script type="text/javascript" src="{{Asset('assets/js/jquery-2.1.3.js')}}"></script>
		<script type="text/javascript" src="{{Asset('assets/js/bootstrap.js')}}"></script>

		@yield('head')
		
		

	</head>

	<body>
		<header>
		@include('layouts.header')
		</header>
		<div class="container">
	    	@yield('content')
	    
	    	@include('layouts.footer')
		</div>

		
	</body>

</html>