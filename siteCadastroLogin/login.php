<?php 
require_once 'conexao.php';
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" type="image" href="img/casa.png">
    <title>Login</title>
</head>
<body>
    <div class="containerMain">
        <div class="containerMenu">
            <div class="containerIcon">
                <div class="icon">
                    <img src="img/casa.png" alt="" />
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
                    <p>ENTRAR</p>
                </div>
                <div class="containerForm">
                    <form method="post">
                        <input type="text" placeholder="Email..." name="email" />
                        <input type="password" placeholder="Senha..." name="senha" />
                        <button>Logar</button>
                        <div class="esqueceuSenha">
                            <a href="esqueceuSenha.html"><p>Esqueceu sua senha? Clique aqui!</p></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);

    if (empty($email) || empty($senha)) {
        echo "<div class='informacao'><p>Todos os campos são obrigatórios!</p></div>";
    } else {
        try {
            $sql = "SELECT * FROM usuario WHERE email = :email";
            $stmt = $conn->prepare($sql);
            $stmt->execute(['email' => $email]);
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($usuario) {
                if (password_verify($senha, $usuario['senha'])) {
                    $_SESSION['id'] = $usuario['id'];
                    $_SESSION['email'] = $usuario['email'];
                    $_SESSION['isAdm'] = $usuario['isAdm'];

                    if ($usuario['isAdm'] == 1) {
                        header("Location: paginaRestrita.php");
                        exit();
                    } else {
                        header("Location: paginaNaoRestrita.php");
                        exit();
                    }
                } else {
                    echo "<div class='informacao'><p>Email ou senha incorretos!</p></div>";
                }
            } else {
                echo "<div class='informacao'><p>Email ou senha incorretos!</p></div>";
            }

        } catch (PDOException $e) {
            echo "<div class='informacao'><p>Erro ao tentar logar: " . $e->getMessage() . "</p></div>";
        }
    }
}
?>    
</body>
</html>
