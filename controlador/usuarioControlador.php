<?php

$ruta=parse_url($_SERVER["REQUEST_URI"]);

if(isset($ruta["query"])){
  if($ruta["query"]=="ctrRegUsuario"||
     $ruta["query"]=="ctrEditUsuario"||
     $ruta["query"]=="ctrEliUsuario"){
    $metodo=$ruta["query"];
    $Usuario=new ControladorUsuario();
    $Usuario->$metodo();
  }
}

class ControladorUsuario{


  static public function ctrIngresoUsuario(){
    error_reporting(E_ALL & ~E_WARNING); //evitar mostrar el error warning

    if(isset($_POST["usuario"])){

      $usuario=$_POST["usuario"];
      $password=$_POST["password"];

      $resultado=ModeloUsuario::mdlAccesoUsuario($usuario);

      if($resultado["login_usuario"]==$usuario && password_verify($password,$resultado["password"])){

        $_SESSION["login"]=$resultado["login_usuario"];
        $_SESSION["nomUsuario"]=$resultado["nombre_usuario"];
        $_SESSION["perfil"]=$resultado["perfil"];
        $_SESSION["idUsuario"]=$resultado["id_usuario"];
        $_SESSION["ingreso"]="ok";


        echo '<script>

        window.location="inicio";


        </script>';



      }else{

        echo '<script>

document.getElementById("error-acceso").innerHTML="Credenciales de acceso no validas!!!"
        </script>';
      }

    }


  }


  static public function ctrInfoUsuarios(){
    $respuesta=ModeloUsuario::mdlInfoUsuarios();
    return $respuesta;
  }

  static public function ctrRegUsuario(){
    require "../modelo/UsuarioModelo.php";

    $password=password_hash($_POST["password"], PASSWORD_DEFAULT);

    $data=array(
      "nomUsuario"=>$_POST["nomUsuario"],
      "perfil"=>$_POST["perfil"],
      "loginUsuario"=>$_POST["login"],
      "password"=>$password
    );

    $respuesta=ModeloUsuario::mdlRegUsuario($data);

    echo $respuesta;
  }

  static public function ctrInfoUsuario($id){
    $respuesta=ModeloUsuario::mdlInfoUsuario($id);
    return $respuesta;
  }

  static function ctrEditUsuario(){
    require "../modelo/UsuarioModelo.php";

    if($_POST["password"]==$_POST["passActual"]){
      $password=$_POST["password"];
    }else{
      $password=password_hash($_POST["password"], PASSWORD_DEFAULT);
    }


    $data=array(
      "password"=>$password,
      "id"=>$_POST["idUsuario"],
      "perfil"=>$_POST["perfil"],  
      "nomUsuario"=>$_POST["nomUsuario"]  
    );

    $respuesta=ModeloUsuario::mdlEditUsuario($data);

    echo $respuesta;
  }

  static function ctrEliUsuario(){
    require "../modelo/UsuarioModelo.php";
    $id=$_POST["id"];

    $respuesta=ModeloUsuario::mdlEliUsuario($id);
    echo $respuesta;
  }
}