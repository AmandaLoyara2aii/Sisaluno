<!DOCTYPE html>
<html lang="PT-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Professor(a)</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color:#F5DEB3;
            color: #333;
        }

        .caixa {
            width: 80%;
            max-width: 800px;
            margin: 90px auto;
            background-color: #e3d9cc;
            padding: 40px;
            border-radius: 40px;
            box-shadow: 0 0 40px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #704214;
        }

        a.retornar {
            display: block;
            text-align: center;
            margin-bottom: 15px;
            background-color: #9a7c48;
            color: #fff;
            text-decoration: none;
            border-radius: 30px;
            padding: 10px 12px;
            transition: background-color 0.3s ease;
        }

        a.retornar:hover {
            background-color: #7d6235;
        }

        p {
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="number"],
        input[type="date"],
        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 35px;
            font-size: 18px;
        }

        input[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #9a7c48;
            color: #fff;
            border: none;
            border-radius: 30px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #7d6235;
        }

        input[type="number"],
        input[type="date"] {
            
            display: inline-block;
            width: 25%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 35px;
            font-size: 18px;
        }
    
    </style>
</head>

<body>
    <div class="caixa">
        <h1>Inserir Professor</h1>

        <form method="post" action="inserirprof.php">
        <p>Nome: <br> <input type="text" placeholder="Digite seu nome" name="nome" maxlength= "50"required></p>
        <p>CPF: <br> <input type="text" placeholder="000.000.000-00" name="cpf" maxlength="11" required></p>
        <p>Idade: <input type="number" placeholder="Digite sua idade" name="idade" maxlength="2" required>
        &nbsp; Data de Nascimento: <input type="date" placeholder="Digite sua data de nascimento" name="datanascimento" required></p>
        <p>Endereço: <br> <input type="text" placeholder="Digite seu endereço" name="endereco" required></p>
        <input type="submit" value="Cadastrar"><br>
        <p>Status: <br>
                <select name="estatus" id="estatus">
                    <option value="Aprovado">Ativo</option>
                    <option value="Reprovado">inativo</option>
                </select>
        <a class="retornar" href="index.php">Gerenciamento do Professor</a>
        </form>
    </div>
</body>
</html>

<?php

require_once "../conexao.php";

if (isset($_POST['nome'])) {

    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $idade = $_POST["idade"];
    $datanascimento = $_POST["datanascimento"];
    $endereco = $_POST["endereco"];

    $stmt = $conexao->prepare("INSERT INTO professor (nome, cpf, idade, datanascimento, endereco) VALUES (:nome, :cpf, :idade, :datanascimento, :endereco)");
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':cpf', $cpf);
    $stmt->bindParam(':idade', $idade);
    $stmt->bindParam(':datanascimento', $datanascimento);
    $stmt->bindParam(':endereco', $endereco);

    $stmt->execute();

    header("Location: index.php");
    exit();
}
?>