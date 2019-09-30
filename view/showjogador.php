<?php
require_once "../model/TimeJogDAO.php";
require_once "../model/JogadorDAO.php";
require_once "../controller/Jogador.php";

session_start();
$t = $_SESSION['time'];
if(isset($_GET['salva'])){
    $g = $_GET['salva'];
    $x =  new TimeJogDAO();
    if ($x->salvar($t, $g)){
        $result =  "Jogador Inserido com Sucesso";
        header("Location: showjogador.php?result=$result");
    }else{
        $result =  "Jogador Não foi Inserido";
        header("Location: showjogador.php?result=$result");
    }

}

if(isset($_GET['del'])){
    $g = $_GET['del'];
    $x =  new TimeJogDAO();
    if ($x->deletar($t, $g)){
        $result =  "Jogador Deletado com Sucesso";
        header("Location: showjogador.php?result=$result");
    }else{
        $result =  "Jogador Não foi Deletado";
        header("Location: showjogador.php?result=$result");
    }

}
/*
if(isset($_GET["te"])){
$j = new testejs();
$j->salva($_GET["te"]);
}*/


?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Auto Unity</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
       <!--CUSTOM BASIC STYLES-->
    <link href="assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />

    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />


</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
             <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Menu</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="showjogador.php" > <h2>Rbx Fut</h2></a>
            	
            </div>

            <div class="header-right">

  
             <a href="login.html" class="btn btn-danger" title="Logout"><i class="fa fa-exclamation-circle fa-2x"></i></a>

            </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <div class="user-img-div">

                            <div class="inner-text">
                                <?php
                                echo "Nome: ".$_SESSION['user']. "<br> Departamento: ". $_SESSION['dpt']. "<br>ID do time: " . $_SESSION['time'];
                                ?>

                            </div>
                        </div>

                    </li>
                    <li>
                        <a href="index.php"></i>Home</a>
                    </li>
                    <li>
                        <a href="showjogador.php"></i>Comprar Jogador</a>
                    </li>
                    <li>
                        <a href="Desafio.php"></i>Desafiar</a>
                    </li>
                </ul>

                <!-- /. FINAL LINHA -->
            </div>

        </nav>
        <!-- /. NAV SIDE  -->

                <!--  Inicio do conteudo  -->

        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Escalar Time</h1>
                        <h1 class="page-subhead-line "><?php echo $_GET["result"], $t;?></h1>

                    </div>
                </div>

                  <div class="panel panel-default">
                    <div class="panel-heading">
                            Status
                        </div>
                        <div class="panel-body">
                            <div class="col-md-5">
                            <div class="table-responsive">
                                <table id="cliente" class="table table-striped table-bordered table-hover" style="width: 550px">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Jogador</th>
                                            <th>Posicao</th>
                                            <th>Habilidae</th>
                                            </tr>
                                    </thead>

                                            <?php
                                            $jog = new Jogador;
                                            $jogs = JogadorDAO::listar();
                                            foreach ($jogs as $jog){
                                            ?>
                                        <tr>
                                            <td><?php echo $jog->getId() ?></td>
                                            <td><?php echo $jog->getNome()?></td>
                                            <td><?php echo $jog->getPosicao() ?></td>
                                            <td><?php echo $jog->getHabilidade()?></td>
                                            <td> <a class="btn btn small" href="showjogador.php?salva=<?php echo $jog->getId()?>" role="button">
                                                    <button type="button" class="btn btn-success">Inserir --></button></a></td>
                                        </tr>
                                    <?php } ?>
                                </table>
                            </div>
                            </div>

                                <div class="col-md-5">
                                    <div class="table-responsive">
                                <table id="cliente" class="table table-striped table-bordered table-hover" style="width: 550px">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Jogador</th>
                                        <th>Posicao</th>
                                        <th>Habilidae</th>
                                    </tr>
                                    </thead>

                                    <?php
                                    $jog = new Jogador;
                                    $jogs = JogadorDAO::listarT($t);

                                    foreach ($jogs as $jog){
                                        ?>
                                        <tr>
                                            <td><?php echo $jog->getId() ?></td>
                                            <td><?php echo $jog->getNome()?></td>
                                            <td><?php echo $jog->getPosicao() ?></td>
                                            <td><?php echo $jog->getHabilidade()?></td>
                                            <td> <a class="btn btn small" href="showjogador.php?del=<?php echo $jog->getId()?>" role="button">
                                                    <button type="button" class="btn btn-danger">Tirar</button></a></td>
                                        </tr>
                                    <?php } ?>
                                </table>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
              
            <!-- /. Final do conteudo  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->

    <!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
       <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
    <script src="assets/plugins_graficos/raphael/raphael.min.js"></script>


</body>
</html>
