<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'TheHub') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
    	.posts{
    		border : 1px solid #747a87;
    		margin : 40px;
    		padding : 20px;
    		padding-top : 10px;
    		background : #e1e3e8;
    		border-radius: 10px 10px 10px 10px;
    	}
    	#comments{
    		background : transparent;
    		padding : 5px;
    		margin : 10px;
    		margin-top : 40px;
    		margin-left : -5px;
    	}
    	#thetable{
    		margin : 15px;
    		padding : 20px;
    	}
    	#create{
    		padding : 20px;
    		margin : 50px;
    	}
	</style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        TheHub
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
<div id="create">
<form method="POST" action="{{ route('SubmitPost') }}">
		<h1 align="center">Share Your Thoughts</h1>

		{{ csrf_field() }}
		<div id='thetable'>
		<table align = "center">
			<tr>
				<td align="right"><h4>Title</h4></td>
				<td align="center"><h4>:</h4></td>
				<td align="left"><input type="text" name="title" size="81"></td>
			</tr>
			<tr>
				<td align="right"><h4>Post</h4></td>
				<td align="center"><h4>:</h4></td>
				<td align="left"><textarea type="text" name="content" rows="7" cols="80"></textarea></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><input type="submit" name="submit" value="POST!"></td>
			<tr>
		</table>
	</div>
</form>
</div>

@foreach ($posts as $p)
		<div class = "posts" id="{{$p->id}}">
				<h2>{{$p->title}}</h1>
				<h4>{{$p->content}}</h4>
				<div id="comments">
				@foreach ($p->comments as $c)
					<p><h6>>> {{$c->comment}}</h6></p>
				@endforeach
				</div>
				<form method="POST" action="{{ route('SubmitComment')}}">
					{{ csrf_field() }}
					Comment: <input type="text" name="comment" size="152">
					<!-- <textarea type="text" name="comment"></textarea><br> -->
					<input type="hidden" name='post_id' value= {{$p->id}}>
					<input type="submit" name="submit">
				</form>
				<br><a href="/deletepost/{{$p->id}}">Delete this post</a>
		</div>
@endforeach

    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
