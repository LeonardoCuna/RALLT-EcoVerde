<?php
Class Usuario{
    private $Usuario; //Para array
    private $db; //Para conexion


    private $Cedula;
    private $Nombre;
    private $Apellido;
    private $Celular;
    private $Email;
    private $Clave;
    private $Calle;
    private $Numero;
    private $Esquina;
    private $Barrio;
    private $Tipo;

   /*public function __construct($Cedula, $Nombre, $Apellido, $Celular, $Email, $Clave, $Calle, $Numero, $Esquina, $Barrio, $Tipo){
        $this -> Cedula=$Cedula;
        $this -> Nombre=$Nombre;
        $this -> Apellido=$Apellido;
        $this -> Celular=$Celular;
        $this -> Email=$Email;
        $this -> Clave=$Clave;
        $this -> Calle=$Calle;
        $this -> Numero=$Numero;
        $this -> Esquina=$Esquina;
        $this -> Barrio=$Barrio;
        $this -> Tipo=$Tipo;


       
    } */
    
    public function __construct(){
			
        //Asignamos al atributo db el valor del metodo conexion() de la clase Conectar
        //Conectar es la clase y conexion es el metodo
        $this->db = Conectar::conexion();
        //Determinamos que el atributo personas será un array
        $this->Usuario = array();
        
    }
    


    public function setCedula($Cedula){
        $this -> Cedula=$Cedula;
    }
    public function getCedula(){
        return $this -> Cedula;
    }
    public function setNombre($Nombre){
        $this -> Nombre=$Nombre;
    }
    public function getNombre(){
        return $this -> Nombre;
    }
    public function setApellido($Apellido){
        $this -> Apellido=$Apellido;
    }
    public function getApellido(){
        return $this -> Apellido;
    }
    public function setCelular($Celular){
        $this -> Celular=$Celular;
    }
    public function getCelular(){
        return $this -> Celular;
    }
    public function setEmail($Email){
        $this -> Email=$Email;
    }
    public function getEmail(){
        return $this -> Email;
    }
    public function setClave($Clave){
        $this -> Clave=$Clave;
    }
    public function getClave(){
        return $this -> Clave;
    }
    public function setCalle($Calle){
        $this -> Calle=$Calle;
    }
    public function getCalle(){
        return $this -> Calle;
    }
    public function setNumero($Numero){
        $this -> Numero=$Numero;
    }
    public function getNumero(){
        return $this -> Numero;
    }
    public function setEsquina($Esquina){
        $this -> Esquina=$Esquina;
    }
    public function getEsquina(){
        return $this -> Esquina;
    }
    public function setTipo($Tipo){
        $this -> Tipo=$Tipo;
    }
    public function getTipo(){
        return $this -> Tipo;
    }




    public function RegistrarCliente($Cedula, $Nombre, $Apellido, $Celular, $Email, $Clave, $Calle, $Numero, $Esquina, $Barrio ){
        $Tipo= "Cliente";
        $Estado= "Pendiente";
        $sql = "INSERT INTO usuario VALUES ('$Cedula', NULL, '$Nombre', '$Apellido', '$Celular', '$Email', '$Clave', '$Calle', '$Numero', '$Esquina', '$Barrio', '$Tipo', '$Estado')";
        
        
        if($this->db->query($sql)){
            return true;
            
        }else{
            return false;
        }
    }


    



    public function ComprobarEstado($Mail, $Clave){
        $sql="SELECT * FROM usuario WHERE email='$Mail' AND contraseña='$Clave'";
        $consulta = $this->db->query($sql);
       
        if( $consulta ){

            
            if( mysqli_num_rows( $consulta ) > 0){
          
              
              while($fila = mysqli_fetch_array( $consulta ) ){
        
                    if($fila['estado']=="Aceptado"){
                        return true;
                    }else{
                        return false;
                    }
              }
          
            }
          
           
          
          }
    }


    public function ComprobarCedula($Cedula){
        $sql="SELECT * FROM usuario WHERE CI='$Cedula'";
        $consulta = $this->db->query($sql);
       
        if( $consulta ){

            
            if( mysqli_num_rows( $consulta ) > 0){
          
              
              return false;
          
          }else{
            return true;
          }
    }

 }


 public function ComprobarEmail($Mail){
    $sql="SELECT * FROM usuario WHERE email='$Mail'";
    $consulta = $this->db->query($sql);
   
    if( $consulta ){

        
        if( mysqli_num_rows( $consulta ) > 0){
      
          
          return false;
      
      }else{
        return true;
      }
}

}


    public function IniciarSesion($Mail, $Clave){
        $sql="SELECT * FROM usuario WHERE email='$Mail' AND contraseña='$Clave'"; 
        $consulta = $this->db->query($sql);
        
        

        if($result=$consulta){
            $filas=mysqli_num_rows($consulta);
        }

        if($filas<1){
            return false;
        }else{
            return true;
        }
    }






}




?>