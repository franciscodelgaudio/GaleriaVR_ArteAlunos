<?php
// Conexão com o banco de dados (substitua pelos seus próprios detalhes de conexão)
include 'conexao.php';

// ID da imagem que você deseja recuperar (substitua pelo seu próprio ID)
$imagem_id = 1;

// Consulta para recuperar a imagem
$consulta = "SELECT imagem FROM formulario WHERE codigo = $imagem_id";
$resultado = mysqli_query($conn, $consulta);

// Verifique se a consulta foi bem-sucedida
if ($resultado) {
    $linha = mysqli_fetch_assoc($resultado);
    $imagem_blob = $linha['imagem'];

    // Codifique a imagem em base64
    $imagem_base64 = base64_encode($imagem_blob);

    // Exiba a imagem na página HTML
    echo '<img src="data:image/jpeg;base64,' . $imagem_base64 . '" alt="Minha Imagem">';
} else {
    echo "Erro ao recuperar a imagem do banco de dados.";
}
?>
