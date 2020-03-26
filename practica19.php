
 <link href="style.css" rel="stylesheet" type="text/css">
 <?php
    // Creamos la clase
    class Fraccion{
        // Declaramos los atributos
        private $n1;
        private $d1;
        private $n2;
        private $d2;

        // Creamos un constructor
        public function __construct(){
            $this->n1 = 0;
            $this->d1 = 0;
            $this->n2 = 0;
            $this->d2 = 0;
         }

        // Creamos un destructor
        public function __destruct(){ }

        // Getters
        public function getN1(){
            return $this->n1;
        }
        public function getD1(){
            return $this->d1;
        }
        public function getN2(){
            return $this->n2;
        }
        public function getD2(){
            return $this->d2;
        }

        // Setters
        public function setN1($n1){
            $this->n1 = $n1;
        }
        public function setD1($d1){
            $this->d1 = $d1;
        }
        public function setN2($n2){
            $this->n2 = $n2;
        }
        public function setD2($d2){
            $this->d2 = $d2;
        }
        
        // Suma de fracciones
        public function Suma($n1,$d1,$n2,$d2){
            $this->setN1($n1);
            $this->setD1($d1);
            $this->setN2($n2);
            $this->setD2($d2);

            $num = ($this->getN1()*$this->getD2()) + ($this->getN2()*$this->getD1());
            $den = $this->getD1() * $this->getD2();
            echo "La fracción resultante es: ".$num."/".$den;
        }
    } // terminamos de crear la clase y sus métodos

    // instanciamos los objetos
    $f = new Fraccion();

    // Recibimos los valores del formulario por POST
    $f->Suma($_POST["n1"],$_POST["d1"],$_POST["n2"],$_POST["d2"]);
    echo "<br/><br/>Fracciones que se usaron: ".$f->getN1()."/".$f->getD1()." + ".$f->getN2()."/".$f->getD2();
?>