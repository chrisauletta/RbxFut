<?php


class Jogador {
private $id;
private $nome;
private $posicao;
private $habilidade;

    /**
     * Jogador constructor.
     * @param $nome
     * @param $posicao
     * @param $habilidade
     */
//    public function __construct($nome, $posicao, $habilidade, $id)
//    {
//        $this->nome = $nome;
//        $this->posicao = $posicao;
//        $this->habilidade = $habilidade;
//        $this->id = $id;
//    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
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

    public function Passe($habilidade1){
        $difpasse = rand(0, 99);

        if ($difpasse < $habilidade1){
           // echo $difpasse;
           // echo "sim";
            return true;
        }else {
            //echo $difpasse;
            //echo "nao";
            return false;
        }
    }

    public function RecebePasse($habilidade2){
        $difpasse = rand(0, 99);

        if ($difpasse < $habilidade2){
            // echo $difpasse;
            // echo "sim";
            return true;
        }else {
            //echo $difpasse;
            //echo "nao";
            return false;
        }
    }

    public function TrocaPasse($h1, $h2){

        if ($this->Passe($h1) && $this->RecebePasse($h2)){
            return true;
        }else{
            return false;
        }
    }

    public function Chutar($habilidade){
        $difchute = rand(0 , 99);
        if ($difchute < $habilidade){
            return true;
        }else{
            return false;
        }
    }

    public function DefesaGoleiro($habilidade){
        $difdefesa = rand(0, 99);
        if ($difdefesa < $habilidade){
        return true;
        }else{
            return false;
        }
    }

}