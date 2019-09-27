<?php

require "../model/JogadorDAO.php";

if(isset($_POST['nome'])){
    $x =  new JogadorDAO;
    $x->salvar();
}

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
            <a class="navbar-brand" href="showjogador.php" > <h2>Auto Unity</h2></a>

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
                            Usuario: Luiz Otavio
                        </div>
                    </div>

                </li>
                <li>
                    <a href="showjogador.php"><i class="fa fa-dashboard "></i>Home</a>
                </li>
                <li>
                    <a href="historico.html"><i class="fa fa-yelp "></i>Historico de OS </a>
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
                    <h1 class="page-head-line">Monitoramento</h1>
                    <h1 class="page-subhead-line">Status do seu veiculo</h1>

                </div>
            </div>

            <div class="container" style="margin-top: 40px; width: 500px;">

                <form method="post" >
                    <input type="hidden" name="method" value="inserir">
                    <div class="form-group">
                        <label>Nome do Jogador</label>
                        <input type="text" class="form-control" name="nome" >
                    </div>
                    <div class="form-group">
                        <label>Posição</label>
                        <input type="text" class="form-control" name="posicao">
                    </div>
                    <div class="form-group">
                        <label>Habilidade</label>
                        <input type="number" class="form-control" name="habilidade">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
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