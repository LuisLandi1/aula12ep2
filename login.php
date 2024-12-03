<?php
session_start();
include('bd.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $tipo_usuario = $_POST['tipo_usuario']; // Médico ou Enfermeiro
    // Consulta SQL para verificar se o usuário existe
    $sql = "SELECT * FROM Pessoa WHERE Email = '$email' AND Senha = '$senha'";  // Lembre-se de adicionar uma coluna 'Senha' na tabela Pessoa
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // Se o usuário for encontrado, salvar os dados na sessão
        $row = $result->fetch_assoc();
        $_SESSION['idPessoa'] = $row['IdPessoa'];
        $_SESSION['nome'] = $row['Nome'];
        // Redireciona para a página de inserção do tipo de usuário
        if ($tipo_usuario == 'medico') {
            header("Location: ../inserir/inserir_medico.php");
        } else if ($tipo_usuario == 'infermeiro') {
            header("Location: ../inserir/inserir_infermeiro.php");
        }
        exit;
    } else {
        echo "Credenciais inválidas.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .container {
            width: 40%;
            margin: 0 auto;
            background-color: #f4f4f4;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            font-weight: bold;
        }
        input[type="email"], input[type="password"], select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .message {
            text-align: center;
            margin-top: 20px;
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form method="POST">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required>
            </div>
            <div class="form-group">
                <label for="tipo_usuario">Tipo de Usuário:</label>
                <select id="tipo_usuario" name="tipo_usuario" required>
                    <option value="medico">Médico</option>
                    <option value="infermeiro">Enfermeiro</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" value="Entrar">
            </div>
        </form>
        <div class="message">
            <?php if (isset($error_message)) echo $error_message; ?>
        </div>
    </div>
</body>
</html>
