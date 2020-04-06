<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="style.css" rel="stylesheet" type="text/css">
    <title>Práctica 30</title>
</head>
<body>
    <h2>CONSULTAS</h2>
</body>
</html> 

<?php
    class Conexion {
        // atributos
        private $servidor;
        private $usuario;
        private $contraseña;
        private $base;
        private $conexion;

        // constructor
        public function __construct($servidor,$usuario,$contraseña,$base){
            $this->servidor = $servidor;
            $this->usuario = $usuario;
            $this->contraseña = $contraseña;
            $this->base = $base;
        }

        // destructor
        public function __destruct(){ }

        // en este caso no se crearan los getters y setters
        

        // función para hacer la conexión a la base
        public function Conectar(){
            $this->conexion = new mysqli($this->servidor,$this->usuario,$this->contraseña,$this->base);
            if($this->conexion->connect_errno){
                die("Error al conectarse a la base de datos!".$this->conexion->connect_error);
            }
        }

        // función para cerrar la conexión
        public function Desconectar(){
            $this->conexion->close();
        }

        // función para ejecutar las consultas
        public function Consulta($sql){
            $result = $this->conexion->query($sql);
            return $result;
        }

        // función para contar las filas de resultado de la consulta
        public function TotalRegistros(){
            return $this->conexion->affected_rows;
        }

        // función para regresar la última fila de una consulta en forma de arreglo
        public function ObtenRegistro($result){
            return $result->fetch_row();
        }

        // función para liberar la consulta
        public function LimpiaConsulta($result){
            $result->free_result();
        }

    }


// aqui probaremos la clase hecha

$bd = new Conexion("localhost","root","","proyecto"); // creamos el objeto
$bd->Conectar(); // hacemos la conexión


if(isset($_POST['opc'])){
    $seleccion = $_POST['opc'];

if($seleccion == "create")
{
    // ---------------------------------------------------------------------------------------------------
    // HACEMOS UNA INSERCIÓN DE DATOS
    // ---------------------------------------------------------------------------------------------------

    $query = 
            "INSERT INTO usuarios(idUsuario, nombre, ApPaterno, ApMaterno, edad) 
            VALUES (DEFAULT,'José','Rojas','Gómez','21')";

    $result = $bd->Consulta($query);
        if($result){
            $RowCount =  $bd->TotalRegistros();
            if($RowCount > 0){
                echo "<h2>Usuario insertado exitosamente</h2><BR>";
            }
        }else{
            echo "<h3>Error ejecutando la consulta</h3>";
        } 
}
else if($seleccion == "read")
{
    // ------------------------------------------------------------------------------------------------------
    // HACEMOS UNA CONSULTA
    // ------------------------------------------------------------------------------------------------------

    $query = "SELECT * FROM usuarios";
    $result = $bd->Consulta($query);

    if($result){
        while($row=$bd->ObtenRegistro($result)){
    
            echo "<br/><br/>ID: ".$row[0]."<br/>Nombre: ".$row[1]."<br/>Apellido Paterno:".$row[2]."<br/>Apellido Materno: ".$row[3]. "<br/>Edad: ".$row[4];
    
        }
        
        $bd->LimpiaConsulta($result);
    
    }else{
        echo "<br/><br/><h3>Error generando la consulta</h3>";
    }
}
else if($seleccion == "update")
{
    // -------------------------------------------------------------------------------------------------------
    // ACTUALIZAMOS UN REGISTRO
    // -------------------------------------------------------------------------------------------------------
    
    $query = "UPDATE usuarios 
            SET edad = 30 
            WHERE nombre = 'José'";

    $result = $bd->Consulta("$query");

    if($result){
        if($result>0){
            echo "<h2>Registro actualizado correctamente!</h2>";
        }
    } else{
        echo "<h2>Error al ejecutar la consulta</h2>";
    }
}
else if($seleccion == "delete")
{
    // ------------------------------------------------------------------------------------------------------
    // ELIMINAMOS UN REGISTRO
    // ------------------------------------------------------------------------------------------------------

    $query = "DELETE FROM usuarios 
            WHERE nombre = 'José'";

    $result = $bd->Consulta($query);

    if($result){
        $RowCount = $bd->TotalRegistros();
        if($RowCount>0){
            echo "<h2>Registro eliminado con éxito!</h2>";
        }
    }
    else{
            echo "<h3>Error eliminar el registro!</h3>";
    }   
}else{
    echo "ERROR, NO SELECCIONASTE UNA OPCION!";
}
  
// Cerramos la Conexion a la BD
$bd->Desconectar();

}else{
    echo "Selecciona una opción!";
}
?>