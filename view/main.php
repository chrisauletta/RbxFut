<?php
require_once "../model/TimeJogDAO.php";
require_once "../model/JogadorDAO.php";
require_once "../controller/Jogador.php";
require_once "../controller/Time.php";

$jog = new Jogador;
$time = new JogadorDAO;

$time1 = $time->listarT(1);
$time2 = $time->listarT(2);

//while($i <= count($time)){
//
// echo $time[$i]->getId(), $i."  <br>  ";
//$i++;
//}

//echo $time[10]->getPosicao();
$bola = $time1[5];
$placartime1 = 0;
$placartime2 = 0;
$i = 0;
$posse = 1;

do {

    $ata1 = rand(0 ,2);
    $meia1 = rand(4, 7);
    $zag1 = rand(8,10);
    $ata2 = rand(0 ,2);
    $meia2 = rand(4, 7);
    $zag2 = rand(8,10);




        if($bola->getPosicao() == 'ZAGUEIRO' && $posse == 1) {
            echo $bola->getNome() . " PASSOU A BOLA PARA " . $time1[$meia1]->getNome() . "<br>";
            if ($jog->TrocaPasse($bola->getHabilidade(), $time1[$meia1]->getHabilidade())) {
                $bola = $time1[$meia1];
            }else{
                echo "ERROU O PASSE <br> <br>";
                $bola = $time2[$meia2];
                $posse = 2;
            }
        }

        if($bola->getPosicao() == 'MEIA' && $posse == 1) {
            echo $bola->getNome() . " ESTA COM A BOLA <br> ";
            echo $bola->getNome() . " PASSOU A BOLA PARA " . $time1[$ata1]->getNome() . "<br>";
            if ($jog->TrocaPasse($bola->getHabilidade(), $time1[$ata1]->getHabilidade())) {
                $bola = $time1[$ata1];
                echo $bola->getNome() . " ESTA COM A BOLA<br>";
            }else{
                echo "ERROU O PASSE <br> <br>";
                $bola = $time2[$meia2];
                $posse = 2;
                }
        }


        if ($bola->getPosicao() == 'ATACANTE' && $posse == 1) {
            echo $bola->getNome() . " VAI CHUTAR PARA GOL <br>";
            if ($jog->Chutar(($bola->getHabilidade()))) {
                if ($jog->DefesaGoleiro($time2[3]->getHabilidade())) {
                    echo "GOOOLL <br> <br>";
                    $placartime1++;
                    $bola = $time2[$meia2];
                    echo "STAR FC " . $placartime1 . " ------ RUNN FC " . $placartime2 . "<br>";
                    echo "RECOMESSA O JOGO <br> <br>";
                } else {
                    $bola = $time2[$zag2];
                    echo "DEFENDEU O GOLEIRO ".$time2[3]->getNome()."<br> <br>";
                    echo $time2[3]->getNome()." PASSOU A BOLA PARA ". $bola->getNome() . "<br>";
                    $posse = 2;
                }
            }else{
                $bola = $time2[$zag2];
                echo "ERROU O CHUTE <br> A BOLA E DO GOLEIRO ".$time2[3]->getNome()."<br> <br>";
                echo $time2[3]->getNome()." PASSOU A BOLA PARA ". $bola->getNome() . "<br>";
                $posse = 2;
            }

        }



    if($bola->getPosicao() == 'ZAGUEIRO' && $posse == 2) {
        echo $bola->getNome() . " PASSOU A BOLA PARA " . $time2[$meia2]->getNome() . "<br>";
        if ($jog->TrocaPasse($bola->getHabilidade(), $time2[$meia2]->getHabilidade())) {
            $bola = $time2[$meia2];
        }else{
            echo "ERROU O PASSE <br> <br>";
            $bola = $time1[$meia1];
            $posse = 1;
        }
    }

    if($bola->getPosicao() == 'MEIA' && $posse == 2) {
        echo $bola->getNome() . " ESTA COM A BOLA <br> ";
        echo $bola->getNome() . " PASSOU A BOLA PARA " . $time2[$ata2]->getNome() . "<br>";
        if ($jog->TrocaPasse($bola->getHabilidade(), $time2[$ata2]->getHabilidade())) {
            $bola = $time2[$ata2];
            echo $bola->getNome() . " ESTA COM A BOLA<br>";
        }else{
            echo "ERROU O PASSE <br> <br>";
            $bola = $time1[$meia1];
            $posse = 1;
        }
    }


    if ($bola->getPosicao() == 'ATACANTE' && $posse == 2) {
        echo $bola->getNome() . " VAI CHUTAR PARA GOL<br>";
        if ($jog->Chutar(($bola->getHabilidade()))) {
            if ($jog->DefesaGoleiro($time1[3]->getHabilidade())) {
                echo "GOOOLL <br> <br>";
                $placartime2++;
                $bola = $time1[$meia1];
                $posse = 1;

                echo "STAR FC " . $placartime1 . " ------ RUNN FC " . $placartime2 . "<br>";
                echo "RECOMESSA O JOGO <br> <br>";

            } else {
                $bola = $time1[$zag1];
                echo "DEFENDEU O GOLEIRO ".$time1[3]->getNome()."<br> <br>";
                echo $time1[3]->getNome()." PASSOU A BOLA PARA ". $bola->getNome() . "<br>";
                $posse = 2;
            }
        }else{
            $bola = $time1[$zag1];
            echo "ERROU O CHUTE <br> A BOLA E DO GOLEIRO ".$time1[3]->getNome()."<br> <br>";
            echo $time1[3]->getNome()." PASSOU A BOLA PARA ". $bola->getNome() . "<br>";
            $posse = 1;
        }

    }




$i++;
}while($i < 20 );

echo "STAR FC " . $placartime1 . " ------ RUNN FC " . $placartime2;

//echo $time[1]->getID();
//if ($jog->Passe($time[1]->getHabilidade())){
//    echo "foi lindo";
//}else{
//    echo "nao foi";
//}
?>