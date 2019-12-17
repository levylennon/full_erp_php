<?php

namespace app\models;

use app\core\Model;

class CategoriaModel extends Model
{


    public function listaTodos()
    {
        /*
        PDO::query — Executes an SQL statement, returning a result set as a PDOStatement object
        */
        $sql = "SELECT * FROM categoria";
        // var_dump($sql);
        // exit;
        $qry = $this->db->query($sql);
        return $qry->fetchAll(\PDO::FETCH_OBJ);
    }

    public function lista($inicio, $LinhasPorPagina)
    {
        /*
        PDO::query — Executes an SQL statement, returning a result set as a PDOStatement object
        */
        $sql = "SELECT * FROM categoria LIMIT $inicio, $LinhasPorPagina";
        // var_dump($sql);
        // exit;
        $qry = $this->db->query($sql);
        return $qry->fetchAll(\PDO::FETCH_OBJ);
    }

    public function GetTotal()
    {
        // O fecth ele traz apenas um registro, o fechtAll ele traz todos os registros 
        $sql = "SELECT count(*) as total FROM categoria";
        $qry = $this->db->query($sql);

        return $qry->fetch(\PDO::FETCH_OBJ)->total;

    }

    public function getCategoria($id_categoria)
    {

        /*
        PDO::prepare() - Prepares a statement for execution and returns a statement object
        */
        $sql = "SELECT * FROM categoria WHERE id_categoria =:id";
        $qry = $this->db->prepare($sql);
        $qry->bindValue(":id", $id_categoria);
        $qry->execute();

        return $qry->fetch(\PDO::FETCH_OBJ);
    }

    public function excluir($id_categoria)
    {
        $sql = "DELETE FROM categoria WHERE id_categoria =:id";
        $qry = $this->db->prepare($sql);
        $qry->bindValue(":id", $id_categoria);
        $qry->execute();
    }

    public function Inserir($categoria, $ativo_categoria)
    {
        $sql = "INSERT INTO categoria SET categoria =:categoria, ativo_categoria =:ativo_categoria";
        $qry = $this->db->prepare($sql);
        $qry->bindValue(":categoria", $categoria);
        $qry->bindValue(":ativo_categoria", $ativo_categoria);
        $qry->execute();

        return $this->db->lastInsertId();
    }

    public function Editar($id_categoria, $categoria, $ativo_categoria)
    {
        $sql = "UPDATE categoria SET categoria =:categoria, ativo_categoria =:ativo_categoria WHERE id_categoria =:id";
        $qry = $this->db->prepare($sql);
        $qry->bindValue(":categoria", $categoria);
        $qry->bindValue(":ativo_categoria", $ativo_categoria);
        $qry->bindValue(":id", $id_categoria);
        $qry->execute();
    }

    public function Filtro($pesquisa, $inicio, $LinhasPorPagina)
    {
        $sql = "SELECT * FROM categoria WHERE categoria LIKE :pesquisa  LIMIT $inicio, $LinhasPorPagina";
        $qry = $this->db->prepare($sql);
        $qry->bindValue(":pesquisa", '%' . $pesquisa . '%');
        $qry->execute();
        
        return $qry->fetchAll(\PDO::FETCH_OBJ);
    }

    public function TotalLinhasFiltro($pesquisa)
    {
        $sql = "SELECT count(*) AS total FROM categoria WHERE categoria LIKE :pesquisa";
        $qry = $this->db->prepare($sql);
        $qry->bindValue(":pesquisa", '%' . $pesquisa . '%');
        $qry->execute();

        return $qry->fetch(\PDO::FETCH_OBJ)->total;
    // Estou retornando o valor da coluna total, uso essa seta e seto a coluna que quero retornar
    }
};
