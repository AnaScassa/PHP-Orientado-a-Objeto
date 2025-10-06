<?php
    require_once 'conexao.php';

    session_start();

    if (!isset($_SESSION['id'])) {
        header("Location: login.php");
        exit();
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pagRestritas.css">
    <link rel="icon" type="image" href="img/casa.png">
    <title>Página não registra</title>
</head>
<body>
    <div class="containerTitulopnr">
        <div class="pnr">
            <p>Você está na página não restrita!!</p>
            <?php
            echo "<p >Você é um usuário comum id número: {$_SESSION['id']}</p>";
            ?>
        </div>
        <div class="containerImagempnr">
            <img src="img/gatoterno.png" alt="">
        </div>
        <div class="containerButton">
            <form method="post">
            <button>Voltar Login</button>
            </form>
        </div>
    </div>

    <?php 
     if ($_SERVER["REQUEST_METHOD"] == "POST") {
        session_destroy();
        header("Location: login.php");
    }
    ?>
</body>
</html>