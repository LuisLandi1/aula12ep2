<?php
session_start();
include('bd.php');
if (!isset($_SESSION['idPessoa'])) {
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $receituario = $_POST['receituario'];
    $dataDemedicao = $_POST['data_demedicao'];
    $dataDosagem = $_POST['data_dosagem'];
    $codMedicamento = $_POST['cod_medicamento'];
    $codPessoa = $_SESSION['idPessoa'];
    $sql = "INSERT INTO Infermero (Receituario, DataDemedicao, DataDosagem, Cod_Medicamento, Cod_Pessoa)
            VALUES ('$receituario', '$dataDemedicao', '$dataDosagem', '$codMedicamento', '$codPessoa')";
    if ($conn->query($sql) === TRUE) {
        echo "Novo registro criado com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserir Receita - Enfermeiro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        textarea, input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: auto;
            cursor: pointer;
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
        }
        .link {
            margin-top: 20px;
        }
        .gif-container {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Inserir Receita - Enfermeiro</h2>
    <form method="POST">
        <div class="form-group">
            <label for="receituario">Receituário:</label>
            <textarea id="receituario" name="receituario" required></textarea>
        </div>
        <div class="form-group">
            <label for="data_demedicao">Data da Medicação:</label>
            <input type="date" id="data_demedicao" name="data_demedicao" required>
        </div>
        <div class="form-group">
            <label for="data_dosagem">Data de Dosagem:</label>
            <input type="datetime-local" id="data_dosagem" name="data_dosagem" required>
        </div>
        <div class="form-group">
            <label for="cod_medicamento">Código do Medicamento:</label>
            <input type="number" id="cod_medicamento" name="cod_medicamento" required>
        </div>
        <input type="submit" value="Inserir Receita">
    </form>
    <div class="link">
        <a href="../login/login.php">Logout</a>
    </div>
    <div class="gif-container">
        <img src="https://media.tenor.com/acIkaZGY2QMAAAAj/wolf-singing.gif" alt="Lobo cantando">
    </div>
</body>
</html>
