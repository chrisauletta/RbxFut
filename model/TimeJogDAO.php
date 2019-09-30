<?php

class TimeJogDAO{

    public static function salvar($t, $j){
        //$g = $_POST["habilidade"];
        //echo $g;
        if (isset($j)) {
            $sql = "INSERT INTO `TIME_JOG`(`ID_TIME`, `ID_JOGADOR`) VALUES ($t,$j);";
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

    public static function deletar($t, $g){
        echo $g;
        if (isset($g)) {
            $sql = " DELETE FROM TIME_JOG WHERE ID_JOGADOR = $g AND ID_TIME = $t;";
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