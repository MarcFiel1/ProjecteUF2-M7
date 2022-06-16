<?php require('partials/nav2.php');

use App\Registry; ?>
<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<br><br>
<div class="cuerpo">
    <div class="bienvenida">
        <div class="caja_dash">
            <p>Bienvenido, <?php echo $_SESSION["name_login"];
                            echo "<br><br>"; ?></p>
            <!-- <p>Usuario: <?php echo $_SESSION["username"]; ?></p>
            <p>Email: <?php echo $_SESSION["email_login"]; ?></p> -->
            <p>Rol: <?php echo $_SESSION["role_login"]; ?></p>
            <hr>
        </div>
    </div>
    <?php if ($_SESSION["role_login"] == 'Alumno' || $_SESSION["role_login"] == 'Profesor') { ?>


        <p style="margin-left:250px;"><b>MIS TAREAS</b></p>
        <br><br>
        <div class="bloques_tareas">
            <?php
            $bbdd = Registry::get('database');

            $sql = "SELECT * from tareas WHERE user_task = ?;";
            $stmt = $bbdd->query($sql);
            $username = $_SESSION["username"];
            $stmt->execute([$username]);
            $request = $stmt->fetchAll();


            $sql = "SELECT * from listas WHERE user_list = ?;";
            $stmt = $bbdd->query($sql);
            $username = $_SESSION["username"];
            $stmt->execute([$username]);
            $request0 = $stmt->fetchAll();


            foreach ($request as $valores) {
                echo "<div class='caja_tareas'>";
                $taskname = $valores['nametask'];
                $taskdescription = $valores['descriptiontask'];
                $list_task = $valores['id_list'];
                $tarea_id = $valores['id'];
                foreach ($request0 as $valores0) {
                    if ($valores0['id'] == $list_task) {
                        $list_name_task = $valores0['namelist'];
                    }
                }

                if (empty($taskname) == false && empty($taskdescription) == false) {
                    echo "<p><b>Lista:</b> " . $list_name_task . "<br><br>
                            <b>Tarea:</b> " . $taskname . " <br><br>
                            <b>Descripcion: </b>" . $taskdescription . "</p>";
                } else if (empty($taskname) == false && empty($taskdescription) == true) {
                    echo "<p><b>Lista:</b> " . $list_name_task . "<br><br>
                            <b>Tarea:</b> " . $taskname . "</p>";
                } else {
                    echo "";
                }

            ?>
                <div class='botones'>

                    <form action="<?php root(); ?>task/delete" method='POST'>
                        <input name="idTaskDelete" value='<?php echo $tarea_id ?>' hidden>
                        <button type='submit' class='eliminar'>ELIMINAR</button><br>
                    </form>

                </div>
            <?php
                echo "</div>";
            }
            ?>
            <br><br>
        </div>
</div>
<?php
    } else if ($_SESSION["role_login"] == 'Admin') {
?>
    <h2 style="margin-left:250px;"><b>ADMINISTRAR</b></h2>
    <br><br>
    <div class="bloques_tareas">
        <a href="<?= root(); ?>admincursos">
            <div class="caja_tareas">
                <h3>Administrar Cursos</h3>
            </div>
        </a>

        <a href="<?= root(); ?>adminasignaturas">
            <div class="caja_tareas">
                <h3>Administrar Asignaturas</h3>
            </div>
        </a>

        <a href="<?= root(); ?>adminusuarios">
            <div class="caja_tareas">
                <h3>Administrar Usuarios</h3>
            </div>
        </a>
    </div>





<?php
    }
?>
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
        background-color: #F4F6F6;
        justify-content: space-around;
        align-items: center;
        padding: 10px;

    }

    .botones {
        display: flex;
        flex-direction: row;
        width: 80%;
        height: 50px;
        background-color: #F4F6F6;
        justify-content: space-around;
        align-items: center;

    }

    .edit {
        display: flex;
        flex-direction: row;
        width: auto;
        height: 20px;
        padding: 15px;
        justify-content: flex-start;
        align-items: center;
        background-color: #85C1E9;
        cursor: pointer;
        color: white;
        ;
    }

    .eliminar {
        display: flex;
        flex-direction: row;
        width: auto;
        height: 20px;
        padding: 15px;
        justify-content: flex-start;
        align-items: center;
        background-color: #E74C3C;
        cursor: pointer;
        color: white;
        ;
    }
</style>