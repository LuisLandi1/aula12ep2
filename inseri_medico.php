<?php
session_start();
include('bd.php');
if (!isset($_SESSION['idPessoa'])) {
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nomeMedicamento = $_POST['nome_medicamento'];
    
    if (!empty($nomeMedicamento)) {
        $sql = "INSERT INTO Medicamento (Nome) VALUES ('$nomeMedicamento')";
        if ($conn->query($sql) === TRUE) {
            echo "Novo medicamento inserido com sucesso!";
        } else {
            echo "Erro: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "O nome do medicamento não pode ser vazio.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserir Medicamento</title>
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
        input[type="text"], input[type="submit"] {
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
    <h2>Inserir Novo Medicamento</h2>
    
    <form method="POST">
        <div class="form-group">
            <label for="nome_medicamento">Nome do Medicamento:</label>
            <input type="text" id="nome_medicamento" name="nome_medicamento" required>
        </div>
        
        <input type="submit" value="Inserir Medicamento">
    </form>

    <div class="link">
        <a href="../login/login.php">Logout</a>
    </div>

    <div class="gif-container">
        <img src="https://img1.picmix.com/output/stamp/normal/6/7/8/8/2358876_0dff0.gif" alt="GIF de Medicamento">
    </div>
</body>
</html>
