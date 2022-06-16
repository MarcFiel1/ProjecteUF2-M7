<style>
    * {
        margin: 0;
        padding: 0;
    }

    h1 {
        font-size: 25px;
    }

    .header {
        display: flex;
        width: 100%;
        height: 80px;
        background: linear-gradient(to bottom, #BEFF96, #E8F6F3);
    }

    .titulo {
        display: flex;
        width: 50%;
        height: 80px;
        align-items: center;
        justify-content: center;
        color: navy;
        margin-right: 20%;
    }

    .navegacion {
        display: flex;
        flex-direction: row;
        width: 35%;
        height: 80px;
        align-items: center;
        justify-content: space-around;
        color: black;
    }
</style>
<div class="header">
    <div class="titulo">
        <h1><b>SCHOOL M7</b></h1>
    </div>
    <div class="navegacion">
        <a href="/">Login</a>
        <a href="<?= root(); ?>register">Register</a>
    </div>
</div>
<nav>
    <ul>
        <li></li>
        <?php error_reporting(0); ?>
    </ul>
</nav>