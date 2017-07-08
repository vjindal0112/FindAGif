<!doctype html>
<html lang='en'>
<head>
    <title>Example Domain</title>

    <meta charset="utf-8" />
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />   
	
	<link type="text/css" href="css/bootstrap.min.css" rel="stylesheet">

	
	<style>
		
		.container {
			background: url("todo") no-repeat center center fixed; 
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size: cover;
			width: 100%;
			height: 100% !important;
		}
		
		.centertext {
			text-align: center;
		}
		
		.centerdiv {
			display:block;
			margin-right: auto;
			margin-left: auto;
		}
		
		.iframe {
		}
	
	</style>
	
	
</head>

<body>

	
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<h1 class="center"><strong>FIND A GIF</strong></h1>
			</div>
		</div>
	</div>
	<div class="container" id="resultcontainer">
	
	</div>
	
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>	
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script>
		function $_GET(q) { 
			var s = window.location.search.substring(1); 
			var pair = s.split("=");
			if (pair[0] == q) {
				console.log(pair[1]);
				return pair[1];
			} else {
				return 0;
			}
		} 
		
		$.get('scraper.php?input=' + $_GET('input'), function(data) {
			var url_array = data.split(" , ");
			console.log(url_array);
			for (var i = 0; i < url_array.length; i = i+3) {
				if (url_array[i] && url_array[i+1] && url_array[i+2]) {
					createRow(url_array[i], url_array[i+1], url_array[i+2]);
				}
			}
			
			
		});
		
		function createRow(url1, url2, url3) {
			var row = document.createElement('div');
			row.setAttribute('class', 'row');
			row.appendChild(createColumn(url1));
			row.appendChild(createColumn(url2));
			row.appendChild(createColumn(url3));
			document.getElementById('resultcontainer').appendChild(row);
		}
	
		function createColumn(url) {
			var wrapper = document.createElement("div");
			wrapper.setAttribute('class', 'col-md-4');
			var iframe = document.createElement("iframe");
			iframe.setAttribute('class', 'iframe');
			iframe.setAttribute('src', url);
			console.log(url);
			wrapper.appendChild(iframe);
			return wrapper;
		}
		
		function getMeta(url){
			$("<img/>",{
				load : function(){ 
					var width = this.width;
					var height = this.height; 
				},
				src  : url
			});
			return [width, height];
		}
		
		
		
	</script>
</body>
</html>

			
	</script>
</body>
</html>
