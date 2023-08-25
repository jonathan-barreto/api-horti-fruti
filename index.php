<?php
// Configurações do banco de dados
$dbHost = 'localhost';
$dbName = 'hortfruit';
$dbUser = 'root';
$dbPass = '';

// Conexão com o banco de dados usando PDO
try {
    $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8mb4", $dbUser, $dbPass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro ao conectar ao banco de dados: " . $e->getMessage());
}

// API endpoint para retornar dados do banco de dados
try {
    // Consulta SQL
    $sql = "SELECT * FROM frutas";

    // Executa a consulta
    $stmt = $pdo->query($sql);

    // Obtém os resultados
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Retorna os resultados como JSON
    header('Content-Type: application/json');
    echo json_encode($results);
} catch (PDOException $e) {
    die("Erro na consulta: " . $e->getMessage());
}
