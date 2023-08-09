<?php

require_once "../conexao.php";

if (!isset($_GET["id"])) {
  header("Location: index.php");
  exit();
}

$id = $_GET["id"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nome = $_POST["nome"];
  $idade = $_POST["idade"];
  $datanascimento = $_POST["datanascimento"];
  $endereco = $_POST["endereco"];
  $estatus = $_POST["estatus"];

  $stmt = $conexao->prepare("UPDATE aluno SET nome = :nome, idade = :idade, datanascimento = :datanascimento, endereco = :endereco, estatus = :estatus WHERE id = :id");
  $stmt->bindParam(':id', $id);
  $stmt->bindParam(':nome', $nome);
  $stmt->bindParam(':idade', $idade);
  $stmt->bindParam(':datanascimento', $datanascimento);
  $stmt->bindParam(':endereco', $endereco);
  $stmt->bindParam(':estatus', $estatus);

  $stmt->execute();

  header("Location: index.php");
  exit();
}

$stmt = $conexao->prepare("SELECT * FROM aluno WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();
$aluno = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="PT-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Alterar Aluno</title>
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
            margin: 80px auto;
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
            font-size: 17px;
        }

    a.retornar:hover {
      background-color: #7d6235;
    }

    form {
      margin-top: 20px;
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
      font-size: 14px;
    }

    input[type="submit"] {
      display: block;
      width: 100%;
      padding: 10px;
      background-color: #9a7c48;
      color: #fff;
      border: none;
      border-radius: 30px;
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
    <h1>Alterar Aluno</h1>
    <form method="post">
      <a class="retornar" href="index.php">Controle de Alunos</a>
      <p> <br> <input type="hidden" name="id" value="<?php echo $aluno['id']; ?>"></p>
      <p>Nome: <br> <input type="text" placeholder="Digite seu nome" name="nome" maxlength= "50" required value="<?php echo $aluno['nome']; ?>"></p>
      <p>Idade: <br> <input type="number" placeholder="Digite sua idade" name="idade" required value="<?php echo $aluno['idade']; ?>"></p>
      <p>Data de Nascimento: <br> <input type="date" placeholder="Digite sua data de nascimento" name="datanascimento" required value="<?php echo $aluno['datanascimento']; ?>" ></p>
      <p>Endereço: <br> <input type="text" placeholder="Digite seu endereço" name="endereco" maxlength= "100" required value="<?php echo $aluno['endereco']; ?>"></p>
      <p>Status: <br> 
        <select name="estatus" id="estatus" required>
          <option value="<?php echo $aluno['estatus']; ?>"><?php echo $aluno['estatus']; ?></option>
          <option value="Aprovado">Aprovado</option>
          <option value="Reprovado">Reprovado</option>
          <option value="Trancado">Trancado</option>
        </select> <br> <br>
        <input type="submit" value="Alterar"><br>
    </form>
  </div>
</body>
</html>