<?php
session_start();
include('bd.php');
// Verificar se o usuário está logado
if (!isset($_SESSION['idPessoa'])) {
  
}
// Processar o formulário de inserção de pessoa
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nomePessoa = $_POST['nome_pessoa'];
    $leito = $_POST['leito'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $prontuario = $_POST['prontuario'];
    // Verifica se os campos não estão vazios
    if (!empty($nomePessoa) && !empty($email)) {
        // Inserir a pessoa no banco de dados
        $sql = "INSERT INTO Pessoa (Nome, Leito, Email, Telefone, Prontuario) 
                VALUES ('$nomePessoa', '$leito', '$email', '$telefone', '$prontuario')";
        if ($conn->query($sql) === TRUE) {
            echo "Nova pessoa inserida com sucesso!";
        } else {
            echo "Erro: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Nome e Email são obrigatórios!";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserir Pessoa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .form-container {
            width: 80%;
            max-width: 600px;
            margin: 0 auto;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="email"], input[type="number"], textarea, input[type="submit"] {
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
            text-align: center;
        }
        .gif-container {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Inserir Nova Pessoa</h2>
    
    <div class="form-container">
        <form method="POST">
            <div class="form-group">
                <label for="nome_pessoa">Nome:</label>
                <input type="text" id="nome_pessoa" name="nome_pessoa" required>
            </div>
            <div class="form-group">
                <label for="leito">Leito:</label>
                <input type="number" id="leito" name="leito">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="telefone">Telefone:</label>
                <input type="text" id="telefone" name="telefone" required>
            </div>
            <div class="form-group">
                <label for="prontuario">Prontuário:</label>
                <textarea id="prontuario" name="prontuario"></textarea>
            </div>
            <div class="form-group">
                <input type="submit" value="Inserir Pessoa">
            </div>
        </form>
    </div>

    <div class="link">
        <a href="../login/login.php">Logout</a>
    </div>

    <div class="gif-container">
        <img src="https://cdn.streamelements.com/uploads/2b46ad7f-1d1f-4c14-8978-b15a26b92a0b.gif" alt="GIF de inserção">
    </div>
</body>
</html>
