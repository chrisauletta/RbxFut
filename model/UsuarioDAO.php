<?php
include "../controller/ConexaoPDO.php";

class UsuarioDAO
{

    public static function salvar(){

        $nome = $_POST['nome'];
        $departamento = $_POST['departamento'];
        $login = $_POST['login'];
        $senha  = $_POST['pass'];
        $time= $_POST['time'];
        $sql = "INSERT INTO `TIME`(`NOME_TIME`) VALUES ('$time');";
        $sth = Conexao::getConexao()->prepare($sql);
        if ($sth->execute()){
            $sql2 = "INSERT INTO `USUARIO`(`LOGIN`, `SENHA`, `NOME_USUARIO`, `DEPARTAMENTO`,`ID_TIME`) SELECT '$login','$senha','$nome','$departamento', MAX(ID_TIME) FROM TIME;";
            $sth2 = Conexao::getConexao()->prepare($sql2);
                if ($sth2->execute()){
                    return true ;
                }else{
                    return false;
                }
        }else{
            return false;
        }

    }


    public static function login($login, $pass){

            $logar = "SELECT * FROM USUARIO WHERE login = ? AND senha = ?";
            $sth = Conexao::getConexao()->prepare($logar);
            $sth->bindValue(1, $login);
            $sth->bindValue(2, $pass);
            $sth->execute();
            if ($sth->rowcount() > 0){
                $dados = $sth->fetch(PDO::FETCH_ASSOC);
                $_SESSION['logado'] =  true;
                $_SESSION['user'] = $dados["NOME_USUARIO"];
                $_SESSION['dpt'] = $dados['DEPARTAMENTO'];
                $_SESSION['time'] = $dados['ID_TIME'];
                header("Location: index.php");
                return true;
            } else{
            return false;
            }
        }


}