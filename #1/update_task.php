<?php
require 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Obtendo a tarefa atual
    $stmt = $pdo->prepare("SELECT * FROM tasks WHERE id = ?");
    $stmt->execute([$id]);
    $task = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $status = $_POST['status'];

        // Atualizando o status da tarefa
        $stmt = $pdo->prepare("UPDATE tasks SET status = ? WHERE id = ?");
        $stmt->execute([$status, $id]);

        header('Location: index.php');
        exit;
    }
} else {
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Status da Tarefa</title>
</head>
<body>
    <h1>Atualizar Status</h1>
    <form action="update_task.php?id=<?= $task['id'] ?>" method="POST">
        <label for="status">Status:</label><br>
        <select id="status" name="status" required>
            <option value="pending" <?= $task['status'] == 'pending' ? 'selected' : '' ?>>Pendente</option>
            <option value="completed" <?= $task['status'] == 'completed' ? 'selected' : '' ?>>Concluído</option>
        </select><br><br>

        <button type="submit">Atualizar</button>
    </form>
    <br>
    <a href="index.php">Voltar</a>
</body>
</html>
