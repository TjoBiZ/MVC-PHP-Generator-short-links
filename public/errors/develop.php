<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
				content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel=stylesheet href="/errors/style.css" type=text/css media=all>
	<title>Error</title>
</head>
<body>
<h1>It was error.</h1>
<p><strong>Code error:</strong> <?= $errono ?></p>
<p><strong>Text error:</strong> <?= $errstr ?></p>
<p><strong>The file has get error:</strong> <?= $errfile ?></p>
<p><strong>The line has error:</strong> <?= $errline ?></p>
</body>
</html>