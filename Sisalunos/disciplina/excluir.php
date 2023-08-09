<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Excluir Disciplina</title>
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

    a.voltar {
      display: block;
      text-align: center;
      margin-bottom: 10px;
      background-color: #9a7c48;
      color: #fff;
      text-decoration: none;
      border-radius: 35px;
      padding: 8px 12px;
      transition: background-color 0.3s ease;
    }

    a.voltar:hover {
      background-color: #7d6235;
    }

    form {
      margin-top: 20px;
    }

    label {
      display: block;
      margin-bottom: 10px;
      color: #704214;
    }

    input[type="number"] {
      width: 100%;
      padding: 7px;
      border: 1px solid #ccc;
      border-radius: 35px;
      font-size: 14px;
    }

    input[type="submit"] {
      display: block;
      width: 102%;
      padding: 7px;
      background-color: #9a7c48;
      color: #fff;
      border: none;
      border-radius: 35px;
      cursor: pointer;
      font-size: 16px;
      transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover {
      background-color: #7d6235;
    }
  </style>
</head>
<body>
  <div class="caixa">
  <h1>Excluir Disciplina</h1>
  <form method="post" action="excluir.php">  nome da Disciplina: <br>
    <input type="text" id="nomedisciplina" name="nomedisciplina" placeholder="Digite o nome da disciplina para confirmar" required> <br>
    <input type="submit" value="Excluir">
    <a class="voltar" href="index.php">Gerenciar Disciplina</a>
</form>

  </div>
  
</body>
</html>

<?php

require_once "../conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id_disciplina = $_POST["nomedisciplina"];

  $stmt = $conexao->prepare("DELETE FROM disciplina WHERE nomedisciplina = :nomedisciplina");
  $stmt->bindParam(':nomedisciplina', $nomedisciplina);

  $stmt->execute();

  header("Location: index.php");
  exit();
}

