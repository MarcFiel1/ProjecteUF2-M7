<?php require('partials/head.php'); ?>

<!--<?php foreach ($users as $role) : ?>
        <p><?php echo $role->role; ?></p>
    <?php endforeach; ?>-->
<div class="cuerpo">
    <form action="<?= root(); ?>register/reg" method="POST" class="formulario">
    <br>
        <label>Nombre: <input type="text" name="name" required /></label><br>
        <label>Usuario: <input type="text" name="username" required /></label> <br>
        <label>Correo: <input type="email" name="email" required /></label> <br>
        <label>Contraseña: <input type="password" name="password" required /></label><br>
        <label>Repite la contraseña: <input type="password" name="password2" required /></label><br><br>
        <select class="input_login" name="role" required>
            <option selected disabled>Seleccionar rol</option>
            <option value="Profesor">Profesor</option>
            <option value="Alumno">Alumno</option>
        </select><br><br>
        <button class="button" type="submit">REGISTER<br>

    </form>
</div>


<style>
    .cuerpo {
        display: flex;
        width: 100%;
        height: 100%;
        align-items: center;
        justify-content: center;
        margin-top: 5%;
    }

    .formulario {
        display: flex;
        width: 40%;
        height: 430px;
        flex-direction: column;
        border: 4px solid navy;
        align-items: center;
        justify-content: space-around;
        padding: 30px;
        background-color: #F4F6F6
    }

    button {
        display: flex;
        width: 300px;
        height: 30px;
        padding: 20px;
        justify-content: center;
        align-items: center;
        background-color: #D1F2EB;
        cursor: pointer;
    }

    a {
        text-decoration: none;
        color: black;
    }
</style>