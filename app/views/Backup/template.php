<html lang="pt-br">

<head>
	 <title>Sistema Empresarial - Lennon System</title>
	<meta charset="utf-8">

	<link rel='shortcut icon' type='image/x-icon' href='<?php echo URL_BASE . "/assets/img/icon.ico" ?>' />

	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!-- css -->
	<link rel="stylesheet" href="<?php echo URL_BASE ?>assets/css/grade.css">
	<link rel="stylesheet" href="<?php echo URL_BASE ?>assets/css/panel.css">
	<link rel="stylesheet" href="<?php echo URL_BASE ?>assets/css/style.css">

	<!-- Java Script -->
	<script src="<?php echo URL_BASE ?>assets/js/jquery-3.3.1.min.js"></script>
	<script src="<?php echo URL_BASE ?>assets/js/js-funcoes.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<!-- font icones -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

  <script>
		var base_url = "<?php echo URL_BASE ?>";
	</script> 
</head>

 <body id="body" class="tema-dark">
	<?php include "cabecalho.php" ?>
	<?php include "menu.php" ?>
	<section class="conteudo">
		<?php $this->load($view, $viewData) ?>
	</section>
	<?php include "rodape.php" ?>




	<!-- Graficos  -->
	<script src="<?php echo URL_BASE ?>assets/js/chart.js/Chart.min.js"></script>

</body>

</html>