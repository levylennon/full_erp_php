<?php

namespace app\controllers;

use app\core\Controller;

use app\models\CategoriaModel;

session_start();
if(strip_tags(filter_input(INPUT_POST, "pesquisa")) <> ""){
    $_SESSION['NomePesquisa'] = $_POST["pesquisa"];
} 


class CategoriaController extends Controller
{
     

    public function Index()
    {
        $objCategoria    = new CategoriaModel();                             // Crio o objeto Categoria para ter acesso as funções do model categoria

        // $total           = $objCategoria->GetTotal();                   // Select que traz o total de registros gravados
        // $LinhasPorPagina = 10;                                          // Numeros de registros por página
        // var_dump($total);
        // exit;
        // $URL     = $_SERVER["REQUEST_URI"];                             // Pego a URL e gravo na string  EX: "/categorias/page/15"
        // $Array   = explode("/", $URL);                                  // Transformo a URL em array dps do / com o comando explode
        // $Pag     = (isset($Array[4])) ? $Array[4] : 1;                  // Recupera o valor do array

        
                                                                        // Estou passando o número para fazer a contagem no item do grid e o select de forma correta
                                                                        // Estou passando o - 1 pq se n tiver o parametro 4 na variavel userid ele passa o 1.
        // $inicio     = ($Pag - 1) * $LinhasPorPagina;                    // se eu deixar o 1, ele vai dar erro no select, vai passar o limite incorreto.
                                                                        // por esse motivo eu coloquei o -1 ali
       
     
                                         
        $ListaCategorias = $objCategoria->listaTodos(); // Faço o select na tabela passando o número inicial e linhas


        $dados["URL_Pag"]           = URL_BASE . "categoria";
        // $dados["inicio"]            = $inicio;                          // Uso para fazer a contagem do ITEM, pois n quero deixar ID para o cliente ver.
        $dados["categorias"]        = $ListaCategorias;                 // Passo o resultado do select para a view
        // $dados["TotalRegistros"]    = $total;                           // Passo o total de registros atraves da variavel $totalRegistros
        // $dados["pg"]                = isset($Pag) ? $Pag : 1;           // Passo a página que está aberta na tela, se n existir a variavel, eu passo 1 como padrão.
        // $dados["paginas"]           = ceil(($total / $LinhasPorPagina)); // Contagem para saber a quantidade de páginas vai possuir a tela, comando CEIL é para arredondar para cima
        $dados["view"]              = "categoria/index";                // Chamo o index da view
        $this->load("template", $dados);                                // Carrego o template e a view através da variavel $dados
    }

    public function Create()
    {
        $dados["view"] = "categoria/create";
        $this->load("template", $dados);
    }

    public function Inserir()
    {

        /* 
        Strip_tags -> This function tries to return a string with all NULL bytes, HTML and PHP tags stripped from a given str.

                            Exemplo de uso 
         <p>Test paragraph.</p> <a href="#fragment">Other text</a>
         Test paragraph. Other text

        */
        $objCategoria = new CategoriaModel();

        $id_categoria       = isset($_POST["id_categoria"])     ? strip_tags(filter_input(INPUT_POST, "id_categoria")) : NULL;
        $categoria          = isset($_POST["categoria"])        ? strip_tags(filter_input(INPUT_POST, "categoria")) : NULL;
        $ativo_categoria    = isset($_POST["ativo_categoria"])  ? strip_tags(filter_input(INPUT_POST, "ativo_categoria")) : NULL;

        /*
        Verifico se existe algum ID categoria, se existir, significa que será edição... Caso contrário será insert.
        */
        if ($id_categoria) {
            $objCategoria->Editar($id_categoria, $categoria, $ativo_categoria);
        } else {
            $objCategoria->inserir($categoria, $ativo_categoria);
        }

        /*
         Redireciono para a pasta categoria após gravar
         */

        header("location:" . URL_BASE . "categoria");
    }

