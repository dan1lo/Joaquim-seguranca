
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $senha = sha1($senha);
    $pdo = new PDO('mysql:host=localhost;dbname=joaquim', 'root', '');
    $stmt = $pdo->prepare('insert into usuarios(nome,senha_hash) values(:nome,:senha)');
    $param = array(':nome'=>$usuario, ':senha'=>$senha);
    $stmt->execute($param);
    $result = $stmt->rowCount();

    echo '<br>';
    if($result) {
        echo "cadastrado com sucesso";
    }
    else {
        echo "Problemas ao cadastrar";
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
Inserir dados
<form action="inserir.php" method="POST">
    Usuário:<br>
    <input type="text" name="usuario"><br><br>
    Senha:<br>
    <input type="text" name="senha"><br><br>
    <input type="submit" value="inserir">
</form>
</body>
</html>