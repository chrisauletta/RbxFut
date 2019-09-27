<?php


class Atleta
{
    private $nome;
    private $posicao;
    private $habilidade;

    /**
     * Jogador constructor.
     * @param $nome
     * @param $posicao
     * @param $habilidade
     */
    public function __construct($nome, $posicao, $habilidade)
    {
        $this->nome = $nome;
        $this->posicao = $posicao;
        $this->habilidade = $habilidade;
    }

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

    /**
     * @return mixed
     */
    public function getPosicao()
    {
        return $this->posicao;
    }

    /**
     * @param mixed $posicao
     */
    public function setPosicao($posicao)
    {
        $this->posicao = $posicao;
    }

    /**
     * @return mixed
     */
    public function getHabilidade()
    {
        return $this->habilidade;
    }

    /**
     * @param mixed $habilidade
     */
    public function setHabilidade($habilidade)
    {
        $this->habilidade = $habilidade;
    }

    public function Passe(){
        $difpasse = rand(0, 99);

        if ($difpasse < $this->habilidade){
            return true;
        }else {
            return false;
        }
    }
}