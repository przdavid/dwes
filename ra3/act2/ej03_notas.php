<?php
/**
 * Ejercicio 3. Notas académicas.
 * A partir de un array que almacene los datos de la primera y segunda evaluación de los
 * alumnos de 2º DAW, mostrar un menú de navegación que muestre la siguiente información:
 *
 * Listado de alumnados con las notas de la primera y segunda evaluación, junto con su nota media.
 * Asignatura con mayor número de aprobados.
 * Asignatura con mayor número de suspensos.
 * Número de aprobados en cada asignatura.
 * Generación de boletines de notas en función de la evaluación seleccionada en una lista desplegable.
 *
 * @author David Pérez Ruiz
 */

 // Inicialización de variables
 $listarNotas = false;
 $aprobados = false;
 $numAprobados = false;
 $listarBoletin = false;
 $media = 0;
 $evaluacionEscogida = $_POST["evaluacion"];
 $traduccion = ["1EV" => "Primera evaluación", "2EV" => "Segunda evaluación"];

 // Array de alumnos con sus respectivas notas
 $notasAlumnos = [
     "Daniel Ayala Cantador" => ["1EV" => ["DWES" => 5, "DWEC" => 5, "DIW" => 3, "DAWEB" => 1, "EIE" => 3, "HLC" => 10],
                                 "2EV" => ["DWES" => 6, "DWEC" => 5, "DIW" => 6, "DAWEB" => 4, "EIE" => 6, "HLC" => 5]],
     "Joaquín Baena Salas" => ["1EV" =>  ["DWES" => 3, "DWEC" => 4, "DIW" => 8, "DAWEB" => 8, "EIE" => 9, "HLC" => 0],
                               "2EV" => ["DWES" => 2, "DWEC" => 4, "DIW" => 4, "DAWEB" => 5, "EIE" => 8, "HLC" => 4]],
     "Manuel Brito" => ["1EV" => ["DWES" => 0, "DWEC" => 8, "DIW" => 4, "DAWEB" => 4, "EIE" => 8, "HLC" => 6],
                        "2EV" => ["DWES" => 5, "DWEC" => 10, "DIW" => 7, "DAWEB" => 4, "EIE" => 7, "HLC" => 10]],
     "Javier Cebrián Muñoz" => ["1EV" => ["DWES" => 0, "DWEC" => 3, "DIW" => 1, "DAWEB" => 2, "EIE" => 6, "HLC" => 4],
                                "2EV" => ["DWES" => 4, "DWEC" => 6, "DIW" => 0, "DAWEB" => 5, "EIE" => 5, "HLC" => 5]],
     "Carlos Chaves" => ["1EV" => ["DWES" => 1, "DWEC" => 8, "DIW" => 3, "DAWEB" => 3, "EIE" => 7, "HLC" => 3],
                         "2EV" => ["DWES" => 3, "DWEC" => 10, "DIW" => 6, "DAWEB" => 3, "EIE" => 9, "HLC" => 5]],
     "Jesús Díaz Rivas" => ["1EV" => ["DWES" => 2, "DWEC" => 8, "DIW" => 3, "DAWEB" => 3, "EIE" => 2, "HLC" => 7],
                            "2EV" => ["DWES" => 3, "DWEC" => 8, "DIW" => 7, "DAWEB" => 3, "EIE" => 6, "HLC" => 10]],
     "Javier Epifanio López" => ["1EV" => ["DWES" => 7, "DWEC" => 6, "DIW" => 8, "DAWEB" => 5, "EIE" => 0, "HLC" => 7],
                                 "2EV" => ["DWES" => 5, "DWEC" => 4, "DIW" => 9, "DAWEB" => 10, "EIE" => 1, "HLC" => 10]],
     "Javier Fernández Rubio" => ["1EV" => ["DWES" => 2, "DWEC" => 3, "DIW" => 5, "DAWEB" => 0, "EIE" => 10, "HLC" => 0],
                                  "2EV" => ["DWES" => 2, "DWEC" => 5, "DIW" => 5, "DAWEB" => 2, "EIE" => 10, "HLC" => 0]],
     "Tomás Hidalgo" => ["1EV" => ["DWES" => 7, "DWEC" => 5, "DIW" => 5, "DAWEB" => 5, "EIE" => 8, "HLC" => 9],
                         "2EV" => ["DWES" => 7, "DWEC" => 5, "DIW" => 5, "DAWEB" => 4, "EIE" => 7, "HLC" => 8]],
     "Carlos Hidalgo Risco" => ["1EV" => ["DWES" => 0, "DWEC" => 3, "DIW" => 7, "DAWEB" => 4, "EIE" => 8, "HLC" => 3],
                                "2EV" => ["DWES" => 0, "DWEC" => 5, "DIW" => 10, "DAWEB" => 3, "EIE" => 10, "HLC" => 6]],
     "Laura Hidalgo Rivera" => ["1EV" => ["DWES" => 8, "DWEC" => 3, "DIW" => 5, "DAWEB" => 5, "EIE" => 8, "HLC" => 6],
                                "2EV" => ["DWES" => 10, "DWEC" => 8, "DIW" => 8, "DAWEB" => 4, "EIE" => 10, "HLC" => 10]],
     "Virginia Ordoño" => ["1EV" => ["DWES" => 3, "DWEC" => 9, "DIW" => 2, "DAWEB" => 0, "EIE" => 8, "HLC" => 3],
                           "2EV" => ["DWES" => 3, "DWEC" => 9, "DIW" => 1, "DAWEB" => 2, "EIE" => 9, "HLC" => 6]],
     "David Pérez Ruiz" => ["1EV" => ["DWES" => 1, "DWEC" => 2, "DIW" => 3, "DAWEB" => 4, "EIE" => 5, "HLC" => 6],
                            "2EV" => ["DWES" => 5, "DWEC" => 2, "DIW" => 7, "DAWEB" => 5, "EIE" => 7, "HLC" => 5]],
     "Alejandro Rabadán Rivas" => ["1EV" => ["DWES" => 0, "DWEC" => 9, "DIW" => 8, "DAWEB" => 2, "EIE" => 1, "HLC" => 5],
                                   "2EV" => ["DWES" => 2, "DWEC" => 10, "DIW" => 7, "DAWEB" => 6, "EIE" =>41, "HLC" => 10]],
     "Rubén Ramírez Rivera" => ["1EV" => ["DWES" => 10, "DWEC" => 8, "DIW" => 1, "DAWEB" => 9, "EIE" => 10, "HLC" => 6],
                                "2EV" => ["DWES" => 9, "DWEC" => 7, "DIW" => 3, "DAWEB" => 10, "EIE" => 8, "HLC" => 9]],
     "David Rosas Alcaraz" => ["1EV" => ["DWES" => 1, "DWEC" => 5, "DIW" => 5, "DAWEB" => 8, "EIE" => 3, "HLC" => 1],
                               "2EV" => ["DWES" => 3, "DWEC" => 4, "DIW" => 8, "DAWEB" => 7, "EIE" => 2, "HLC" => 1]],
     "Manuel Solar Bueno" => ["1EV" => ["DWES" => 10, "DWEC" => 10, "DIW" => 6, "DAWEB" => 7, "EIE" => 8, "HLC" => 2],
                              "2EV" => ["DWES" => 10, "DWEC" => 8, "DIW" => 8, "DAWEB" => 9, "EIE" => 6, "HLC" => 4]],
     "Andrea Solís Tejada" => ["1EV" => ["DWES" => 10, "DWEC" => 5, "DIW" => 2, "DAWEB" => 7, "EIE" => 4, "HLC" => 2],
                               "2EV" => ["DWES" => 10, "DWEC" => 9, "DIW" => 7, "DAWEB" => 8, "EIE" => 8, "HLC" => 4]],
     "Guillermo Tamajón" => ["1EV" => ["DWES" => 7, "DWEC" => 3, "DIW" => 6, "DAWEB" => 8, "EIE" => 0, "HLC" => 4],
                             "2EV" => ["DWES" => 7, "DWEC" => 5, "DIW" => 10, "DAWEB" => 6, "EIE" => 1, "HLC" => 2]],
     "Sergio vera Jurado" => ["1EV" => ["DWES" => 1, "DWEC" => 7, "DIW" => 4, "DAWEB" => 0, "EIE" => 8, "HLC" => 9],
                              "2EV" => ["DWES" => 1, "DWEC" => 6, "DIW" => 6, "DAWEB" => 4, "EIE" => 6, "HLC" => 10]],
     "Rafael Yuste Barrera" => ["1EV" => ["DWES" => 5, "DWEC" => 7, "DIW" => 9, "DAWEB" => 3, "EIE" => 9, "HLC" => 0],
                                "2EV" => ["DWES" => 8, "DWEC" => 10, "DIW" => 10, "DAWEB" => 4, "EIE" => 9, "HLC" => 2]]
 ];

 // Banderas
 if (isset($_POST["listar"])) {
     $listarNotas = true;
 }

 if (isset($_POST["aprobados"])) {
     $aprobados = true;
 }

 if (isset($_POST["suspensos"])) {
     $suspensos = true;
 }

 if (isset($_POST["numAprobados"])) {
     $numAprobados = true;
 }

 if (isset($_POST["boletin"])) {
     $listarBoletin = true;
 }

 //
 $numAprobSuspensos = ["aprobados" => [],
                       "suspensos" => []];
 foreach ($notasAlumnos as $alumno => $boletin) {
    foreach ($boletin as $evaluacion => $notas) {
            foreach ($notas as $asignatura => $nota) {
                if ($nota >= 5) {
                     $numAprobSuspensos["aprobados"][$evaluacion][$asignatura]++;
                } else {
                    $numAprobSuspensos["suspensos"][$evaluacion][$asignatura]++;
                }
            }
        }
    }
    // echo "<pre>" . print_r($numAprobSuspensos, true) . "</pre>";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <style>
        .opcion {
            margin-block: 5px;
        }

        .media {
            background-color: yellow;
            inline-size: 120px;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="David Pérez Ruiz">
    <title>Notas académicas</title>
</head>
<body>
    <h1>Notas académicas</h1>
    <p>
        A partir de un array que almacene los datos de la primera y segunda evaluación de los
        alumnos de 2º DAW, mostrar un menú de navegación que muestre la siguiente información:
        <ul>
            <li>Listado de alumnados con las notas de la primera y segunda evaluación, junto con su nota media.</li>
            <li>Asignatura con mayor número de aprobados.</li>
            <li>Asignatura con mayor número de suspensos.</li>
            <li>Número de aprobados en cada asignatura.</li>
            <li>Generación de boletines de notas en función de la evaluación seleccionada en una lista desplegable.</li>
        </ul>
    </p>
    <form action="" method="POST">
        <div class="opcion">
            <input type="submit" value="Listar alumnos" name="listar">
        </div>
        <div class="opcion">
            <input type="submit" value="Asignatura con más aprobados" name="aprobados">
        </div>
        <div class="opcion">
            <input type="submit" value="Asignatura con más suspensos" name="suspensos">
        </div>
        <div class="opcion">
            <input type="submit" value="Nº de aprobados por asignatura" name="numAprobados">
        </div>
        <div class="opcion">
            <select name="evaluacion" id="evaluacion">
                <option value="1EV">1ª Evaluación</option>
                <option value="2EV">2ª Evaluación</option>
            </select>
            <input type="submit" value="Generar boletín" name="boletin">
        </div>
    </form>

    <?php if($listarNotas) { ?>
        <h2>Lista de alumnos</h2>
        <?php foreach($notasAlumnos as $alumno => $boletin) { ?>
            <h3><?= $alumno ?></h3>
            <ul>
                <?php foreach($boletin as $evaluacion => $notas) { ?>
                    <?php if($evaluacion == "1EV") { ?>
                        <li>Primera evaluación</li>
                        <ul>
                        <?php foreach($notas as $asignatura => $nota) { ?>
                            <li><?= $asignatura ?>: <?= $nota ?></li>
                            <?php $media += $nota/count($notas) ?>
                        <?php } ?>
                            <li class="media">Media: <?= round($media) ?></li>
                        </ul>
                    <?php } ?>
                    <?php $media = 0 ?>
                    <?php if($evaluacion == "2EV") { ?>
                        <li>Segunda evaluación</li>
                        <ul>
                        <?php foreach($notas as $asignatura => $nota) { ?>
                            <li><?= $asignatura ?>: <?= $nota ?></li>
                            <?php $media += $nota/count($notas) ?>
                        <?php } ?>
                            <li class="media">Media: <?= round($media) ?></li>
                        </ul>
                    <?php } ?>
                    <?php $media = 0 ?>
                <?php } ?>
            </ul>
        <?php } ?>
    <?php } ?>
    <?php if($aprobados) { ?>
        <h2>Asignatura con más aprobados</h2>
        <ul>
        <?php foreach ($numAprobSuspensos["aprobados"] as $evaluacion => $asignaturas) { ?>
            <li><?= $traduccion[$evaluacion] ?>:
            <ul>
                <?php foreach (array_keys($asignaturas, max($asignaturas)) as $asignatura) { ?>
                    <li><?= $asignatura ?>: <?= $asignaturas[$asignatura] ?> aprobados</li>
                <?php } ?>
            </ul>
        </li>
        <?php } ?>
    </ul>
    <?php } ?>
    <?php if($suspensos) { ?>
        <h2>Asignatura con más suspensos</h2>
        <ul>
        <?php foreach ($numAprobSuspensos["suspensos"] as $evaluacion => $asignaturas) { ?>
            <li><?= $traduccion[$evaluacion] ?>:
            <ul>
                <?php foreach (array_keys($asignaturas, max($asignaturas)) as $asignatura) { ?>
                    <li><?= $asignatura ?>: <?= $asignaturas[$asignatura] ?> suspensos</li>
                <?php } ?>
            </ul>
        </li>
        <?php } ?>
        </ul>
    <?php } ?>
    <?php if($numAprobados) { ?>
        <h2>Número de aprobados por asignatura</h2>
        <ul>
            <?php foreach ($numAprobSuspensos["aprobados"] as $evaluacion => $asignaturas) { ?>
                <li><?= $traduccion[$evaluacion] ?></li>
                <ul>
                    <?php foreach ($asignaturas as $asignatura => $num) { ?>
                    <li><?= $asignatura ?>: <?= $num ?> aprobados</li>
                    <?php } ?>
                </ul>
            <?php } ?>
        </ul>
    <?php } ?>
    <?php if($listarBoletin) { ?>
        <?php if(strcmp($evaluacionEscogida, "1EV") == 0) { ?>
            <h3>Primera evaluación</h3>
        <?php } else { ?>
            <h3>Segunda evaluación</h3>
        <?php } ?>
        <ul>
            <?php foreach($notasAlumnos as $alumno => $boletin) { ?>
                <li><?= $alumno ?></li>
                <ul>
                    <?php foreach ($boletin[$evaluacionEscogida] as $asignatura => $nota) {?>
                        <li><?= $asignatura ?>: <?= $nota ?></li>
                    <?php } ?>
                </ul>
            <?php } ?>
        </ul>
    <?php } ?>
</body>
</html>