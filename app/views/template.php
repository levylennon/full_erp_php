<!-- 
################# Sistema ERP ###############
Autor: Levy Lennon
Data Inicio: 20/12/2019
############################################
-->
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="LennonSystem">
	<title>ERP - LennonSystem</title>

	<!-- Favicons -->
	<link href="<?php echo URL_BASE . "assets/new/img/favicon.png"?>" rel="icon">
	<link href="<?php echo URL_BASE . "assets/new/img/apple-touch-icon.png"?>" rel="apple-touch-icon">

	<!-- Bootstrap core CSS -->
	<link href="<?php echo URL_BASE . "assets/new/lib/bootstrap/css/bootstrap.min.css"?>" rel="stylesheet">
	<link href="<?php echo URL_BASE . "assets/new/css/jquery.dataTable.min.css"?>" rel="stylesheet">
	<link href="<?php echo URL_BASE . "assets/new/css/main.css"?>" rel="stylesheet">

	<!--external css-->
	<link href="<?php echo URL_BASE . "assets/new/lib/font-awesome/css/font-awesome.css"?>" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="<?php echo URL_BASE . "assets/new/css/zabuto_calendar.css"?>">
	<link rel="stylesheet" type="text/css" href="<?php echo URL_BASE . "assets/new/lib/gritter/css/jquery.gritter.css"?>"/>
	<!-- Custom styles for this template -->
	<link 	href="<?php echo URL_BASE . 	"assets/new/css/style.css"?>" rel="stylesheet">
	<link 	href="<?php echo URL_BASE . 	"assets/new/css/style-responsive.css"?>" rel="stylesheet">
	<script src="<?php  echo URL_BASE . 	"assets/new/lib/chart-master/Chart.js"?>"></script>
</head>

<body>
	<?php include "cabecalho.php" ?>

	<?php include "menu.php" ?>

	<section class="conteudo">
		<?php $this->load($view, $viewData) ?>
	</section> 

	<?php include "rodape.php" ?>

</body>

</html>