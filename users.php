<?php
session_start();

echo "<br> Usuários cadastrados: nome" . $_SESSION["name"] . " e seu telefone é " . $_SESSION["number"];

try {
    $conn = new PDO('mysql:host=localhost;dbname=QUESTAO1', "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM USUARIO";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();

    foreach ($result as $value) {
        echo '<h6>Nome: ', $value['NOME_USUARIO'], '</h6><br>', '<h6>Telefone: ', $value['NUM'], '</h6><br>';
    }
} catch (PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
?>

