<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Professor</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"],
        input[type="email"] {
            width: 98%;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Inserir Arte</h1>
        <form action="inserir.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nome">Nome do artista:</label>
                <input type="text" id="nome" name="nome" required>
            </div>
            <div class="form-group">
                <label for="imagem">Selecione uma imagem:</label>
                <input type="file" name="imagem" id="imagem">
            </div>
            <input type="submit" value="Enviar">
        </form>
    </div>
</body>
</html>


<?php

include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome_aluno = $_POST['nome'];
    $imagem = $_FILES['imagem']['tmp_name'];
    $tamanho = $_FILES['imagem']['size'];

    if ($imagem != "none") {
        $fp = fopen($imagem, "rb");
        $conteudo_imagem = fread($fp, $tamanho);
        $conteudo_imagem = addslashes($conteudo_imagem);
        fclose($fp);

        // Insere a imagem no banco de dados
        $sql = "INSERT INTO formulario (aluno, imagem) VALUES ('$nome_aluno', '$conteudo_imagem')";
        if (mysqli_query($conn, $sql)) {
            echo "Imagem enviada e armazenada com sucesso!";
        } else {
            echo "Erro ao enviar a imagem: " . mysqli_error($conn);
        }
    } else {
        echo "Nenhuma imagem selecionada.";
    }
}

mysqli_close($conn);
?>
