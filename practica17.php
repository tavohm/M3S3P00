<link href="style.css" rel="stylesheet" type="text/css">
<?php
    // creamos una instancia de la clase
    $operacion = new Operaciones();

    // asignamos los atributos obtenidos por POST
    $operacion->setNum1($_POST["a"]);
    $operacion->setNum2($_POST["b"]);

    echo "Los valores son: ".$operacion->getNum1()." y ".$operacion->getNum2()."<br/><br/><br/>";
    echo "La suma es:".$operacion->Suma()."<br/><br/>";
    echo "La resta es:".$operacion->Resta()."<br/><br/>";
    echo "La multiplicación es:".$operacion->Multiplica()."<br/><br/>";
    echo "La división es:".$operacion->Dividir();

    class Operaciones { // Creamos la clase
        // Declaramos los atributos
        private $num1;
        private $num2;

        // Crear un constructor vacío
        public function __construct(){ }

        // Creamos los métodos
        //Getters
        public function getNum1(){
            return $this->num1;
        }
        public function getNum2(){
            return $this->num2;
        }
        // Setters
        public function setNum1($num){
            $this->num1 = $num;
        }
        public function setNum2($num){
            $this->num2 = $num;
        }

        // operaciones
        public function Suma(){
            return $this->getNum1() + $this->getNum2();
        }

        public function Resta(){
            return $this->getNum1() - $this->getNum2();
        }

        public function Multiplica(){
            return $this->getNum1() * $this->getNum2();
        }

        public function Dividir(){
            if($this->getNum2()==0){
                return 0;
            }else{
                return $this->getNum1() / $this->getNum2();
            }
        }

    }
?>