<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema</title>
    <style>
        body {
            font-family: 'Arial Narrow', Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color:#F5DEB3;
            color: #333;
        }

        .caixa {
            width: 80%;
            max-width: 800px;
            margin: 150px auto;
            background-color: #e3d9cc;
            padding: 60px;
            border-radius: 40px;
            box-shadow: 0 0 40px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #704214;
        }

        a {
            display: block;
            text-align: center;
            padding: 15px;
            margin-bottom: 10px;
            background-color: #9a7c48;
            color: #fff;
            text-decoration: none;
            border-radius: 30px;
            transition: background-color 0.3s ease;
            font-size: 18px;
        }

        a:hover {
            background-color: #7d6235;
        }

        
    </style>
</head>

<body>
    <div class="caixa">
        <h1>Sistema de Gerenciamento Escolar</h1>
        <a href="sisalunos/index.php">Controle de Alunos</a>
        <a href="sisprofessor/index.php">Controle de Professores</a>
        <a href="sisdisciplina/index.php">Controle de Disciplinas</a>
    </div>
</body>
</html>
