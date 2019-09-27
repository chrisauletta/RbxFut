<?php

class TimeJogDAO{

    public static function salvar($g){
        //$g = $_POST["habilidade"];
        echo $g;
        if (isset($g)) {
            $sql = "INSERT INTO `TIME_JOG`(`ID_TIME`, `ID_JOGADOR`) VALUES ('1',$g);";
            $sth = Conexao::getConexao()->prepare($sql);
            if ($sth->execute()) {
                return true;
            } else {
                return false;
            }
        }else {
            return false;
        }
    }

    public static function deletar($g){
        echo $g;
        if (isset($g)) {
            $sql = " DELETE FROM TIME_JOG WHERE ID_JOGADOR = $g AND ID_TIME = 1;";
            $sth = Conexao::getConexao()->prepare($sql);
            if ($sth->execute()) {
                return true;
            } else {
                return false;
            }
        }else {
            return false;
        }
    }
}