<style>
    * {
        margin: 0;
        padding: 0;
    }

    .header {
        display: flex;
        flex-direction: row;
        background: linear-gradient(to bottom, aqua, white);
        width: 100%;
        height: 80px;
    }

    .titulo {
        display: flex;
        flex-direction: row;
        width: 35%;
        height: 80px;
        align-items: center;
        justify-content: center;
        
    }

    .navegacion {
        display: flex;
        flex-direction: row;
        width: 45%;
        height: 80px;
        align-items: center;
        justify-content: space-around;
        color: black;    
    }

    .cerrarsesion {
        display: flex;
        flex-direction: row;
        width: 20%;
        height: 80px;
        align-items: center;
        justify-content: center;
        color: black
    }

    a {
        text-decoration: none;
        color: BLACK
        }

</style>
<?php
if ($_SESSION["role_login"] == 'Alumno' || $_SESSION["role_login"] == 'Profesor'){
?>
<div class="header">
    <div class="titulo">
        <h2><a style="color:navy;" href="<?= root(); ?>dashboard">SCHOOL M7</a></h2>
    </div>
    <div class="navegacion">
            <h3><a href="<?= root(); ?>list">Listas</a></h3>
            <h3><a href="<?= root(); ?>task">Tareas</a></h3>
            <h3><a href="<?= root(); ?>mismaterias">Mis Materias</a></h3>
    </div>
    <div class="cerrarsesion">
    <a href="<?= root(); ?>/">Cerrar sesión (<?php echo $_SESSION["name_login"]; ?>)</p></a>
    </div>
</div>
<?php
}else if ($_SESSION["role_login"] == 'Admin'){
?>
<div class="header">
    <div class="titulo">
        <h2><a style="color:navy;" href="<?= root(); ?>dashboard">SCHOOL M7</a></h2>
    </div>
    <div class="navegacion">
            <h3><a href="<?= root(); ?>admincursos">Cursos</a></h3>
            <h3><a href="<?= root(); ?>adminasignaturas">Asignaturas</a></h3>
            <h3><a href="<?= root(); ?>adminusuarios">Usuarios</a></h3>
    </div>
    <div class="cerrarsesion">
    <a href="<?= root(); ?>/">Cerrar sesión (<?php echo $_SESSION["name_login"]; ?>)</p></a>
    </div>
</div>
<?php
}
?>