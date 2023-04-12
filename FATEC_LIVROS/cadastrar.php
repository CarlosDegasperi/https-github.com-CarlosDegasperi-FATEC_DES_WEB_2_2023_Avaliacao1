<?php
    session_start();

    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: index.php");
        exit;
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if( $_POST['name'] != ""  &&   $_POST['genero'] != "" && $_POST['autor'] != "" && $_POST['isbn'] != "")  {
            $nome = $_POST['name'];
            $genero = $_POST['genero'];
            $autor = $_POST['autor']; 
            $isbn = $_POST['isbn'];
            $filename = "LIVROS.TXT";
        
            // ATENCAO: Verificar se o arquivo existe
            if (!file_exists($filename)) {
                // Abrir no Modo Write
                $handle = fopen($filename, "w");
            } else {
                // Abir no Modo Append
                $handle = fopen($filename, "a");
            }
            fwrite($handle,"$nome,$genero,$autor,$isbn \n");
            fflush($handle);
            fclose($handle);
            header("location: inicio.php");
        }
    }
      
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 450px; padding: 20px;  margin: auto; margin-top: 50px;}
        .text-black{ color: black !important; font-weight: bold; margin-bottom: 15px; }
        .btn-right{ float: right !important; margin-right: 10px; margin-top: 12px;}
    </style>
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <h3><a class="text-black" href="inicio.php">Cadastro de Livros - FATEC</a></h3>
            </div>
            <div class="btn-right ">
                <a href="logout.php" class="btn btn-danger">Sair</a>
            </div>
        </div>
    </nav>
    <div class="wrapper">
        <h2>Cadastro de Livros</h2>
        <form action="cadastrar.php" method="post">
            <div class="form-group">
                <label>Nome</label>
                <input type="text" name="name" class="form-control" value="">
                <span class="help-block"></span>
            </div>    
            <div class="form-group">
                <label>Genero</label>
                <input type="text" name="genero" class="form-control" value="">
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <label>Autor</label>
                <input type="text" name="autor" class="form-control" value="">
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <label>Codigo ISBN</label>
                <input type="text" name="isbn" class="form-control" value="">
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Cadastrar">
            </div>
            
        </form>
    </div>    
</body>
</html>