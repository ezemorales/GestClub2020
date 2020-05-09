<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$apellido = (isset($_POST['apellido'])) ? $_POST['apellido'] : '';
$dni = (isset($_POST['dni'])) ? $_POST['dni'] : '';
$fecha_nac = (isset($_POST['fecha_nac'])) ? $_POST['fecha_nac'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id_persona = (isset($_POST['id_persona'])) ? $_POST['id_persona'] : '';


switch($opcion){
    case 1:
        $consulta = "INSERT INTO personas(nombre, apellido,dni, fecha_nac) VALUES('$nombre', '$apellido', '$dni','$fecha_nac') ";            
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 
        
        $consulta = "SELECT * FROM personas ORDER BY id_persona DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);       
        break;    
    case 2:        
        $consulta = "UPDATE personas SET nombre='$nombre', apellido='$apellido', fecha_nac='$fecha_nac', dni='$dni' WHERE id_persona='$id_persona' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT * FROM personas WHERE id_persona='$id_persona' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 3:        
        $consulta = "UPDATE personas SET id_estado = 2 , fecha_baja = curdate(), fecha_alta = NULL WHERE id_persona = '$id_persona'";  
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;
    case 4:    
        $consulta = "SELECT * FROM personas";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;