<?php

namespace app\models;

use app\core\Model;

class UnidadeModel extends Model
{
    public function Inserir($unidade, $abrev_unidade)
    {
        $sql = "INSERT INTO unidade SET unidade = :unidade, abrev_unidade = :abrev_unidade";
        $qry = $this->db->prepare($sql);
        $qry->bindValue("unidade", $unidade);
        $qry->bindValue("abrev_unidade", $abrev_unidade);
        $qry->execute();

        return $this->db->lastInsertId();
    }

    public function Editar($id_unidade, $unidade, $abrev_unidade)
    {
        $sql = "UPDATE unidade SET unidade =:unidade, abrev_unidade =:abrev_unidade WHERE id_unidade =:id_unidade";
        $qry = $this->db->prepare($sql);
        $qry->bindValue(":unidade", $unidade);
        $qry->bindValue(":abrev_unidade", $abrev_unidade);
        $qry->bindValue(":id_unidade", $id_unidade);
        $qry->execute();

    }

    public function Lista()
    {
        $sql = "SELECT * FROM unidade";
        $qry = $this->db->prepare($sql);
        $qry->execute();

        return $qry->fetchAll(\PDO::FETCH_OBJ);

    }
    
    public function Filtro($pesquisa, $inicio, $LinhasPorPagina)
    {
        $sql = "SELECT * FROM unidade WHERE unidade LIKE :pesquisa  LIMIT $inicio, $LinhasPorPagina";
        $qry = $this->db->prepare($sql);
        $qry->bindValue(":pesquisa", '%' . $pesquisa . '%');
        $qry->execute();
        
        return $qry->fetchAll(\PDO::FETCH_OBJ);
    }

    public function TotalLinhasFiltro($pesquisa)
    {
        $sql = "SELECT count(*) AS total FROM unidade WHERE unidade LIKE :pesquisa";
        $qry = $this->db->prepare($sql);
        $qry->bindValue(":pesquisa", '%' . $pesquisa . '%');
        $qry->execute();

        return $qry->fetch(\PDO::FETCH_OBJ)->total;

    }

    public function getTotal(){
        $sql = "SELECT count(*) AS total FROM unidade";
        $qry = $this->db->prepare($sql);
        $qry->execute();

        return $qry->fetch(\PDO::FETCH_OBJ)->total;
    }
};
