<?php

use App\Registry;

require('partials/nav2.php'); ?>
<br><br>
<p style="margin-left:250px;"><b>CREAR CURSOS</b></p>
<br><br>
<form action="<?= root(); ?>admincursos/createCurso" method="POST" class="formulario">
    <label>Nombre Curso: <input type="text" name="name_curso" /></label> <br><br>
    <button type="submit">AÑADIR CURSO</button> <br>

</form>
<br><br>

<p style="margin-left:250px;"><b>EDITAR CURSOS</b></p>
<br><br>
<form action="<?= root(); ?>admincursos/editCurso" method="POST" class="formulario_edit">
    <label>Curso:
        <select class="input_login" name="name_curso" required>
            <option selected disabled>Seleccionar curso</option>
            <?php
            $bbdd = Registry::get('database');
            $sql = "SELECT * FROM cursos ORDER BY codigo_curso";
            $stmt = $bbdd->query($sql);
            $stmt->execute([$username]);
            $request = $stmt->fetchAll();
            foreach ($request as $valores) {
                echo "<option name='codigo_curso' value=" . $valores['codigo_curso'] . ">" . $valores['nombre_curso'] . "</option>";
            }


            ?>
        </select></label><br><br>
    <label>Nuevo nombre Curso: <input type="text" name="name_cursoModificado" /></label> <br><br>
    <button type="submit" style="background-color:#5DADE2">ACTUALIZAR CURSO</button> <br>

</form>
<br><br>
<p style="margin-left:250px;"><b>ELIMINAR CURSOS</b></p>
<br><br>
<form action="<?= root(); ?>admincursos/eliminarCurso" method="POST" class="formulario">
    <select class="input_login" name="name_curso_eliminar" required>
        <option selected disabled>Seleccionar curso</option>
        <?php
        $bbdd = Registry::get('database');
        $sql = "SELECT * FROM cursos ORDER BY codigo_curso";
        $stmt = $bbdd->query($sql);
        $stmt->execute([$username]);
        $request = $stmt->fetchAll();
        foreach ($request as $valores) {
            echo "<option name='codigo_curso' value=" . $valores['codigo_curso'] . ">" . $valores['nombre_curso'] . "</option>";
        }


        ?>
    </select><br><br>
    <button type="submit" style="background-color:#E74C3C; color:white">ELIMINAR</button> <br>
</form>
<br><br>
<hr style="margin-left: 250px;">
<br><br>
<p style="margin-left:250px; font-size:25px"><b>CURSOS</b></p>
<br><br>
<div class="bloques_tareas">
    <?php
    $bbdd = Registry::get('database');
    $sql = "SELECT * from cursos;";
    $stmt = $bbdd->query($sql);
    $stmt->execute();
    $request = $stmt->fetchAll();


    foreach ($request as $valores) {
        echo "<div class='caja_tareas'>";
        $name_curso = $valores['nombre_curso'];
        $codigo_curso = $valores['codigo_curso'];
        

        if (empty($name_curso) == false && empty($codigo_curso) == false) {
            echo "<p><b>Curso:</b> " . $name_curso . "<br><br></p>";
        } else if (empty($name_curso) == false && empty($codigo_curso) == true) {
            echo "<p><b>Curso:</b> " . $name_curso . "<br><br></p>";
        } else {
            echo "";
        }
        echo "</div>";
        
    }
    ?>
    <br><br>
</div>

<style>
    * {
        margin-left: 0;
        padding: 0;
    }

    .formulario {
        display: flex;
        width: 500px;
        height: 150px;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        background-color: #F4F6F6;
        margin-left: 250px;
    }

    .formulario_edit {
        display: flex;
        width: 500px;
        height: 200px;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        background-color: #F4F6F6;
        margin-left: 250px;
    }

    button {
        display: flex;
        width: 200px;
        height: 30px;
        padding: 20px;
        justify-content: center;
        align-items: center;
        background-color: #D1F2EB;
        cursor: pointer;
    }

    .bloques_tareas {
        display: grid;
        grid-template-columns: auto auto auto auto;
        width: 85%;
        height: 100%;
        margin-left: 250px
    }


    .caja_tareas {
        display: flex;
        flex-direction: column;
        width: 150px;
        height: 150px;
        background-color: #D1F2EB;
        justify-content: space-around;
        align-items: center;
        padding: 10px;

    }
</style>