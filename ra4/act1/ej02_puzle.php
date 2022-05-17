<?php
session_start();

// Piezas correctas
$parejaPiezas = $_SESSION["parejaPiezas"] ?? [[1, 5], [2, 6], [3, 4], [7, 12], [8, 10], [9, 11]];
$puzlesCorrectos = $_SESSION["puzlesCorrectos"] ?? [];

if(!isset($_SESSION["ordenPiezasArriba"]) and !isset($_SESSION["ordenPiezasAbajo"])) {
    $piezasArriba = $piezasAbajo = array_merge(...$parejaPiezas);
    shuffle($piezasArriba);
    shuffle($piezasAbajo);
    
    $_SESSION["ordenPiezasArriba"] = $piezasArriba;
    $_SESSION["ordenPiezasAbajo"] = $piezasAbajo;
}

$piezasArriba = $_SESSION["ordenPiezasArriba"];
$piezasAbajo = $_SESSION["ordenPiezasAbajo"];

if(!isset($_SESSION["piezaSelecArriba"])) {
    $_SESSION["piezaSelecArriba"] = 0;
}

if(!isset($_SESSION["piezaSelecAbajo"])) {
    $_SESSION["piezaSelecAbajo"] = 0;
}

if(isset($_POST["arriba"])) {
    $_SESSION["piezaSelecArriba"] = ($_SESSION["piezaSelecArriba"]+1)%(count($parejaPiezas)*2);

} elseif(isset($_POST["abajo"])) {
    $_SESSION["piezaSelecAbajo"] = ($_SESSION["piezaSelecAbajo"]+1)%(count($parejaPiezas)*2);

} elseif(isset($_POST["confirmar"])) {
    $selecArriba = $_POST["piezaArriba"];
    $selecAbajo = $_POST["piezaAbajo"];

    $search = array_search([$selecArriba, $selecAbajo], $parejaPiezas);
    echo "<br>";
    if(in_array([$selecArriba, $selecAbajo], $parejaPiezas)) {
        array_push($puzlesCorrectos, [$selecArriba, $selecAbajo]);
        $_SESSION["puzlesCorrectos"] = $puzlesCorrectos;
        unset($parejaPiezas[$search]);
        $_SESSION["parejaPiezas"] = $parejaPiezas;
        $_SESSION["ordenPiezasArriba"] = [...array_diff($piezasArriba, [$selecArriba, $selecAbajo])];
        $_SESSION["ordenPiezasAbajo"] = [...array_diff($piezasAbajo, [$selecArriba, $selecAbajo])];
        $_SESSION["piezaSelecArriba"] = 0;
        $_SESSION["piezaSelecAbajo"] = 0;
    }
} elseif(isset($_POST["reiniciar"])) {
    session_destroy();
}

$piezasArriba = $_SESSION["ordenPiezasArriba"];
$piezasAbajo = $_SESSION["ordenPiezasAbajo"];

$iArriba = $_SESSION["piezaSelecArriba"];
$iAbajo = $_SESSION["piezaSelecAbajo"];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Puzles infantiles</title>
</head>
<body>
    <form action="" method="post">
        <?php if(count($parejaPiezas) != 0) { ?>
        <button type="submit" value="arriba" name="arriba"><img src="./piezas/<?= $piezasArriba[$iArriba] ?>.JPG"></button>
        <input type="hidden" name="piezaArriba" value="<?= $piezasArriba[$iArriba] ?>">
        <br>
        <button type="submit" value="abajo" name="abajo"><img src="./piezas/<?= $piezasAbajo[$iAbajo] ?>.JPG"></button>
        <input type="hidden" name="piezaAbajo" value="<?= $piezasAbajo[$iAbajo] ?>">
        <button type="submit" value="confirmar" name="confirmar">Confirmar</button>
        <?php } else { ?>
        <p>¡Has ganado!</p>
        <button type="submit" name="reiniciar">Volver a jugar</button>
        <?php } ?>
    </form>
</body>
</html>