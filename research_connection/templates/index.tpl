<!DOCTYPE html>

<html >
    <head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	    <!-- Bootstrap -->
		<link rel="stylesheet" 
		href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" 
		integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" 
		crossorigin="anonymous">
	    
	    <title>{{$page}} - FriendFinder</title>
    </head>
    <body>

    	{if $navbar eq true}
			{include file="navbar.tpl"}
    	{/if}

    	<div class="container">
			{if $page eq 'signup'}
				{include file="signup.tpl"}
			{elseif $page eq 'signin'}
				{include file="signin.tpl"}
			{elseif $page eq 'home'}
				{include file="home.tpl"}
			{/if}
		</div>

    </body>
</html>
