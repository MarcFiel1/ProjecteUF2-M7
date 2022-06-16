<?php

use App\Registry;

require('partials/nav2.php'); ?>
<br><br>
<p style="margin-left:250px;"><b>CREAR USUARIOS</b></p>
<br><br>
<form action="<?= root(); ?>adminusuarios/createUsuario" method="POST" class="formulario">
    <br>
    <label>Nombre: <input type="text" name="name" required /></label><br>
    <label>Usuario: <input type="text" name="username" required /></label> <br>
    <label>Correo: <input type="email" name="email" required /></label> <br>
    <label>Contraseña: <input type="password" name="password" required /></label><br>
    <label>Repite la contraseña: <input type="password" name="password2" required /></label><br><br>
    <label>Rol:
        <select class="input_login" name="role" required>
            <option selected disabled>Seleccionar rol</option>
            <option value="Profesor">Profesor</option>
            <option value="Alumno">Alumno</option>
        </select></label><br><br>
    <button class="button" type="submit">CREAR USUARIO</button><br>

</form>
<br><br>

<!-- <p style="margin-left:250px;"><b>EDITAR (CAMBIAR ROLES A USUARIOS)</b></p>
<br><br>
<form action="<?= root(); ?>adminusuarios/editUsuario" method="POST" class="formularioAsign">
    <label>Usuario:
        <select class="input_login" name="name_usuario" required>
            <option selected disabled>Seleccionar Usuario</option>
            <?php
            $bbdd = Registry::get('database');
            $sql = "SELECT * FROM usuarios ORDER BY id";
            $stmt = $bbdd->query($sql);
            $stmt->execute([$username]);
            $request = $stmt->fetchAll();
            foreach ($request as $valores) {
                echo "<option name='name_usuario' value=" . $valores['username'] . ">" . $valores['username'] . "</option>";
            }
            ?>
        </select></label><br><br>

    <label>Rol:
        <select class="input_login" name="name_rol" required>
            <option selected disabled>Seleccionar rol</option>
            <option name="name_rol" value="Admin">Admin</option>
            <option name="name_rol" value="Profesor">Profesor</option>
            <option name="name_rol" value="Alumno">Alumno</option>
        </select></label>
    </select></label><br><br>
    <button type="submit" style="background-color:#5DADE2;">EDITAR</button> <br>
</form> -->


<br><br>
<p style="margin-left:250px;"><b>ELIMINAR USUARIO</b></p>
<br><br>
<form action="<?= root(); ?>adminusuarios/eliminarUsuario" method="POST" class="formulario_edit">
    <label>Usuario:
        <select class="input_login" name="name_usuario_eliminar" required>
            <option selected disabled>Seleccionar Usuario</option>
            <?php
            $bbdd = Registry::get('database');
            $sql = "SELECT * FROM usuarios ORDER BY id";
            $stmt = $bbdd->query($sql);
            $stmt->execute([$username]);
            $request = $stmt->fetchAll();
            foreach ($request as $valores) {
                echo "<option name='name_usuario_eliminar' value='".$valores['username']."'>" . $valores['name'] . "</option>";
            }


            ?>
        </select></label><br><br>
    <button type="submit" style="background-color:#E74C3C; color:white">ELIMINAR</button> <br>

</form>
<br><br>
<p style="margin-left:250px;"><b>ASIGNAR ALUMNOS A CURSOS</b></p>
<br><br>
<form action="<?= root(); ?>adminusuarios/asignAlumnosCursos" method="POST" class="formularioAsign">
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
    <label>Alumno:
        <select class="input_login" name="name_alumno" required>
            <option selected disabled>Seleccionar alumno</option>
            <?php
            $bbdd = Registry::get('database');
            $sql = "SELECT * FROM estudiantes ORDER BY id_estudiante";
            $stmt = $bbdd->query($sql);
            $stmt->execute([$username]);
            $request = $stmt->fetchAll();
            foreach ($request as $valores) {
                echo "<option name='id_estudiante' value=" . $valores['id_estudiante'] . ">" . $valores['id_estudiante'] . "</option>";
            }


            ?>
        </select></label><br><br>
    <button type="submit" style="background-color:#5DADE2; color:white">ASIGNAR</button> <br>
</form>

<br><br>
<p style="margin-left:250px;"><b>ASIGNAR PROFESORES A ASIGNATURAS</b></p>
<br><br>
<form action="<?= root(); ?>adminusuarios/asignProfeAsignatura" method="POST" class="formularioAsign">
    <label>Profesor:
        <select class="input_login" name="name_profesor">
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
    <label>Asignaturas:
        <select class="input_login" name="name_asignatura" required>
            <option selected disabled>Seleccionar asignatura</option>
            <?php
            $bbdd = Registry::get('database');
            $sql = "SELECT * FROM asignaturas ORDER BY codigo_asignatura";
            $stmt = $bbdd->query($sql);
            $stmt->execute([$username]);
            $request = $stmt->fetchAll();
            foreach ($request as $valores) {
                echo "<option name='name_asignatura' value=" . $valores['codigo_asignatura'] . ">" . $valores['nombre_asignatura'] . "</option>";
            }


            ?>
        </select></label><br><br>
    <button type="submit" style="background-color:#5DADE2; color:white">ASIGNAR</button> <br>
</form>

<br><br>

<br><br>
<hr style="margin-left: 250px;">
<br><br>
<p style="margin-left:250px; font-size:25px"><b>USUARIOS</b></p>
<br><br>
<div class="bloques_tareas">
    <?php

    $bbdd = Registry::get('database');
    $sql = "SELECT * FROM usuarios";
    $stmt = $bbdd->query($sql);
    $stmt->execute();
    $request = $stmt->fetchAll();


    foreach ($request as $valores) {
        echo "<div class='caja_tareas'>";
        $name_usuario = $valores['name'];
        $username_usuario = $valores['username'];
        $email_usuario = $valores['email'];
        $rol_usuario = $valores['rol'];

        echo "<p><h2>" . $name_usuario . "</h2><br></p>";
        echo "<p><b>Username:</b> " . $username_usuario . "<br><br></p>";
        echo "<p><b>Email:</b> " . $email_usuario . "<br><br></p>";
        echo "<p><b>Rol:</b> " . $rol_usuario . "<br><br></p>";
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
        height: 400px;
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

    .formularioAsign {
        display: flex;
        width: 500px;
        height: 300px;
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
        grid-template-columns: auto auto auto;
        width: 85%;
        height: 100%;
        margin-left: 250px
    }


    .caja_tareas {
        display: flex;
        flex-direction: column;
        width: 300px;
        height: 200px;
        background-color: #D1F2EB;
        justify-content: space-around;
        align-items: left;
        padding: 20px;

    }
</style>