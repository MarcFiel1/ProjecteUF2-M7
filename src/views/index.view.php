<?php require('partials/head.php'); ?>

<div class="cuerpo">
<form action="<?= root();?>login/log" method="POST" class="formulario">
<br><br>
 <label> Usuario: <input type="text" name="username" /></label> <br>
 <label>Contraseña: <input type="password" name="password" /></label> <br><br>
  
  <a href="<?= root();?>register"><b>No estas registrado? Registrate</b></a></li>
  <br>
  <button type="submit" class="button">LOGIN</button><br>
</form>
</div>
<br><br>
<?php require('partials/footer.php'); ?>

<style>
       
        .cuerpo{
            display: flex;
            flex-direction: column;
            width: 100%;
            height:100;
            align-items: center;
            justify-content: center;
            margin-top: 5%;
        }

        .formulario{
            display: flex;
            width: 40%;
            height: 280px;
            flex-direction: column;
            border: 4px solid navy;
            align-items: center;
            justify-content: space-around;
            padding: 30px;
            background-color: #F4F6F6 ;
            
        }

        button{
            display: flex;
            width: 300px;
            height: 30px;
            padding: 20px;
            justify-content: center;
            align-items: center;
            background-color: #D1F2EB;
            cursor: pointer;
        }

        a{
            text-decoration: none;
            color: black;
        }

    </style>
