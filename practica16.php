<link href="style.css" rel="stylesheet" type="text/css">
<?php   
    // creamos una instancia de la clase
    $persona = new Persona();

    // asignamos los atributos obtenidos por POST
    $persona->setNombre($_POST["nombre"]);
    $persona->setEdad($_POST["edad"]);
    $persona->setPeso($_POST["peso"]);
    $persona->setAltura($_POST["altura"]);

    // mostramos el IMC
    echo "Hola ". $persona->getNombre();
    echo "<h1>Tu Indice de Masa Corporal es:<br/>".round($persona->imc(),2)."</h1>";
    echo "Para tus ".$persona->getEdad()." años el IMC es normal";

    class Persona{ // Declaramos la clase
        // Definimos los atributos de la clase
        public $nombre;
        public $altura;
        public $peso;
        public $edad;

        // constructor de la clase
        public function __construct(){}

        // getters
        public function getNombre(){ return $this->nombre; }
        public function getAltura(){ return $this->altura; }
        public function getPeso(){   return $this->peso;   }
        public function getEdad(){   return $this->edad;   }

        // setters
        public function setNombre($nombre){ $this->nombre = $nombre; }
        public function setAltura($altura){ $this->altura = $altura; }
        public function setPeso($peso){     $this->peso = $peso;     }
        public function setEdad($edad){     $this->edad = $edad;     }

        // metodos para operaciones
        public function imc(){
            return $this->getPeso() / ($this->getAltura() * $this->getAltura());
        }
    }
?>