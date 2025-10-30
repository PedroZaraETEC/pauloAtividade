<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar agenda</title>
</head>
<body>
    <h1>Criar nova Agenda</h1>
    <div class="agendaDiv">
        <div class="titulo">
            <h2>Titulo</h2>
            <input class="tituloInput" type="text" name="titulo" id="titulo" required>
            <input type="date" name="date" id="date">
        </div>

        <div class="descricao">
            <h2>Descrição</h2>
            <textarea id="descricao" name="descricao" placeholder="Digite sua descrição aqui..." rows="8" cols="50"></textarea>
        </div>

        <input class="submit" type="submit" value="Criar" onclick="criarNovaAgenda()">
    </div>


    <script>
        const id = <?php echo $_SESSION["id"];?>;
        
        function criarNovaAgenda() {
        const titulo = document.getElementsByName("titulo")[0].value;
        const date = document.getElementsByName("date")[0].value;
        const descricao = document.getElementsByName("descricao")[0].value;

        let requisicao = new XMLHttpRequest();
        requisicao.open("GET", `dataTravel.php?titulo=${titulo}&date=${date}&descricao=${descricao}&idUser=${id}&action=criarAgenda`);
            
       requisicao.onload = function () {
                let resposta = JSON.parse(requisicao.responseText);
                    
                if (resposta.status === "ok") {
                        window.location.href = "home1.php"; 
                    } else {
                        alert("CPF ou senha incorretos!");
                    }
            };
        requisicao.send();
}
    </script>

    <style>
         body {
            background-color: #cfcfcf;
            font-family: Arial, sans-serif;
            text-align: center;
        }

        .agendaDiv {
            background-color: #fff;
            width: 400px;
            margin: 60px auto;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0px 0px 10px #999;
        }

        h1 {
            margin-top: 40px;
        }

        input, textarea {
            width: 90%;
            margin: 10px 0;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        .submit {
            background-color: #007bff;
            color: white;
            font-weight: bold;
            cursor: pointer;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            transition: 0.2s;
        }

        .submit:hover {
            background-color: #0056b3;
        }
    </style>
</body>
</html>