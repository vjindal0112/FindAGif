<?php 
	
	$searchterm = $_GET['input'];
	
	$searchterm = str_replace(" ", "-", $searchterm);
	
	$url = "http://api.giphy.com/v1/stickers/search?q=";
	$key = "&api_key=dc6zaTOxFJmzC";
	
	if (file_get_contents($url.$searchterm.$key)) {
		$content = file_get_contents($url.$searchterm.$key);
		preg_match_all('/images":{"fixed_height":{"url":"(.*?)"/i', $content, $matches);
		if ($matches[1][0] == "") { 
			echo "";
		} else {
			$seperator = " , ";
			foreach ($matches[1] as $match) {
				echo $match.$seperator;
			}
		}
	}
	
	
?>