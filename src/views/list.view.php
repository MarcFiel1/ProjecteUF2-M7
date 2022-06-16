<?php require('partials/nav2.php'); ?>
<br><br>
<p style="margin-left:250px;"><b>CREAR LISTAS</b></p>
<br><br>
<form action="<?= root();?>list/createList" method="POST" class="formulario"> 
  <label>Nombre Lista: <input type="text" name="name_list" /></label> <br><br>
  <button type="submit">AÑADIR LISTA</button>  <br>

</form>
<br><br>
<?php require('partials/footer.php'); ?>

<style>
    * {
        margin-left: 0;
        padding: 0;
    }

    .formulario{
            display: flex;
            width: 500px;
            height: 150px;
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