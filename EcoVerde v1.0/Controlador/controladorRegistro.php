<?php

require_once("../db/db.php");
require_once("../Modelo/modeloUsuario.php");







    $Cedula = $_POST['cedula'];
    $Nombre=$_POST['nombre'];
    $Apellido=$_POST['apellido'];
    $Celular = $_POST['celular'];
    $Email = $_POST['email'];
    $Clave = MD5($_POST['password']);
    $Calle = $_POST['calle'];
    $Numero = $_POST['numero'];
    $Esquina = $_POST['esquina'];
    $Barrio= $_POST['barrio'];
    
    $usuario=new Usuario();
     
    

    if($usuario->RegistrarCliente($Cedula, $Nombre, $Apellido, $Celular, $Email, $Clave, $Calle, $Numero, $Esquina, $Barrio) ){

        header('location:../Vista/login.html');
     }else{
        echo "no se pudo registrar";
     }
    
    




?>