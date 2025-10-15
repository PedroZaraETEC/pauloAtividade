<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>Bem Vindo <?php echo $_SESSION["nome"] ?></h1>
        <p>Oque pretende fazer hoje?</p>
        <input type="button" value="Criar" onclick="redirecionar('agenda')">
        <input type="button" value="Mostrar" onclick="redirecionar('diplay')">

        <script>
            function redirecionar(red) {
                window.location.href = red == "agenda" ? "criarAgenda.php" : "agenda.php";
            }
        </script>
    </div>
</body>
</html>


