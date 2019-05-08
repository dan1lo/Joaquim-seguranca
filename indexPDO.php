
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $pdo = new PDO('mysql:host=localhost;dbname=joaquim', 'root', '');
    $stmt = $pdo->prepare('select nome, senha from usuarios where nome = :nome and senha =:senha');
    $stmt->bindValue(':nome',$usuario );
    $stmt->bindValue(':senha', $senha);
    $run = $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    var_dump($result);
    echo '<br>';
    if($result) {
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
Teste com pdo
<form action="indexPDO.php" method="POST">
    Usuário:<br>
    <input type="text" name="usuario"><br><br>
    Senha:<br>
    <input type="text" name="senha"><br><br>
    <input type="submit" value="Logar">
</form>
</body>
</html>