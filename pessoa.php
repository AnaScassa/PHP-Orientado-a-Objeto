<?php

 class pessoa{
        public $idade;

        public function verificar(){
            if( $this->idade  < 18 ){ // aqui precisa colocar o $this quando você está acessando
                                        //propriedades ou métodos dentro da própria classe.
                echo "Menor de idade não pode dirigir!<br>";
            }else{
                echo "Maior de idade pode dirigir<br>";
            }
        }
    }

?>