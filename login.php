<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
    <div>
        <label for="">Cpf: </label><input type="text" name="cpf" id="cpf"><br>
        <label for="">Senha: </label><input type="password" name="senha" id="senha"><br>
        <input type="submit" value="Entrar" onclick="verificar()">
    </div>

    <script>
        function verificar() {
            let cpf = document.getElementById("cpf").value;
            let senha = document.getElementById("senha").value;
            let requisicao = new XMLHttpRequest();
            requisicao.open("GET", `dataTravel.php?cpf=${cpf}&senha=${senha}&action=consultarUser`);
            requisicao.onload = function () {
                let resposta = JSON.parse(requisicao.responseText);
                    
                if (resposta.status === "ok") {
                        window.location.href = "home1.php"; 
                    } else {
                        alert("CPF ou senha incorretos!");
                    }
            };
            requisicao.send();

            
            console.log(res);
        }
    </script>
</body>
</html>