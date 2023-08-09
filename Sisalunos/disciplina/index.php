<?php

require_once "../conexao.php";

$stmt = $conexao->prepare("SELECT * FROM disciplina");
$stmt->execute();
$disciplinas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Disciplina</title>
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
            margin: 100px auto;
            background-color: #e6d8c5;
            padding: 60px;
            border-radius: 40px;
            box-shadow: 0 0 40px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #704214;
        }

        a.voltar {
            font-size: 18px;
            display: block;
            text-align: center;
            margin-bottom: 15px;
            background-color: #9a7c48;
            color: #fff;
            border-radius: 35px;
            padding: 10px 12px;
            transition: background-color 0.3s ease;
        }

        a.voltar:hover {
            background-color: #7d6235;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            text-align: left;
         
        }

        th {
            background-color: #9a7c48;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2e2c9;
        }

        tr:hover {
            background-color: #f5d5a4;
        }

        
        a.alterar {
            display: block;
            margin-right: 15px;
            padding: 8px 8px;
            background-color: #964b00;
            color: #fff;
            text-decoration: none;
            border-radius: 3px;
            transition: background-color 0.3s ease;
        }

        a.alterar:hover {
            background-color: #386794;
        }

        a.excluir {
            display: block;
            margin-right: 15px;
            padding: 8px 8px;
            background-color: #b85151;
            color: #fff;
            text-decoration: none;
            border-radius: 3px;
            transition: background-color 0.3s ease;
        }

        a.excluir:hover {
            background-color: #943a3a;
        }

        a.inserir {
            font-size: 18px;
            display: block;
            text-align: center;
            margin-top: 20px;
            padding: 10px;
            background-color: #9a7c48;
            color: #fff;
            text-decoration: none;
            border-radius: 35px;
            transition: background-color 0.3s ease;
        }

        a.inserir:hover {
            background-color: #7d6235;
        }
    </style>
</head>
<body>
    <div class="caixa">
        <h1>Controle de Disciplina</h1><br>
        <a class="voltar" href="../index.php">Controle do Sistema</a>
        <br>
        <table>
            <tr>
                <th>Nome</th>
                <th>CARGA HORARIA</th>
                <th>SEMESTRE</th>
                <th>IdDisciplina</th>
                <th>Ações</th>
    
            </tr>
            <?php foreach ($disciplinas as $disciplina) { ?>
                <tr>
                    <td><?php echo $disciplina['nomedisciplina']; ?></td>
                    <td><?php echo $disciplina['ch']; ?></td>
                    <td><?php echo $disciplina['semestre']; ?></td>
                    <td><?php echo $disciplina['id']; ?></td>
                    <td>
                        <a class="alterar" href="alterardisc.php?id=<?php echo $disciplina['id']; ?>">Alterar</a> <br>
                        <a class="excluir" href="excluir.php?id=<?php echo $disciplina['id']; ?>">Excluir</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <br>
        <br>
        <a class="inserir" href="inserirdisc.php">Inserir Disciplina</a> <br>
    </div>
</body>
</html>
