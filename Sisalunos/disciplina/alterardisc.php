<?php

require_once "../conexao.php";

if (!isset($_GET["id"])) {

  header("Location: index.php");
  exit();
}

$id = $_GET["id"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nomedisciplina = $_POST["nomedisciplina"];
  $CH = $_POST["ch"];
  $semestre = $_POST["semestre"];
  $idprofessor = $_POST["idprofessor"];

  $stmt = $conexao->prepare("UPDATE disciplina SET nomedisciplina = :nomedisciplina, ch = :ch, semestre = :semestre, idprofessor = :idprofessor  WHERE idprofessor = :idprofessor");
  $stmt->bindParam(':id', $id);
  $stmt->bindParam(':nomedisciplina', $nomedisciplina);
  $stmt->bindParam(':ch', $ch);
  $stmt->bindParam(':semestre', $semestre);
  $stmt->bindParam(':idprofessor', $idprofessor);

  $stmt->execute();

  header("Location: index.php");
  exit();
}

$stmt = $conexao->prepare("SELECT * FROM disciplina WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();
$disciplina = $stmt->fetch(PDO::FETCH_ASSOC);

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
<h1>Alterar Disciplina</h1>
      <form method="post">
            <p> <br> <input type="hidden" name="id" value="<?php echo $disciplina['id']; ?>"></p>

            <p>Nome: <br> <input type="text" placeholder="Digite o nome da disciplina" name="nomedisciplina" maxlength= "100" required value="<?php echo $disciplina['nomedisciplina']; ?>"></p>
            
            <p>Carga Horária: <br> <input type="number" placeholder="Digite a carga horária" name="ch" maxlength= "3" required value="<?php echo $disciplina['ch']; ?>"></p>
            
            <p>Semestre: <br> <input type="number" placeholder="Digite o semestre" name="semestre" maxlength= "5" required value="<?php echo $disciplina['semestre']; ?>" ></p>
            
            <p>ID da Disciplina: <br> <input type="number" placeholder="Digite o ID da disciplina" name="idprofessor" required value="<?php echo $disciplina['idprofessor']; ?>"></p>
          <br>
        <input type="submit" value="Alterar"><br>
        <a class="retornar" href="index.php">Gerenciar Disciplinas</a>
    </form>
  </div>
</body>
</html>



