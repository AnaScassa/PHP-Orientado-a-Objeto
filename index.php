
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orientado Objeto</title>
</head>
<body>
</body>
</html>

<?php

// Incluindo a definição da classe Carro
require_once 'Carro.php'; // esse serve para chama a classe

//Criando o primeiro objeto(instancia) da classe Carro
$meuFusca = new Carro();
$meuFusca-> cor = "Azul";
$meuFusca->marca = "Volkswagen";
$meuFusca->modelo = "Fusca";

//criando o segundo objeto da classe
$meuGol = new Carro();
$meuGol-> cor = "Vermelho";
$meuGol->marca = "Volkswagen";
$meuGol->modelo = "Gol";

//acessando as propriedades e métodos dos objetos
echo "Meu primeiro carro é um {$meuFusca->marca} {$meuFusca->modelo} da cor {$meuFusca->cor}<br>";
$meuFusca->ligar();
$meuFusca->acelerar();
echo "<br>";
echo "Meu segundo carro é um {$meuGol->marca} {$meuGol->modelo} da cor {$meuGol->cor}<br>";
$meuGol->ligar();
$meuGol->acelerar();

echo "<form method='post'>"; // não esquecer que precisa do form
echo "<input type='number' placeholder='Quantos anos vc tem?' name='idade'>";   
echo "<br><button type='submit' name='submitidade' class='botao'>Salvar idade</button><br>";
echo "</form>";

require_once 'pessoa.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submitidade'])) {
$novaidade = new pessoa();
$novaidade->idade = htmlspecialchars($_POST['idade'] ?? 'Não informado');
$novaidade->verificar();
}
?>
