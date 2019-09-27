<?php

require_once "Jogador.php";


class Time
{
    private $nome;
    private $time = array();




    /**
     * Time constructor.
     * @param $nome
     */

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function AddJogador($j){
        $this->time[] = $j;
    }

    public function PegaJogador($n){
        return $this->time[$n];
    }



}