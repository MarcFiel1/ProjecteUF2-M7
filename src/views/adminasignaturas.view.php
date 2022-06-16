<?php

use App\Registry;

require('partials/nav2.php'); ?>
<br><br>
<p style="margin-left:250px;"><b>CREAR ASIGNATURAS</b></p>
<br><br>
<form action="<?= root(); ?>adminasignaturas/createAsignatura" method="POST" class="formulario">
    <label>Nombre Asignatura: <input type="text" name="name_asignatura" /></label> <br><br>
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

    <label>Profesor:
        <select class="input_login" name="name_profesor" required>
            <option selected disabled>Seleccionar profesor</option>
            <?php
            $bbdd = Registry::get('database');
            $sql = "SELECT * FROM profesores ORDER BY id_profesor";
            $stmt = $bbdd->query($sql);
            $stmt->execute([$username]);
            $request = $stmt->fetchAll();
            foreach ($request as $valores) {
                echo "<option name='name_profesor' value=" . $valores['id_profesor'] . ">" . $valores['id_profesor'] . "</option>";
            }


            ?>
        </select></label><br><br>


    <button type="submit">AÑADIR ASIGNATURA</button> <br>

</form>
<br><br>

<p style="margin-left:250px;"><b>EDITAR ASIGNATURAS</b></p>
<br><br>
<form action="<?= root(); ?>adminasignaturas/editAsignatura" method="POST" class="formulario">
    <label>Curso:
        <select class="input_login" name="name_curso">
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

    <label>Asignatura:
        <select class="input_login" name="name_asignatura" required>
            <option selected disabled>Seleccionar asignatura</option>
            <?php
            $bbdd = Registry::get('database');
            $sql = "SELECT * FROM asignaturas ORDER BY codigo_asignatura";
            $stmt = $bbdd->query($sql);
            $stmt->execute([$username]);
            $request = $stmt->fetchAll();
            foreach ($request as $valores) {
                echo "<option name='codigo_asignatura' value=" . $valores['codigo_asignatura'] . ">" . $valores['nombre_asignatura'] . "</option>";
            }


            ?>
        </select></label><br><br>
    <label>Nuevo nombre Asignatura: <input type="text" name="name_asignaturaModificado" /></label> <br><br>
    <button type="submit" style="background-color:#5DADE2">ACTUALIZAR ASIGNATURA</button> <br>

</form>
<br><br>
<p style="margin-left:250px;"><b>ELIMINAR ASIGNATURAS</b></p>
<br><br>
<form action="<?= root(); ?>adminasignaturas/eliminarAsignatura" method="POST" class="formulario_edit">
    <label>Asignatura:
        <select class="input_login" name="name_asignatura_eliminar" required>
            <option selected disabled>Seleccionar asignatura</option>
            <?php
            $bbdd = Registry::get('database');
            $sql = "SELECT * FROM asignaturas ORDER BY codigo_asignatura";
            $stmt = $bbdd->query($sql);
            $stmt->execute([$username]);
            $request = $stmt->fetchAll();
            foreach ($request as $valores) {
                echo "<option name='codigo_asignatura' value=" . $valores['codigo_asignatura'] . ">" . $valores['nombre_asignatura'] . "</option>";
            }


            ?>
        </select></label><br><br>
    <button type="submit" style="background-color:#E74C3C; color:white">ELIMINAR</button> <br>

</form>

<br><br>
<hr style="margin-left: 250px;">
<br><br>
<p style="margin-left:250px; font-size:25px"><b>ASIGNATURAS</b></p>
<br><br>
<div class="bloques_tareas">
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


    $bbdd2 = Registry::get('database');
    $sql2 = "SELECT * FROM profesores";
    $stmtProfe = $bbdd2->query($sql2);
    $stmtProfe->execute();
    $request2 = $stmtProfe->fetchAll();


    foreach ($request1 as $valores1) {
        echo "<div class='caja_tareas'>";
        $name_asignatura = $valores1['nombre_asignatura'];
  
        foreach ($request2 as $valores2) {
            if($valores2['id_profesor']==$valores1['id_profesor']){
                $name_profesor = $valores2['id_profesor'];

            }
        }
   
        foreach ($request as $valores) {

            if($valores['codigo_curso']==$valores1['codigo_curso']){
                $name_curso = $valores['nombre_curso'];

            }

        }
            echo "<p><b>Curso:</b> " . $name_curso . "<br><br>
                <b>Asignatura:</b> " . $name_asignatura . " <br><br>
                <b>Profesor: </b>" . $name_profesor . "</p>";

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
        height: 300px;
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
        width: 250px;
        height: 150px;
        background-color: #D1F2EB;
        justify-content: space-around;
        align-items: center;
        padding: 10px;

    }
</style>