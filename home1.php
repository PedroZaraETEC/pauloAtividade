<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style.css">
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
    </div>
</body>
</html>


