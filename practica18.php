 <link href="style.css" rel="stylesheet" type="text/css">
 <?php

   // instanciamos un objeto    
    $ecuacion = new Ecuacion();

    // pasamos los valores de las variables a las variables de la clase
    $ecuacion->setA($_POST["a"]);
    $ecuacion->setB($_POST["b"]);
    $ecuacion->setC($_POST["c"]);

    // usamos el método Soluciones para resolver la ecucación
    $ecuacion->Soluciones();


    class Ecuacion{
        // atributos
        private $a;
        private $b;
        private $c;

        // constructor
        public function __construct(){ }

        // destructor de la clase
        public function __destruct() { } 

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
            $D = $this->getB()**2 - 4 * $this->getA() * $this->getC(); // b^2 - 4ac
            return $D;
        }

        public function Soluciones(){
            if ( $this->Discriminante() < 0) { // si D<0 no se puede encontrar una raiz negativa, no hay respuestas
                echo "No existen soluciones!";
            }else if( $this->Discriminante() == 0){ // si D==0 las dos respuestas son iguales, solo existe una solución
                // x = -b +- sqrt(b^2-4*a*c)/2*a
                echo "X1 = ". (-$this->getB() + sqrt($this->Discriminante()) / (2 * $this->getA()))."<br/>";
                echo "X2 = ". (-$this->getB() - sqrt($this->Discriminante()) / (2 * $this->getA()));
            }else{ // si D>0 existen 2 soluciones
                echo "X1 = ". (-$this->getB() + sqrt($this->Discriminante()) / (2 * $this->getA()))."<br/><br/>";
                echo "X2 = ". (-$this->getB() - sqrt($this->Discriminante()) / (2 * $this->getA()));
            }
        }
    }

 
 ?>