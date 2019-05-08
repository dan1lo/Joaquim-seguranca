<?php
$login = "Um teste de or '1='1;";
echo $login;
echo '<br>';
$resultado = preg_replace('/[^[:alpha:]_]/', '',$login);
echo $resultado;
?>
<br>
<?php
$senha = "Um teste de or '1='1;";
$resultado = preg_replace('/[^[:alnum:]_]/', '',$senha);
echo $resultado;
?>