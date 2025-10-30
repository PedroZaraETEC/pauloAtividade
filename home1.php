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
    <div class="inicial">
        <h1>Bem Vindo <?php echo $_SESSION["nome"] ?></h1>
        <p>Oque pretende fazer hoje?</p>
        
        <div class="botoes">
            <input class="botoesClick" type="button" value="Criar" onclick="redirecionar('agenda')">
            <input class="botoesClick" type="button" value="Mostrar" onclick="solicitarAgendas()">
        </div>

        <p id="conteudo"></p>

        <script>
            function redirecionar(red) {
                window.location.href = red == "agenda" ? "criarAgenda.php" : "agenda.php";
            }

            function solicitarAgendas() {
                let requisicao = new XMLHttpRequest();
                requisicao.open("GET", "dataTravel.php?action=consultarAgenda");
                requisicao.onload = function() {
                    let resposta = JSON.parse(requisicao.responseText);
                    console.log(resposta);

                    document.getElementById('conteudo').innerHTML = "";

                    resposta.forEach(item => {
                        document.getElementById('conteudo').innerHTML += `
                        <div class="agenda-item">
                            <div>
                                <h3>${item.titulo}</h3>
                                <p class="paragrafo">${item.descricao}</p>
                            </div>
                            <p class="data">${item.data_cri}</p>
                        </div>
                        `;
                    });

                    
                }
                requisicao.send();
            }
        </script>

        <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            text-align: center;
        }

        .inicial {
            margin: 50px auto;
            width: 60%;
            background-color: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 0 10px #ccc;
        }

        .botoes {
            margin-top: 20px;
        }

        .botoesClick {
            margin: 10px;
            padding: 10px 25px;
            border: none;
            border-radius: 8px;
            background-color: #007bff;
            color: white;
            cursor: pointer;
            transition: 0.2s;
        }

        .botoesClick:hover {
            background-color: #0056b3;
        }

        .agenda-item {
            background: #f9f9f9;
            border-radius: 10px;
            margin: 10px auto;
            padding: 15px;
            width: 80%;
            text-align: left;
            box-shadow: 0 0 5px #ccc;
        }

        .agenda-item h3 {
            margin: 0;
            color: #333;
        }

        .paragrafo {
            color: #666;
        }

        .data {
            text-align: right;
            color: #999;
            font-size: 0.9em;
        }
            
        </style>
    </div>
</body>
</html>


