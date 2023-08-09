<!DOCTYPE html>
<html lang="PT-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Disciplina</title>
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

        input[type="number"]{
            
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
        <h1>Inserir Disciplinas</h1>

        <form method="post" action="inserirdisc.php">
            <p>Nome: <br> <input type="text" placeholder="Digite a disciplina" name="nomedisciplina" required></p>
            <p style="display: inline-block; margin-right:20px;">CargaHoraira: <br> <input type="text" placeholder="Digite a carga horaria" name="ch"  maxlength="4" required></p>
            <p style="display: inline-block; margin-right:20px;">Semestre: <br> <input type="text" placeholder="Digite o semestre" name="semestre" maxlength= "2"required></p>
            <p style="display: inline-block;">Id do Professor: <br> <input type="text" placeholder="Digite o id do professor" name="idprofessor" maxlength= "50" required></p>
            <input type="submit" value="Cadastrar"><br>
            <a class="retornar" href="index.php">Gerenciamento de Disciplina</a>
        </form>
    </div>
</body>
</html>

<?php
require_once "../conexao.php";

if (isset($_POST['nomedisciplina'])) {

    $nomedisciplina = $_POST["nomedisciplina"];
    $ch = $_POST["ch"];
    $semestre = $_POST["semestre"];
    $idprofessor = $_POST["idprofessor"];
    $stmt = $conexao->prepare("INSERT INTO disciplina (nomedisciplina, ch, semestre, idprofessor) VALUES (:nomedisciplina, :ch, :semestre, :idprofessor)");
    $stmt->bindParam(':nomedisciplina', $nome);
    $stmt->bindParam(':ch', $ch);
    $stmt->bindParam(':semestre', $semestre);
    $stmt->bindParam(':idprofessor', $idprofessor);

    $stmt->execute();

    header("Location: index.php");

}
?>
