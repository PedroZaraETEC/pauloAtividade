<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscrição</title>
</head>
<body>
    <div>
        <label for="">Nome: </label>    <input type="text" name="nome" id="nome"><br>
        <label for="">Idade: </label>   <input type="text" name="idade" id="idade"><br>
        <label for="">Cpf: </label>     <input type="text" name="cpf" id="cpf"><br>
        <label for="">Endereco: </label><input type="text" name="endereco" id="endereco"><br>
        <label for="">Senha</label>     <input type="password" name="senha" id="senha"><br>
        <input type="submit" value="Enviar" onclick="enviarDados()">
    </div>
        <script>
            function enviarDados() {
                let nome = document.getElementById("nome").value;
                let idade = document.getElementById("idade").value;
                let cpf = document.getElementById("cpf").value;
                let endereco = document.getElementById("endereco").value;
                let senha = document.getElementById("senha").value;

                let requisicao = new XMLHttpRequest();
                requisicao.open("POST", `dataTravel.php?nome=${nome}&idade=${idade}&cpf=${cpf}&endereco=${endereco}&senha=${senha}&action=inserirUser`);
                requisicao.onload = function () {
                let resposta = JSON.parse(requisicao.responseText);
                    
                if (resposta.status === "ok") {
                        window.location.href = "login.php"; 
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

body {
  background: linear-gradient(135deg, #4facfe, #00f2fe);
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
}

div {
  background: #ffffff;
  padding: 30px 40px;
  border-radius: 15px;
  box-shadow: 0 6px 18px rgba(0, 0, 0, 0.2);
  width: 320px;
}

label {
  display: block;
  font-weight: 600;
  color: #333;
  margin-top: 10px;
}

input[type="text"],
input[type="password"] {
  width: 100%;
  padding: 10px;
  margin-top: 5px;
  border: 1px solid #ccc;
  border-radius: 8px;
  outline: none;
  transition: all 0.3s ease;
}

input[type="text"]:focus,
input[type="password"]:focus {
  border-color: #4facfe;
  box-shadow: 0 0 5px rgba(79, 172, 254, 0.5);
}

input[type="submit"] {
  width: 100%;
  margin-top: 20px;
  padding: 12px;
  border: none;
  border-radius: 8px;
  background: #4facfe;
  color: white;
  font-weight: bold;
  cursor: pointer;
  transition: 0.3s;
}

input[type="submit"]:hover {
  background: #00c6fb;
  transform: scale(1.05);
}

</style>

</body>
</html>