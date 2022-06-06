<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
		body
		{
			max-width: 1500px;
			margin: 0px auto;
		}
		.title-image
		{
			margin-left: 37.5%;
			width: 400px;
		}
		.text
		{
			margin-bottom: 20px;
		}
		button
		{
			width: 300px;
			height: 70px;
			font-size: 20px;
			margin-bottom: 25px;
		}
		#end
		{
			text-align: center;
		}
	</style>
</head>
<body>

	<?php

	require 'phpQuery-onefile.php';
	header('Content-type: text/html; charset = utf-8');

		
		$url = 'https://www.otomoto.pl/osobowe?search%5Bfilter_float_price%3Ato%5D=10000';
		$file = file_get_contents($url);
		$doc = phpQuery::newDocument($file);
		$doc = pq($doc);
		$title_img = $doc->find('.ooa-70qvj9 .ooa-rlh0hf img')->attr('src');
		echo "<a id='title-image' href = '#end'><img src='$title_img' class='title-image'></a>";
		foreach($doc->find('.e19uumca5 .e1b25f6f18') as $article)
		{
			$article = pq($article);
			$img = $article->find('.e1b25f6f0 .ooa-1lartnv img')->attr('src');
			$text = $article->find('.eu5v0x0 a');
			echo "<br /><img src='$img'><br />";
			echo "<div class='text'>".$text."</div>";
		}

	?>

	<div id="end">
		<a href="#title-image"><button>End page (Maybe to start?)</button></a>
	</div>
</body>
</html>