    public function edit($id_categoria = null)
    {

        $objCategoria = new CategoriaModel();
        /*
        Faço um tratamento para verificar se existe um id, o ! na variavel significa NOT tipo.. "If not exist"
        Se não existir, eu faço a página recarregar 
        */

        if (!$id_categoria) {
            header("location:" . URL_BASE . "categoria");
        } else {
            $categoria =  $objCategoria->getCategoria($id_categoria);
        }
        /*
        Verifico se não existe uma categoria, caso não exista eu faço o redirecionamento para a pagina lista categoria
        */
        if (!$categoria) {
            header("location:" . URL_BASE . "categoria");
        }

        $dados["categoria"] = $categoria; // Estou passando o resultado da variavel categoria para a conseguir fazer a edição do registro
        $dados["view"] = "categoria/update";
        $this->load("template", $dados);
    }

    public function excluir($id_categoria = null)
    {
        $objCategoria = new CategoriaModel();

        if (!$id_categoria) {
            header("location:" . URL_BASE . "categoria");
        } else {
            $categoria =  $objCategoria->getCategoria($id_categoria);
        }
        /*
        Verifico se não existe uma categoria, caso não exista eu faço o redirecionamento para a pagina lista categoria
        */
        if (!$categoria) {
            header("location:" . URL_BASE . "categoria");
        }

        $dados["categoria"] = $categoria;
        $dados["view"] = "categoria/Excluir";
        $this->load("template", $dados);
    }

    public function deletar($id_categoria = null)
    {
        $objCategoria = new CategoriaModel();

        if (!$id_categoria) {
            header("location:" . URL_BASE . "categoria");
        } else {
            $categoria =  $objCategoria->excluir($id_categoria);
        }
        /*
        Verifico se não existe uma categoria, caso não exista eu faço o redirecionamento para a pagina lista categoria
        */
        if (!$categoria) {
            header("location:" . URL_BASE . "categoria");
        }

        $dados["categoria"] = $categoria;
        $dados["view"] = "categoria/Excluir";
        $this->load("template", $dados);
    }

    public function Filtro()
    {
        $objCategoria = new CategoriaModel();


        $pesquisa       = isset($_POST["pesquisa"])     ? strip_tags(filter_input(INPUT_POST, "pesquisa")) : NULL;

        if($pesquisa == null){                                                      //  Verifico se a variavel pesquisa que recebe o valor do post está nulla
            $pesquisa = $_SESSION['NomePesquisa'];                                  //  Se estiver, eu passo o ultimo valor gravado na sessão, no começo do código
        }
        

        if (!isset($pesquisa) or ($pesquisa) == '') {                               // Verifico se o que está na pesquisa existe, e se é vazio
            header("location:" . URL_BASE . "categoria");                           // se for, eu redireciono para o index
        }
        
        $URL                = $_SERVER["REQUEST_URI"];                              // Pego a URL e gravo na string  EX: "/categorias/page/15"
        $Array              = explode("/", $URL);                                   // Transformo a URL em array dps do / com o comando explode
        $Pag                = (isset($Array[5])) ? $Array[5] : 1;                   // Recupera o valor do array

       
        $LinhasPorPagina    = 10;
        $inicio             = ($Pag - 1) * $LinhasPorPagina;

        
        $total              = $objCategoria->TotalLinhasFiltro($pesquisa, $inicio, $LinhasPorPagina);
        

        $dados["inicio"]            = $inicio;  
        $dados["URL_Pag"]           = URL_BASE . "categoria/filtro";
        $dados["pg"]                = isset($Pag) ? $Pag : 1;           
        $dados["paginas"]           = ceil(($total / $LinhasPorPagina));
        $dados["categorias"]        = $objCategoria->Filtro($pesquisa, $inicio, $LinhasPorPagina);
        $dados["pesquisa"]          = $pesquisa;
        $dados["TotalRegistros"]    = $total;
        $dados["view"] = "categoria/index";
        $this->load("template", $dados);
    }
}
