<!doctype html>
<html lang='en'>
<head>
    <title>Find a GIF</title>

    <meta charset="utf-8" />
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />   
	
	<link type="text/css" href="css/bootstrap.min.css" rel="stylesheet">

	
	<style>
		html, body {
			height: 100%;
		}
		
		.container {
			background: url("images/weatherBackground.jpg") no-repeat center center fixed; 
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size: cover;
			width: 100%;
			height: 100% !important;
		}
		
		.center {
			text-align: center;
		}
		
		.centerdiv {
			display:block;
			margin-right: auto;
			margin-left: auto;
		}
		
		#search-form {
			padding-top: 60px;
		}
		
		#findbtn {
			margin-top: 30px;
		}
	
	</style>
	
	
</head>

<body>

	
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<h1 class="center"><strong>FIND A GIF</strong></h1>
				<iframe class="centerdiv" src="//giphy.com/embed/o0vwzuFwCGAFO" width="300" height="300" frameBorder="0"></iframe>
				<form id="search-form">
					<div class="form-group center">
						<input type="text" class="form-control" name="input" id="input" placeholder="Find a GIF"/>
						<button class="btn btn-success btn-lg" id="findbtn">Find</button>
					</div>
				</form>
			</div>
			
		</div>
		<div class="row alerts" id="faildiv" style="display:none">
			<div class="col-md-6 col-md-offset-3">
				<div class="alert alert-danger">
					<p id="fail">I'm sorry, we could not find any results for that search term. Please try again</p>
				</div>
			</div>
		</div>
		<div class="row alerts" id="noinputdiv" style="display:none">
			<div class="col-md-6 col-md-offset-3">
				<div class="alert alert-danger">
					<p id="noinput">Please enter a search term</p>
				</div>
			</div>
		</div>
	</div>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>	
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script>
		 $('#findbtn').click(function(event) {
			event.preventDefault();
			$('.alerts').hide();
			if ($('#input').val() != "") {
				$.get('scraper.php?input=' + $('#input').val(), function(data) {
					if (data == "") {
						$("#faildiv").fadeIn();
					} else {
						window.location.assign("results.php?input=" + $('#input').val());
					}
				});
			} else {
				$('#noinputdiv').fadeIn();
			}
			
		}); 
			
	</script>
</body>
</html>
