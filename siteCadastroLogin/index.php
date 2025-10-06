<?php 
    require_once 'conexao.php';

    $nome = $email = $senha = '';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image" href="img/casa.png">
    <title>Cadastro</title>
</head>
<body>
    <div class="containerMain">
        <div class="containerMenu">
            <div class="containerIcon">
                <div class="icon">
                    <img src="img/casa.png" alt="">
                </div>
            </div>
            <div class="containerInfo">
                <div class="info">
                    <a href="index.php"><p>Cadastrar</p></a>
                    <a href="login.php"><p>Login</p></a>
                </div>
            </div>
        </div>

        <div class="containerCadastro">
            <div class="cadastro">
                <div class="containerTitulo">
                    <p>CADASTRE-SE</p>
                </div>
                <div class="containerForm">
                    <form method="post">
                        <input type="text" placeholder="Nome..." name="nome">
                        <input type="text" placeholder="Email..." name="email">
                        <input type="password" placeholder="Senha..." name="senha">
                        <button>Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>  
            <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nome = trim($_POST['nome']);
            $email = trim($_POST['email']);
            $senha = trim($_POST['senha']);
            $isAdm = 0; 

            if (empty($nome) || empty($email) || empty($senha)) {
                echo "<div class='informacao'><p>Todos os campos são obrigatórios!</p></div>";
            } else {
                try {
                    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

                    $sql = "INSERT INTO usuario (nome, email, senha, isAdm) VALUES (:nome, :email, :senha, :isAdm)";
                    $stmt = $conn->prepare($sql);

                    $stmt->execute([
                        'nome' => $nome,
                        'email' => $email,
                        'senha' => $senhaHash, 
                        'isAdm' => $isAdm
                    ]);

                    header("Location: index.php");
                    exit();
                } catch (PDOException $e) {
                    echo "<div class='informacao'><p>Erro ao cadastrar: " . $e->getMessage() . "</p></div>";
                }
            }
        }
        ?>
</body>
</html>
