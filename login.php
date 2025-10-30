<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body class="bodylogin">
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
        }
    </script>

    <style>
        * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
        }

        .bodylogin {
        background: linear-gradient(135deg, #00c6fb, #005bea);
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        }

        .bodylogin div {
        background: #ffffff;
        padding: 40px 50px;
        border-radius: 15px;
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.25);
        width: 300px;
        text-align: center;
        }

        .bodylogin div::before {
        content: "Acesso ao Sistema";
        display: block;
        font-size: 20px;
        font-weight: bold;
        color: #333;
        margin-bottom: 20px;
        }

        label {
        display: block;
        text-align: left;
        color: #444;
        font-weight: 600;
        margin-top: 10px;
        }

        input[type="text"],
        input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 8px;
        transition: all 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
        border-color: #005bea;
        box-shadow: 0 0 5px rgba(0, 91, 234, 0.4);
        outline: none;
        }

        input[type="submit"] {
        width: 100%;
        background: #005bea;
        color: white;
        border: none;
        padding: 12px;
        border-radius: 8px;
        margin-top: 20px;
        font-weight: bold;
        cursor: pointer;
        transition: 0.3s;
        }

        input[type="submit"]:hover {
        background: #0040b3;
        transform: scale(1.03);
        }
    </style>
</body>
</html>