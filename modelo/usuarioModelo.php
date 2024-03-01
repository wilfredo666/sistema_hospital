<?php
require_once "conexion.php";

class ModeloUsuario{

  /*=================
  acceso al sistema
  ==================*/
  static public function mdlAccesoUsuario($usuario){
    $stmt=Conexion::conectar()->prepare("select * from usuario where login_usuario='$usuario'");
    $stmt->execute();

    return $stmt->fetch();

    $stmt->close();
    $stmt->null;

  }

  static public function mdlInfoUsuarios(){
    $stmt=Conexion::conectar()->prepare("select * from usuario");
    $stmt->execute();

    return $stmt->fetchAll();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlRegUsuario($data){
    $nomUsuario=$data["nomUsuario"];
    $perfil=$data["perfil"];
    $loginUsuario=$data["loginUsuario"];
    $password=$data["password"];

    $stmt=Conexion::conectar()->prepare("insert into usuario(nombre_usuario,perfil,login_usuario, password) values('$nomUsuario','$perfil','$loginUsuario','$password')");

    if($stmt->execute()){
      return "ok";
    }else{
      return "error";
    }

    $stmt->close();
    $stmt->null();
  }

  static public function mdlInfoUsuario($id){
    $stmt=Conexion::conectar()->prepare("select * from usuario where id_usuario=$id");
    $stmt->execute();

    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlEditUsuario($data){

    $password=$data["password"];
    $perfil=$data["perfil"];
    $nomUsuario=$data["nomUsuario"];
    $id=$data["id"];

    $stmt=Conexion::conectar()->prepare("update usuario set password='$password', perfil='$perfil', nombre_usuario='$nomUsuario' where id_usuario=$id");

    if($stmt->execute()){
      return "ok";
    }else{
      return "error";
    }

    $stmt->close();
    $stmt->null();
  }

  static public function mdlEliUsuario($id){
    $stmt=Conexion::conectar()->prepare("delete from usuario where id_usuario=$id");

    if($stmt->execute()){
      return "ok";
    }else{
      return "error";
    }

    $stmt->close();
    $stmt->null();
  }

}