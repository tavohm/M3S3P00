 <link href="style.css" rel="stylesheet" type="text/css">
 <?php

    $ecuacion = new Ecuacion();

    $ecuacion->setA($_POST["a"]);
    $ecuacion->setB($_POST["b"]);
    $ecuacion->setC($_POST["c"]);

    $ecuacion->Soluciones();

    class Ecuacion{
        // atributos
        private $a;
        private $b;
        private $c;

        // constructor
        public function __construct(){ }

        // getters
        public function getA(){
            return $this->a;   
        }
        public function getB(){
            return $this->b;   
        }
        public function getC(){
            return $this->c;   
        }        

        // setters
        public function setA( $a ){
            $this->a = $a;
        }
        public function setB( $b ){
            $this->b = $b;
        }
        public function setC( $c ){
            $this->c = $c;
        }

        // Discriminante, si D<0 no hay soluciones, si D == 0 hay una solución y si D>0 hay dos soluciones.
        public function Discriminante(){
            $D = $this->getB()**2 - 4 * $this->getA() * $this->getC();
            return $D;
        }

        public function Soluciones(){
            if ( $this->Discriminante() < 0) {
                echo "No existen soluciones!";
            }else if( $this->Discriminante() == 0){
                echo "X = ". (-$this->getB() + sqrt($this->Discriminante()) / (2 * $this->getA()));
            }else{
                echo "X1 = ". (-$this->getB() + sqrt($this->Discriminante()) / (2 * $this->getA()))."<br/><br/>";
                echo "X2 = ". (-$this->getB() - sqrt($this->Discriminante()) / (2 * $this->getA()));
            }
        }
    }

 ?>