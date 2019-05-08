<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    //mysql_connect('localhost', 'root', '');
    //mysql_select_db('joaquim');
    $link = mysqli_connect("localhost", "root", "", "joaquim");
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $query = "select nome, senha from usuarios where nome='$usuario' and senha='$senha'";
    $result = mysqli_query($link, $query);
    $rows = mysqli_fetch_array($result, MYSQLI_BOTH);
    if($rows) {
        echo "usuário logado com sucesso";
    }
    else {
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
AULA DE SQL INJECTOR - site com falhas
<form action="index.php" method="POST">
    Usuário:<br>
    <input type="text" name="usuario"><br><br>
    Senha:<br>
    <input type="text" name="senha"><br><br>
    <input type="submit" value="Logar">
</form>
</body>
</html>