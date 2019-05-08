<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //mysql_connect('localhost', 'root', '');
    //mysql_select_db('joaquim');
    $db = new mysqli('localhost','root', '', 'joaquim');

    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $result = $db->multi_query(
        "select nome from usuarios where nome='$usuario' ");
    if ($result->mysqli_num_rows() > 0) {
        echo "usuário logado com sucesso";
    } else {
        echo "Problemas no login";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sql Injector</title>
</head>
<body>
<BR>
AULA DE SQL INJECTOR
<form action="index2.php" method="POST">
    Usuário:<br>
    <input type="text" name="usuario"><br><br>
    Senha:<br>
    <input type="text" name="senha"><br><br>
    <input type="submit" value="Logar">
</form>
</body>
</html>