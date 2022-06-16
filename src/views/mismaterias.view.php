<?php require('partials/nav2.php');

use App\Registry; ?>
<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<br><br>
<p style="margin-left:250px;"><b>MIS MATERIAS</b></p>
<div class="cuerpo">

    <br><br>
    <?php

    $bbdd = Registry::get('database');
    $sql = "SELECT * FROM cursos";
    $stmt = $bbdd->query($sql);
    $stmt->execute();
    $request = $stmt->fetchAll();

    $bbdd = Registry::get('database');
    $sql = "SELECT * from asignaturas";
    $stmt = $bbdd->query($sql);
    $stmt->execute();
    $request1 = $stmt->fetchAll();


    $username = $_SESSION['username'];
    $bbdd = Registry::get('database');
    $sql = "SELECT * FROM estudiantes WHERE id_estudiante='$username'";
    $stmt = $bbdd->query($sql);
    $stmt->execute();
    $request3 = $stmt->fetchAll();


    if ($_SESSION["role_login"] == 'Alumno') {
        echo "<div class='bloques_tareas_alumno'>";



        foreach ($request3 as $valores3) {

            if ($valores3['id_estudiante'] == $username) {
                $codigoCurso = $valores3['codigo_curso'];
            }

            foreach ($request as $valores) {

                if ($valores['codigo_curso'] == $codigoCurso) {
                    $name_curso = $valores['nombre_curso'];
                }
            }

            foreach ($request1 as $valores1) {

                if ($valores1['codigo_curso'] ==  $codigoCurso) {
                    $name_asignatura = $valores1['nombre_asignatura'];
                    $name_profesor = $valores1['id_profesor'];
                    echo "<div class='caja_tareas_alumno'>";
                    echo "<p><b>Curso:</b> " . $name_curso . "<br><br>
                              <b>Asignatura:</b> " . $name_asignatura . " <br><br>
                              <b>Profesor: </b>" . $name_profesor . "</p>";
                    echo "</div>";
                }
            }
        }
    }
    ?>
    <?php

    $username=$_SESSION['username'];
    $bbdd = Registry::get('database');
    $sql = "SELECT * from asignaturas WHERE id_profesor='$username'";
    $stmt = $bbdd->query($sql);
    $stmt->execute();
    $request = $stmt->fetchAll();

    $bbdd = Registry::get('database');
    $sql = "SELECT * FROM cursos";
    $stmt = $bbdd->query($sql);
    $stmt->execute();
    $request1 = $stmt->fetchAll();


    $bbdd = Registry::get('database');
    $sql = "SELECT * FROM estudiantes";
    $stmt = $bbdd->query($sql);
    $stmt->execute();
    $request2 = $stmt->fetchAll();


    if ($_SESSION["role_login"] == 'Profesor') {
        echo "<div class='bloques_tareas'>";


        foreach ($request as $valores) {

            $nombre_asignatura = $valores['nombre_asignatura'];
            $codigoCurso = $valores['codigo_curso'];
            

            foreach ($request1 as $valores1) {

                if ($valores1['codigo_curso'] == $codigoCurso) {
                    $name_curso = $valores1['nombre_curso'];
                }
            }
            echo "<div class='caja_tareas'>";
            echo "<p><b>Asignatura:</b> " .$nombre_asignatura."<br><br>";
            echo "<b>Curso:</b> " .$name_curso."<br><br>";
            echo "<b>Alumnos:</b> ";
            foreach ($request2 as $valores2) {

                if ($valores2['codigo_curso'] ==  $codigoCurso) {
                    $name_estudiante = $valores2['id_estudiante'];
                  echo  $name_estudiante.", ";"</p><br>";
                    
                }
                
            }
            echo "</div>";
            
        }
        echo "</div>"; 
    }
    ?><br><br>
</div>
<br><br>


<style>
    * {
        margin-left: 0;
        padding: 0;
    }

    .cuerpo {
        display: flex;
        flex-direction: column;
        width: 100%;
        height: 100%;
    }

    .bienvenida {
        display: flex;
        flex-direction: column;
        width: 80%;
        height: 20%;

    }

    .caja_dash {
        display: flex;
        flex-direction: column;
        margin-left: 250px;
        width: 90%;
        height: 100px;
    }

    .bloques_tareas {
        display: grid;
        grid-template-rows: auto auto auto;
        width: 85%;
        height: 100%;
        margin-left: 250px
    }

    .bloques_tareas_alumno {
        display: grid;
        grid-template-columns: auto auto auto;
        width: 85%;
        height: 100%;
        margin-left: 250px
    }


    .caja_tareas {
        display: flex;
        flex-direction: row;
        width: 700px;
        height: 150px;
        background-color: #F6DDCC;
        justify-content: left;
        align-items: center;
        cursor: pointer;
        padding: 20px;
    }

    .caja_tareas_alumno {
        display: flex;
        flex-direction: row;
        width: 300px;
        height: 150px;
        background-color: #D4E6F1;
        justify-content: center;
        align-items: center;
        cursor: pointer;
    }

    .button {
        display: flex;
        flex-direction: row;
        width: auto;
        height: 30px;
        padding: 20px;
        justify-content: flex-start;
        align-items: center;
        background-color: #D1F2EB;
        cursor: pointer;
    }
</style>