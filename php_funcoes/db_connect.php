<?php //Conecta com o banco de dados
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'desafioEstagio';
$connect = mysqli_connect($host,$user,$pass,$db);
mysqli_set_charset($connect,"utf8");
if (mysqli_connect_error()):
       echo "Erro na conexao: ".mysqli_connect_error();
endif;
?>