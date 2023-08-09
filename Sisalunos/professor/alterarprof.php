<?php

require_once "../conexao.php";

if (!isset($_GET["id"])) {

  header("Location: index.php");
  exit();
}

$id = $_GET["id"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nome = $_POST["nome"];
  $cpf = $_POST["cpf"];
  $idade = $_POST["idade"];
  $datanascimento = $_POST["datanascimento"];
  $endereco = $_POST["endereco"];

  $stmt = $conexao->prepare("UPDATE professor SET nome = :nome, cpf = :cpf, idade = :idade, datanascimento = :datanascimento, endereco = :endereco WHERE id = :id");
  $stmt->bindParam(':id', $id);
  $stmt->bindParam(':nome', $nome);
  $stmt->bindParam(':cpf', $cpf);
  $stmt->bindParam(':idade', $idade);
  $stmt->bindParam(':datanascimento', $datanascimento);
  $stmt->bindParam(':endereco', $endereco);

  $stmt->execute();

  header("Location: index.php");
  exit();
}

$stmt = $conexao->prepare("SELECT * FROM professor WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();
$professor = $stmt->fetch(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Professor</title>
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
    <h1>Alterar Professor(a)</h1>
    <form method="post">
    <p> <br> <input type="hidden" name="id" value="<?php echo $professor['id']; ?>"></p>

<p>Nome: <br> <input type="text" placeholder="Digite seu nome" name="nome" maxlength= "100" required value="<?php echo $professor['nome']; ?>"></p>
<p>CPF: <br> <input type="number" placeholder="Digite seu CPF" name="cpf" maxlength= "11" required value="<?php echo $professor['cpf']; ?>"></p>
<p>Idade: <br> <input type="number" placeholder="Digite sua idade" name="idade" required value="<?php echo $professor['idade']; ?>"></p>
<p>Data de Nascimento: <br> <input type="date" placeholder="Digite sua data de nascimento" name="datanascimento" required value="<?php echo $professor['datanascimento']; ?>" ></p>
<p>Endereço: <br> <input type="text" placeholder="Digite seu endereço" name="endereco" maxlength= "100" required value="<?php echo $professor['endereco']; ?>"></p>
<br>


        <input type="submit" value="Alterar"><br>
    </form>
  </div>
</body>
</html>
