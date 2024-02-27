<?php
$ruta=parse_url($_SERVER["REQUEST_URI"]);

if(isset($ruta["query"])){
  if($ruta["query"]=="ctrRegPaciente"||
     $ruta["query"]=="ctrEditPaciente"||
     $ruta["query"]=="ctrEliPaciente"){
    $metodo=$ruta["query"];
    $Paciente=new ControladorPaciente();
    $Paciente->$metodo();
  }
}

class ControladorPaciente{

  static public function ctrInfoPacientes(){
    $respuesta=ModeloPaciente::mdlInfoPacientes();
    return $respuesta;
  }

  static public function ctrRegPaciente(){
    require "../modelo/pacienteModelo.php";

    //fecha de registro paciente

    date_default_timezone_set("America/La_Paz");
    $fecha=date("Y-m-d");
    $hora=date("H-i-s");

    $fechaHora=$fecha." ".$hora;
    
    $data=array(
      "nomPaciente"=>$_POST["nomPaciente"],
      "patPaciente"=>$_POST["patPaciente"],
      "matPaciente"=>$_POST["matPaciente"],
      "hisClinica"=>$_POST["hisClinica"],
      "numSus"=>$_POST["numSus"],
      "nacPaciente"=>$_POST["nacPaciente"],
      "sexoPaciente"=>$_POST["sexoPaciente"],
      "estCivil"=>$_POST["estCivil"],
      "dirPaciente"=>$_POST["dirPaciente"],
      "procPaciente"=>$_POST["procPaciente"],
      "lugNacimiento"=>$_POST["lugNacimiento"],
      "provPaciente"=>$_POST["provPaciente"],
      "depPaciente"=>$_POST["depPaciente"],
      "ocupaPaciente"=>$_POST["ocupaPaciente"],
      "instPaciente"=>$_POST["instPaciente"],
      "diagnostico"=>$_POST["diagnostico"],
      "medInternacion"=>$_POST["medInternacion"],
      "matMedico"=>$_POST["matMedico"],
      "enviadoDe"=>$_POST["enviadoDe"],
      "fechaRegistro"=>$fechaHora
    );

    $respuesta=ModeloPaciente::mdlRegPaciente($data);

    echo $respuesta;
  }

  static public function ctrInfoPaciente($id){
    $respuesta=ModeloPaciente::mdlInfoPaciente($id);
    return $respuesta;
  }

  static function ctrEditPaciente(){
    require "../modelo/pacienteModelo.php";

    $data=array(
      "idPaciente"=>$_POST["idPaciente"],
      "nomPaciente"=>$_POST["nomPaciente"],
      "patPaciente"=>$_POST["patPaciente"],
      "matPaciente"=>$_POST["matPaciente"],
      "nacPaciente"=>$_POST["nacPaciente"],
      "sexoPaciente"=>$_POST["sexoPaciente"],
      "estCivil"=>$_POST["estCivil"],
      "dirPaciente"=>$_POST["dirPaciente"],
      "procPaciente"=>$_POST["procPaciente"],
      "lugNacimiento"=>$_POST["lugNacimiento"],
      "provPaciente"=>$_POST["provPaciente"],
      "depPaciente"=>$_POST["depPaciente"],
      "ocupaPaciente"=>$_POST["ocupaPaciente"],
      "instPaciente"=>$_POST["instPaciente"],
      "diagnostico"=>$_POST["diagnostico"],
      "medInternacion"=>$_POST["medInternacion"],
      "matMedico"=>$_POST["matMedico"],
      "enviadoDe"=>$_POST["enviadoDe"]
    );

    ModeloPaciente::mdlEditPaciente($data);
    $respuesta=ModeloPaciente::mdlEditPaciente($data);

    echo $respuesta;
  }

  static function ctrEliPaciente(){
    require "../modelo/pacienteModelo.php";
    $id=$_POST["id"];

    $respuesta=ModeloPaciente::mdlEliPaciente($id);
    echo $respuesta;
  }

  static function ctrBusPaciente(){
    require "../modelo/PacienteModelo.php";
    $nitPaciente=$_POST["nitPaciente"];

    $respuesta=ModeloPaciente::mdlBusPaciente($nitPaciente);
    echo json_encode($respuesta);
  }
}