<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
				content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!-- Compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<!-- Compiled and minified JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

	<style>
		body {
			display: flex;
			height: 100vh;
			width: 100%;
			margin: 0;
			flex-direction: column;
			justify-content: center;
			align-items: center;
			background-image: linear-gradient(to bottom left, rgb(203, 207, 250), rgb(204, 217, 250), rgb(205, 226, 251), rgb(207, 236, 251), rgb(208, 245, 252), rgb(209, 255, 252), rgb(217, 254, 246), rgb(224, 253, 239), rgb(232, 253, 233), rgb(240, 252, 227), rgb(247, 251, 220), rgb(255, 250, 214));
		}
	</style>
	<?=$this->getMeta();?>
</head>
<body>

<?=$content;?>


<?php
if (DEBUG) {
	$logs = \R::getDatabaseAdapter()
		->getDatabase()
		->getLogger();

	debug($logs->grep('SELECT'));
}
?>

</body>
</html>