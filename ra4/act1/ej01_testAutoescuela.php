<?php
include "./config/tests_cnf.php";
/**
 * Ejercicio 1. Desarrollo de un sistema de test online para una autoescuela.
 * Los test se encuentran almacenados en un array asociativo dentro de un directorio de
 * configuración. Cada test utiliza un directorio para almacenar las fotos que necesita. El nombre de la
 * carpeta es la concatenación de la cadena img y el número de test. Por ejemplo, para el test 1 las imágenes
 * se guardan en el directorio img1. El nombre de cada foto coincide con el número de pregunta.
 * 
 * - Incorpora el array de test desde el directorio de configuración.
 * - Genera dinámicamente un formulario para que los alumn@s puedan realizar el test.
 * - El sistema debe detectar si existe imagen asociada a la pregunta para mostrarla.
 * - Procesa el formulario de manera que la aplicación informe del número de aciertos y utilice un
 * código de colores para indicar si se ha superado el examen. El test se considera superado si no se
 * han cometido más de dos errores.
 * - Cuando el alumn@ conecta con la aplicación el sistema le indicará el último test realizado y
 * mostrará el siguiente para su realización.
 * - Incorpora a la aplicación un botón que permita al alumn@ empezar a realizar los test desde el principio.
 * - Aplica criterios de usabilidad en el diseño.
 * 
 * @author David Pérez Ruiz
 */

session_start();

// function compruebaRespuestas($idTest)
// {
//     print_r($aTests);
//     $respuestasIncorrectas = 0;
//     for($i = 0; $i < count($aTests[$idTest-1]["Preguntas"]); $i++) {
//         if($aTests[$idTest-1]["Corrector"][$i] !=  $_SESSION["respuestasUsuario"][$idTest]["pregunta" . $i+1]) {
//             $respuestasIncorrectas++;
//         }
//     }
//     return $respuestasIncorrectas;
// }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="David Pérez Ruiz">
    <title>Test online de autoescuela</title>
</head>
<body>
    <h1>Inicio</h1>
    <p>Escoja un test:</p>
    <form action="test.php" method="POST">
        <select name="testSelect">
            <?php foreach ($aTests as $value) { ?>
                <option value="<?= $value["idTest"] ?>"><?= $value["idTest"] . '. ' . $value["Permiso"] . ", " . $value["Categoria"] ?></option>
            <?php } ?>
        </select>
        <input type="submit" value="Empezar" name="empezar">
    </form>
    <table border=1>
        <tr>
            <th>Test 1:</th>
            <td><?= $_SESSION["respuestasUsuario"][1]["incorrectas"] ?> incorrectas.</td>
        </tr>
        <tr>
            <th>Test 2:</th>
            <td><?= $_SESSION["respuestasUsuario"][2]["incorrectas"] ?> incorrectas.</td>
        </tr>
        <tr>
            <th>Test 3:</th>
            <td><?= $_SESSION["respuestasUsuario"][3]["incorrectas"] ?> incorrectas.</td>
        </tr>
    </table>
</body>
</html>