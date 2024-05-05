<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'galeria';

$conn = mysqli_connect($host, $username, $password, $dbname);

if ($conn) {
    echo "Conexão com o banco de dados estabelecida com sucesso!";
} else {
    echo "Não foi possível conectar ao banco de dados. Erro: " . mysqli_connect_error();
}

?>