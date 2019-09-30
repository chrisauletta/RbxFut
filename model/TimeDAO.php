<?php
include_once "../controller/ConexaoPDO.php";

class TimeDAO
{

    public static function lista(){
        $sql = "SELECT * FROM TIME;";
        $sth = Conexao::getConexao()->prepare($sql);
        $sth->execute();
        if ($sth->rowcount() > 0) {
            return $sth->fetchAll(PDO::FETCH_ASSOC);
        }else {
            return false;
        }
    }

    public static function nomeT($t){
        $sql = "SELECT * FROM TIME WHERE ID_TIME = $t;";
        $sth = Conexao::getConexao()->prepare($sql);
        $sth->execute();
        if ($sth->rowcount() > 0) {
            return $sth->fetch(PDO::FETCH_OBJ);
        }else{
            return false;
        }
    }
}