<?php
session_start();
include('bd.php');
if (!isset($_SESSION['IdReceita '])) {
}
$sql = "SELECT r.IdReceita, r.Descricao, p.Nome AS NomePessoa, m.Nome AS NomeMedico, i.Nome AS NomeInfermeiro, me.Nome AS NomeMedicamento
        FROM Receitas r
        JOIN Pessoa p ON r.cod_pessoa = p.IdPessoa
        JOIN Medico m ON r.cod_medico = m.IdMedico
        JOIN Infermero i ON r.cod_infermeiro = i.IdInfermero
        JOIN Medicamento me ON r.cod_medicamento = me.IdMedicamento";
$result = $conn->query($sql);
if (!$result) {
    echo "Erro na consulta SQL: " . $conn->error . "<br>";
    echo "Consulta SQL: " . $sql;
    die();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Receitas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .container {
            width: 80%;
            margin: 0 auto;
        }
        .table-container {
            margin-top: 20px;
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f4f4f4;
        }
        .no-records {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Lista de Receitas</h2>
        
        <?php if ($result->num_rows > 0): ?>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>ID Receita</th>
                            <th>Descrição</th>
                            <th>Paciente</th>
                            <th>Médico</th>
                            <th>Enfermeiro</th>
                            <th>Medicamento</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['IdReceita']); ?></td>
                                <td><?php echo htmlspecialchars($row['Descricao']); ?></td>
                                <td><?php echo htmlspecialchars($row['NomePessoa']); ?></td>
                                <td><?php echo htmlspecialchars($row['NomeMedico']); ?></td>
                                <td><?php echo htmlspecialchars($row['NomeInfermeiro']); ?></td>
                                <td><?php echo htmlspecialchars($row['NomeMedicamento']); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="no-records">
                <p>Não há receitas cadastradas.</p>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
