<?php
    require_once("../db/db.php");
	require_once("../Modelo/modeloUsuario.php");
	
	$usuario2 = new Usuario();
    //$datos = $usuario2->getUsuario();

	if(isset($_POST['reg'])){
        $cedula = $_POST['cedula'];
		$nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $celular = $_POST['cel'];
        $email = $_POST['email'];
        $clave = MD5($_POST['password']);
        $calle = $_POST['calle'];
        $numero = $_POST['num'];
        $esquina = $_POST['esq'];
        $barrio = $_POST['bar'];
        $tipo = $_POST['tipous'];
		$usuario2->RegistrarUsuarios($cedula, $nombre, $apellido, $celular, $email, $clave, $calle, $numero, $esquina, $barrio, $tipo);
		header('location:../Vista/vistaUsuarios.php');
	}

	if(isset($_POST['eli'])){
		$ced = $_POST['ced'];
		$usuario2->EliminarUsuario($ced);
		header('location:../Vista/vistaEliminarUsuario.php');
	}

	if(isset($_POST['mod'])){
		$nombree = $_POST['nom'];
        $cedulaa = $_POST['cedu'];
        $emaill = $_POST['em'];
        $apellidoo = $_POST['ape'];
        $celularr = $_POST['celu'];
        $callee = $_POST['calle'];
        $numeroo = $_POST['numero'];
        $esquinaa = $_POST['esquina'];
        $barrioo = $_POST['barrio'];
        $tipoo = $_POST['tipouss'];
		$usuario2->ModificarUsuarios($cedulaa, $nombree, $apellidoo, $celularr, $emaill, $callee, $numeroo, $esquinaa, $barrioo, $tipoo);
		header('location:../Vista/vistaModificarUsuarios.php');
	}	