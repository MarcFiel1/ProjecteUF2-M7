<?php require('partials/nav2.php'); ?>
<?php use App\Registry;?>
<?php
    if(!isset($_SESSION)){session_start();} 
?>
<br><br><br>
<p style="margin-left:250px;"><b>CREAR TAREAS</b></p>
<br><br>
<form action="<?= root();?>task/createTask" method="POST" class="formulario"> 
  <label>Nombre Tarea: <input type="text" name="name_task" /></label><br><br>
  <label>Descripcion: <input type="text" name="description_task" /></label><br><br>
  
  <select name="seleccionarlista"  >
    <option selected disabled>Seleccionar lista</option>
    <?php
        //Vamos a preparar la sentencia para que salgan en el seleccionador las listas creadas.
        $bbdd=Registry::get('database');
        $sql ="SELECT * FROM listas WHERE user_list=?;";
        $stmt = $bbdd->query($sql);
        $stmt->execute([$_SESSION["username"]]);
        $request = $stmt->fetchAll();
        foreach($request as $valores){
          
            echo "<option name='seleccionarlista' value=".$valores['id'].">".$valores['namelist']."</option>";
          
        } 
    ?>
  </select><br><br>
  <button type="submit">AÑADIR TAREA</button> <br>

</form>

<style>
    * {
        margin-left: 0;
        padding: 0;
    }

    .formulario{
            display: flex;
            width: 500px;
            height: 300px;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-color: #F4F6F6 ;
            margin-left: 250px;
        }

        button{
            display: flex;
            width: 200px;
            height: 30px;
            padding: 20px;
            justify-content: center;
            align-items: center;
            background-color: #D1F2EB;
            cursor: pointer;
        }

</style>