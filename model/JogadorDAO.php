<?php

include "../controller/ConexaoPDO.php";
include_once "../controller/Jogador.php";

class JogadorDAO{

    public static function salvar(){

        $nome = $_POST['nome'];
        $posicao = $_POST['posicao'];
        $habilidade = $_POST['habilidade'];
        $sql = "INSERT INTO `JOGADOR`(`NOME_JOGADOR`, `POSICAO`, `HABILIDADE`) VALUES ('$nome','$posicao',$habilidade);";
        $sth = Conexao::getConexao()->prepare($sql);
        if ($sth->execute()){
            echo "salvo1";
        }else{
            echo "nao foi1";
        }

    }


    public static function listar(){
    $sql = "SELECT id_jogador, nome_jogador, posicao, habilidade FROM JOGADOR;";
    $sth = Conexao::getConexao()->prepare($sql);
    $sth->execute();

    $jogadores = Array();
    while ($jogadorDB = $sth->fetch(PDO::FETCH_OBJ)){
        $jogador = new Jogador();
        $jogador->setId($jogadorDB->id_jogador);
        $jogador->setNome($jogadorDB->nome_jogador);
        $jogador->setPosicao($jogadorDB->posicao);
        $jogador->setHabilidade($jogadorDB->habilidade);
        $jogadores[] = $jogador;
    }
    return $jogadores;
    }



    public static function listarT($x){
        $sql2 = "SELECT J.ID_JOGADOR AS 'id_jogador', J.NOME_JOGADOR AS 'nome_jogador', J.POSICAO AS 'posicao', J.HABILIDADE AS 'habilidade' 
FROM TIME_JOG AS TI
INNER JOIN JOGADOR AS J
ON TI.ID_JOGADOR = J.ID_JOGADOR
WHERE TI.ID_TIME = $x
ORDER BY J.POSICAO;";
        $sth2 = Conexao::getConexao()->prepare($sql2);
        $sth2->execute();

        $jogadores = Array();
        while ($jogadorDB = $sth2->fetch(PDO::FETCH_OBJ)){
            $jogador = new Jogador();
            $jogador->setId($jogadorDB->id_jogador);
            $jogador->setNome($jogadorDB->nome_jogador);
            $jogador->setPosicao($jogadorDB->posicao);
            $jogador->setHabilidade($jogadorDB->habilidade);
            $jogadores[] = $jogador;
        }
        return $jogadores;
    }

}

//
//$id = 0;
//
//$sql = "SELECT * FROM JOGADOR WHERE 'ID_JOGADOR' = $id";
//$sth = Conexao::getConexao()->prepare($sql);
////$sth->bindValue(":idCidade", $idCidade, PDO::PARAM_INT);
//$sth->execute();
//
//
//
//if ( $result = $sth->fetch(PDO::FETCH_OBJ) ) {
//        print_r($result);
//
//} else {
//    echo "Nennhum resultado retornado.";
//}