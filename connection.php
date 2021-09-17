<?php
session_start();
$name = $_REQUEST["name"];
$number = $_REQUEST["number"];

$_SESSION["name"] = $name;
$_SESSION["number"] = $number;

try {
    $conn = new PDO('mysql:host=localhost;dbname=QUESTAO1', "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare('INSERT INTO USUARIO VALUES(?,?)');
    $stmt->bindParam(1, $name, PDO::PARAM_STR);
    $stmt->bindParam(2, $number, PDO::PARAM_STR);

    $stmt->execute();
} catch (PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conexão</title>
</head>

<body>
   <a href="users.php">Usuários cadastrados</a>
</body>

</html>