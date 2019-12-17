<?php

namespace app\controllers;

use app\core\Controller;

use app\models\UnidadeModel;

session_start();
if(strip_tags(filter_input(INPUT_POST, "pesquisa")) <> ""){
    $_SESSION['NomePesquisa'] = $_POST["pesquisa"];
} 

class UnidadeController extends Controller
{

    public function index()
    {
        $objUnidade         = new UnidadeModel;

            // Paginação
        $total              = $objUnidade->getTotal();
        $LinhasPorPagina    = 10;
            $URL                = $_SERVER["REQUEST_URI"];                              
            $Array              = explode("/", $URL);                                   
            $Pag                = (isset($Array[5])) ? $Array[5] : 1;
        $inicio             = ($Pag - 1) * $LinhasPorPagina;
        

            // Filtro Todos os Dados
        $ListaUnidades      = $objUnidade->lista();

        $dados["inicio"]            = $inicio;  
        $dados["URL_Pag"]           = URL_BASE . "unidade/filtro";
        $dados["pg"]                = isset($Pag) ? $Pag : 1;           
        $dados["paginas"]           = ceil(($total / $LinhasPorPagina));


        $dados["TotalRegistros"]    = $total;
        $dados["teste"]             = 1;
        $dados["unidades"]          = $ListaUnidades;
        $dados["view"]              = "unidade/index";
        $this->load("template", $dados);
    }

    public function Create()
    {
        $dados["view"] = "unidade/create-Edit";
        $this->load("template", $dados);
    }

    public function Inserir()
    {
        $objUnidade     =   new UnidadeModel;
        
        $id_unidade     =   isset($_POST["id_unidade"])         ? strip_tags(filter_input(INPUT_POST, "id_unidade"))    : NULL;
        $unidade        =   isset($_POST["unidade"])            ? strip_tags(filter_input(INPUT_POST, "unidade"))       : NULL;
        $abrev_unidade  =   isset($_POST["abrev_unidade"])      ? strip_tags(filter_input(INPUT_POST, "abrev_unidade")) : NULL;
        
        /*
        Verifico se existe um ID, se existir eu atualizo, caso não exista eu faço o registro
        */
        if ($id_unidade) {
            $objUnidade->Editar($id_unidade, $unidade, $abrev_unidade);
        } else {
            $objUnidade->inserir($unidade, $abrev_unidade);
        }

        $dados["view"] = "unidade/index";
        $this->load("template", $dados);
    }

    public function Filtro()
    {
        $objUnidade     =   new UnidadeModel;

        
        $pesquisa       =   isset($_POST["pesquisa"])   ? strip_tags(filter_input(INPUT_POST, "pesquisa")) : NULL;
        
        if($pesquisa == null){                                                      //  Verifico se a variavel pesquisa que recebe o valor do post está nulla
            $pesquisa = $_SESSION['NomePesquisa'];                                  //  Se estiver, eu passo o ultimo valor gravado na sessão, no começo do código
        }
        

        if (!isset($pesquisa) or ($pesquisa) == '') {                               // Verifico se o que está na pesquisa existe, e se é vazio
            header("location:" . URL_BASE . "unidade");                           // se for, eu redireciono para o index
        }
        
        $URL                = $_SERVER["REQUEST_URI"];                              // Pego a URL e gravo na string  EX: "/categorias/page/15"
        $Array              = explode("/", $URL);                                   // Transformo a URL em array dps do / com o comando explode
        $Pag                = (isset($Array[5])) ? $Array[5] : 1;                   // Recupera o valor do array

       
        $LinhasPorPagina    = 10;
        $inicio             = ($Pag - 1) * $LinhasPorPagina;

        
        $total              = $objUnidade->TotalLinhasFiltro($pesquisa, $inicio, $LinhasPorPagina);
        

        $dados["inicio"]            = $inicio;  
        $dados["URL_Pag"]           = URL_BASE . "unidade/filtro";
        $dados["pg"]                = isset($Pag) ? $Pag : 1;           
        $dados["paginas"]           = ceil(($total / $LinhasPorPagina));
        $dados["unidades"]        = $objUnidade->Filtro($pesquisa, $inicio, $LinhasPorPagina);
        $dados["pesquisa"]          = $pesquisa;
        $dados["TotalRegistros"]    = $total;
        $dados["view"] = "unidade/index";
        $this->load("template", $dados);

    }
}
