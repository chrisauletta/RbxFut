<?php
session_start();
require "../model/UsuarioDAO.php";

if (isset($_POST["cadastrar"])){
    $login = $_POST["login"];
    $pass =  $_POST["pass"];
    $x =  new UsuarioDAO();
    if($x->login($login, $pass)){
    }else{
        header("Location: loginUsuario.php?result=Usuario ou senha invalidor");
    }
}

?>

<!DOCTYPE html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <title>RBX FUT</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!--CUSTOM BASIC STYLES-->
    <link href="assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />


</head>

<body style="background-color: #E2E2E2;">
<div class="container">
    <div class="row text-center " style="padding-top:100px;">
        <div class="col-md-12">

            <h1>Rbx Fut</h1>

        </div>
    </div>
    <div class="row ">
    <h3><?php echo $_GET["result"];?></h3>
        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">

            <div class="panel-body">
                <form role="form" method="post">
                    <hr />
                    <h5>Insira Login e Senha</h5>
                    <br />
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                        <input type="text" class="form-control" name="login" />
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                        <input type="password" class="form-control" name="pass" />
                    </div>

                    <button type="submit" class="btn btn-primary" name="cadastrar" value="ok">Enter</button>
                    <hr />
                    Não tem login ? <a href="index.html" >click aqui </a>
                </form>
            </div>

        </div>


    </div>
</div>

</body>
</html>