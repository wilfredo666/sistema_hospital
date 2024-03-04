<?php
$ruta=parse_url($_SERVER["REQUEST_URI"]);

if(isset($ruta["query"])){
  if($ruta["query"]=="ctrRegPaciente"||
     $ruta["query"]=="ctrEditPaciente"||
     $ruta["query"]=="ctrRegTraspaso"||
     $ruta["query"]=="ctrRegHisClinica"||
     $ruta["query"]=="ctrEditHisClinica"||
     $ruta["query"]=="ctrEliHistoria"||
     $ruta["query"]=="ctrRegNotaEvoOrd"||
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

  /*=======================
traspaso paciente
========================*/
  static function ctrInfoTraspasos(){
    $respuesta=ModeloPaciente::mdlInfoTraspasos();
    return $respuesta;
  }
  static function ctrRegTraspaso(){
    require "../modelo/pacienteModelo.php";
    $datos_traspaso = array(
      "idPaciente" => $_POST["idPaciente"],
      "fIngreso" => $_POST["fIngreso"],
      "fEgreso" => $_POST["fEgreso"],
      "hIngreso" => $_POST["hIngreso"],
      "hEgreso" => $_POST["hEgreso"],
      "servicio" => $_POST["servicio"],
      "sala" => $_POST["sala"],
      "cama" => $_POST["cama"],
      "operaciones" => $_POST["operaciones"],
      "diagnostigo" => $_POST["diagnostigo"],
      "otroDiagnostico" => $_POST["otroDiagnostico"],
      "causasExternas" => $_POST["causasExternas"],
      "numDiasEstadia" => $_POST["numDiasEstadia"],
      "condEgreso" => $_POST["condEgreso"],
      "causaAlta" => $_POST["causaAlta"],
      "recienNacido" => $_POST["recienNacido"],
      "tipoNacido" => $_POST["tipoNacido"],
      "sexoNacido" => $_POST["sexoNacido"],
      "condNacer" => $_POST["condNacer"],
      "pesoNacido" => $_POST["pesoNacido"],
      "nomMedico" => $_POST["nomMedico"],
      "matrMedico" => $_POST["matrMedico"]
    );

    $respuesta=ModeloPaciente::mdlRegTraspaso($datos_traspaso);
    return $respuesta;
  }

  /*=======================
historia clinica en sala
========================*/
  static function ctrRegHisClinica(){
    require "../modelo/pacienteModelo.php";
    $data = array(
      "fuente_historia" => $_POST["fuente_historia"],
      "idPaciente" => $_POST["idPaciente"],
      "motivo_consulta" => $_POST["motivo_consulta"],
      "anamnesis" => $_POST["anamnesis"],
      "antecedentes" => $_POST["antecedentes"],
      "revision_sistemas" => $_POST["revision_sistemas"],
      "fecha" => $_POST["fecha"],
      "hora" => $_POST["hora"],
      "p_actual" => $_POST["p_actual"],
      "talla" => $_POST["talla"],
      "auxiliar" => $_POST["auxiliar"],
      "bucal" => $_POST["bucal"],
      "rectal" => $_POST["rectal"],
      "pulso" => $_POST["pulso"],
      "frec_respiratoria" => $_POST["frec_respiratoria"],
      "presion_max" => $_POST["presion_max"],
      "presion_min" => $_POST["presion_min"],
      "examen_general" => $_POST["examen_general"],
      "examen_regional" => $_POST["examen_regional"]
    );

    $respuesta=ModeloPaciente::mdlRegHisClinica($data);

    echo $respuesta;
  }

  static function ctrEditHisClinica(){
    require "../modelo/pacienteModelo.php";
    $data = array(
      "idHistoria" => $_POST["idHistoria"],
      "fuente_historia" => $_POST["fuente_historia"],
      "motivo_consulta" => $_POST["motivo_consulta"],
      "anamnesis" => $_POST["anamnesis"],
      "antecedentes" => $_POST["antecedentes"],
      "revision_sistemas" => $_POST["revision_sistemas"],
      "fecha" => $_POST["fecha"],
      "hora" => $_POST["hora"],
      "p_actual" => $_POST["p_actual"],
      "auxiliar" => $_POST["auxiliar"],
      "talla" => $_POST["talla"],
      "bucal" => $_POST["bucal"],
      "rectal" => $_POST["rectal"],
      "pulso" => $_POST["pulso"],
      "frec_respiratoria" => $_POST["frec_respiratoria"],
      "presion_max" => $_POST["presion_max"],
      "presion_min" => $_POST["presion_min"],
      "examen_general" => $_POST["examen_general"],
      "examen_regional" => $_POST["examen_regional"]
    );

    $respuesta=ModeloPaciente::mdlEditHisClinica($data);

    echo $respuesta;
  }

  static function ctrEliHistoria(){
    require "../modelo/pacienteModelo.php";
    $id=$_POST["id"];

    $respuesta=ModeloPaciente::mdlEliHistoria($id);
    echo $respuesta;
  }

  static public function ctrInfoHistorias(){
    $respuesta=ModeloPaciente::mdlInfoHistorias();
    return $respuesta;
  }

  static public function ctrInfoHistoria($id){
    $respuesta=ModeloPaciente::mdlInfoHistoria($id);
    return $respuesta;
  }

  static public function edad($fecha_nacimiento) { 
    $tiempo = strtotime($fecha_nacimiento); 
    $ahora = time(); 
    $edad = ($ahora-$tiempo)/(60*60*24*365.25); 
    $edad = floor($edad); 
    return $edad; 
  }

  static public function ctrRegNotaEvoOrd(){
    require "../modelo/pacienteModelo.php";

    $data = array(
      "idPaciente" => $_POST["idPaciente"],
      "fechaEvolucion" => $_POST["fechaEvolucion"],
      "notaEvoClinica" => $_POST["notaEvoClinica"],
      "ordenMedica" => $_POST["ordenMedica"]
    );

    $respuesta=ModeloPaciente::mdlRegNotaEvoOrd($data);

    echo $respuesta;
  }

  static public function ctrInfoNotasEvoOrd(){
    $respuesta=ModeloPaciente::mdlInfoNotasEvoOrd();
    return $respuesta;
  }

}