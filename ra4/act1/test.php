<?php
include "./config/tests_cnf.php";
if(!isset($_POST["empezar"]) and !isset($_POST["enviar"])) {
    header("Location: ej01_testAutoescuela.php");
}
session_start();

if(isset($_POST["empezar"])) {
    $_SESSION["ID"] = $_POST["testSelect"];
    $_SESSION["respuestasUsuario"][$_POST["testSelect"]] = [];
}
$id = $_SESSION["ID"];

if(isset($_SESSION["Test"]) and $_SESSION["Test"]["idTest"] == $id) {
    $test = $_SESSION["Test"];
} else {
    $test = $aTests[$_POST["testSelect"]-1];
    $_SESSION["Test"] = $test;
}
$preguntasTest = $test["Preguntas"];
$opciones = ["a", "b", "c"];
$dirImagenes = "dir_img_test" . $test["idTest"];

if(isset($_POST["enviar"])) {
    $_SESSION["respuestasUsuario"][$id] = $_POST;
    unset($_SESSION["respuestasUsuario"][$id]["enviar"]);
}

$respuestasUsuario = $_SESSION["respuestasUsuario"][$id];
$_SESSION["respuestasUsuario"][$id]["incorrectas"] = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="David Pérez Ruiz">
    <title><?= $test["idTest"] . ". " . $test["Categoria"] ?></title>
</head>
<body>
    <h1><?= $test["idTest"] . ". " . $test["Categoria"] ?></h1>
    <a href="./ej01_testAutoescuela.php">Volver al inicio</a>
    <form action="" method="POST">
        <?php for($i = 0; $i < count($preguntasTest); $i++) { ?>
            <p><?= $preguntasTest[$i]["Pregunta"] ?></p>
            <?php
                $fileName = $dirImagenes. '/img'. $i.'.jpg';
                if(file_exists($fileName)) { ?>
                    <img src="<?= $fileName ?>"> </br>
                <?php }
            ?>
            <?php 
                $respuestas = $preguntasTest[$i]["respuestas"];
                for($j = 0; $j < count($respuestas); $j++) { ?>
                    <input type="radio" name="<?= "pregunta" . $i+1  ?>" value="<?= $opciones[$j] ?>"
                    <?php if($opciones[$j] == $respuestasUsuario["pregunta" . $i+1]) { ?>
                        checked
                    <?php } ?>
                    > <?= $respuestas[$j] ?>
                    <?php if(isset($_POST["enviar"])) {
                        if($test["Corrector"][$i] == $opciones[$j]) { ?>
                            ✓
                        <?php } else if($test["Corrector"][$i] != $opciones[$j] and $respuestasUsuario["pregunta" . $i+1] == $opciones[$j]) { ?>
                            ✗
                        <?php $_SESSION["respuestasUsuario"][$id]["incorrectas"]++;
                     } ?>
                    <?php } ?>
                    <br>
                <?php }
            ?>
        <?php }
        // Contar como incorrectas las respuestas en blanco
        if (count($respuestasUsuario) < count($preguntasTest)) {
            $_SESSION["respuestasUsuario"][$id]["incorrectas"] += (count($preguntasTest) - count($respuestasUsuario));
        } 
        
        // Quitar el botón enviar una vez realizado el test
        if(!isset($_POST["enviar"])) { ?>
            <input type="submit" value="Enviar" name="enviar">  
        <?php } ?>
    </form>
</body>
</html>