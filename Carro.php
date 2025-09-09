<?php
// aqui vamos salvar as variaveis 
class Carro{
    public $cor;
    public $marca;
    public $modelo;

        //método (ações)
    public function ligar(){
        echo "O carro stá lgado!<br>";
    }
     
    public function acelerar(){
        echo "O carro esta acelerando...<br>";
    }

    public function frear(){
        echo "O carro esta freando. <br>";
    }
}

?>