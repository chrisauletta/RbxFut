<?php


class Conexao
{

    private static $conexao;

    /**
     * @return PDO Conexão com Banco de dados
     */
    public static function getConexao()
    {
        if (!self::$conexao) {
            self::$conexao = new PDO("mysql:host=localhost;dbname=RBX", "christian", "1234");
            self::$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$conexao;
    }
}