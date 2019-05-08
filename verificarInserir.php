
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $senha = sha1($senha);
    $pdo = new PDO('mysql:host=localhost;dbname=joaquim', 'root', '');
    $stmt = $pdo->prepare('select * from usuarios where nome=:nome and senha_hash=:senha');
    $param = array(':nome'=>$usuario, ':senha'=>$senha);
    $stmt->execute($param);
    $result = $stmt->rowCount();

    echo '<br>';
    if($result) {
        echo " Logado com sucesso";
    }
    else {
        echo "Problemas ao logar";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Uso de hash</title>
</head>
<body>
<BR>
Verificar inserir PDO
<form action="verificarInserir.php" method="POST">
    Usuário:<br>
    <input type="text" name="usuario"><br><br>
    Senha:<br>
    <input type="text" name="senha"><br><br>
    <input type="submit" value="inserir">
</form>
</body>
</html>