<?php
//declare constante at root project for having the base path
//DIR = root at this moment
define("BASE_PATH", __DIR__);
//define("BASE_URL", "http://" . $_SERVER['SERVER_NAME'] . '/PPE2-STAGE');
//You may have to modify this if your base url is different (ex: if you use PHP local server)
define("BASE_URL", "http://" . $_SERVER['HTTP_HOST'] . '/PPE2-STAGE');
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
	<meta name="generator" content="Jekyll v3.8.6">

	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>/assets/css/main.css">

	<!-- Bootstrap core CSS -->
	<link href="<?php echo BASE_URL ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!-- Favicons -->

	<!-- Custom styles for this template -->

</head>

<?php
include(__DIR__.'/skeleton/header.php');
?>
<body>
