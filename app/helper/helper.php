<?php

function paginacao($url, $pg, $paginas)
{
	$mais = $pg + 1;
	$url_mais = "$url/page/$mais";
	$menos = $pg - 1;
	$url_menos = "$url/page/$menos";

	$imprimePaginacao = "";

	if ($pg == 1) {
		for ($i = 1; $i <= $paginas; $i++) {
			if ($pg == $i) {
				// Se a pagina atual for 1
				$imprimePaginacao .= "
				<li class='page-item disabled'>
	 			 	<span class='page-link'>
	  					<i class='fa fa-angle-double-left'></i>	
							Primeiro
	  				</span>
				</li>
				<li class='page-item disabled'>
					<span class='page-link'>
						<i class='fa fa-angle-left'></i>
							Voltar
					</span>
		  		</li>
				<li class='page-item active'> 
					<a class='page-link'>
						$i
					</a>
				</li>";
			} else {
				// Proximas Pagina
				$imprimePaginacao .= "<li><a href='$url/page/$i' class='page-link'>$i</a></li>";
			}
		} // Icone Proximo ------ Icone Ultimo
		$imprimePaginacao .= "			
		<li>		
			<a href='$url_mais' class='page-link'>
			Proximo <i class='fa fa-angle-right'></i>	
			</a>
		</li>
		<li>
			<a href='$url/page/$paginas' class='page-link'>
			
			Ultimo <i class='fa fa-angle-double-right'></i>	
		    </a>
		</li>";
	}

	if ($pg > 1) { // Botão Primeiro e Voltar
		$imprimePaginacao .= "
			<li>
				<a href='$url/page/1'>
					<i class='fa fa-angle-double-left'></i>	
					Primeiro
				</a>
			</li>
			<li>
				<a href='$url_menos' class='page-link' >
					<i class='fa fa-angle-left'></i>
					Voltar
				</a>
			</li>";
		for ($i = 1; $i <= $paginas; $i++) {
			if ($pg == $i) {			// Pagina Atual Selecionada EX: Pagina 2
				$imprimePaginacao .= "<li class='page-item active'><a class='page-link'>$i</a></li>";
			} else {
				$imprimePaginacao .= "<li><a href='$url/page/$i' class='page-link'>$i</a></li>";
			}
		}

		$imprimePaginacao .= "<li>
			<a href='$url_mais'>
			Proximo
				<i class='fa fa-angle-right'></i>
			</a>
			</li>
			<li>
			<a href='$url/page/$paginas'>
			Ultimo			 
			<i class='fa  fa-angle-double-right'></i>
			</a>
			</li>
        ";
	}

	if ($pg == $paginas) {
		$imprimePaginacao = "
				<li><a href='$url/page/1'>
				<i class='fa fa-angle-double-left'></i>	 
					Primeiro</a>
				</li>
				<li><a href='$url_menos'>
				<i class='fa fa-angle-left'></i>
					Voltar
				</a>
				</li>
        ";

		for ($i = 1; $i <= $paginas; $i++) {
			if ($pg == $i) {
				$imprimePaginacao .= "
				
				<li class='page-item active'>
				<a class='page-link'>$i</a></li> 

		
				<li class='page-item disabled'>
					<span class='page-link'>
							  Proximo
							  <i class='fa fa-angle-right'></i>	
	  				</span>
				</li>
				<li class='page-item disabled'>
					<span class='page-link'>
						Ultimo
						<i class='fa  fa-angle-double-right'></i>
					</span>
		  		</li>
				  
				
				
				
				";
			} else {
				$imprimePaginacao .= "
				<li><a href='$url/page/$i' class='page-link'>$i</a></li>";
			}
		}
	}

	if ($paginas <= 0) {
		$imprimePaginacao = "Página 1 de 1";
	}

	return $imprimePaginacao;
}

function upload($arquivo, $config_upload = array())
{
	set_time_limit(0);
	$nome_arquivo 		= $arquivo["name"];
	$tamanho_arquivo 	= $arquivo["size"];
	$arquivo_temporario     = $arquivo["tmp_name"];
	$erro = 0;
	$msg  = "";
	$retorno = array();



	if (!empty($nome_arquivo)) {

		$ext = strrchr($nome_arquivo, ".");
		$nome_final = ($config_upload["renomeia"]) ? md5(time()) . $ext : $nome_arquivo;
		$caminho = $config_upload["caminho_absoluto"] . $nome_final;

		if (($config_upload["verifica_tamanho"]) && ($tamanho_arquivo > $config_upload["tamanho"])) {
			$msg = "O arquivo é maior que o permitido";
			$erro = -1;
		}

		if (($config_upload["verifica_extensao"]) && (!in_array($ext, $config_upload["extensoes"]))) {
			$msg = "O arquivo não é permitido";
			$erro = -1;
		}


		if ($erro != -1) {
			if (move_uploaded_file($arquivo_temporario, $caminho)) {
				$msg =  "Arquivo enviado com sucesso";
				$erro = 0;
			} else {
				$msg = "erro ao fazer o upload";
				$erro = -1;
			}
		}
	} else {
		$msg = "está vazio";
		$erro = -1;
	}
	$retorno = array("erro" => $erro, "msg" => $msg, "nome" => $nome_final);

	return $retorno;
}

function databr($data, $opcao)
{
	if ($opcao == 1) {
		$dia = substr($data, 0, 2);
		$mes = substr($data, 3, 2);
		$ano = substr($data, 6, 4);

		$databr = $ano . "-" . $mes . "-" . $dia;
	} else {
		$dia = substr($data, 8, 2);
		$mes = substr($data, 5, 2);
		$ano = substr($data, 0, 4);

		$databr = $dia . "/" . $mes . "/" . $ano;
	}
	return $databr;
}
