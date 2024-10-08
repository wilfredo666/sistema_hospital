<?php
$ruta=parse_url($_SERVER["REQUEST_URI"]);

if(isset($ruta["query"])){
  if($ruta["query"]=="ctrRegPaciente"||
     $ruta["query"]=="ctrEditPaciente"||
     $ruta["query"]=="ctrRegTraspaso"||
     $ruta["query"]=="ctrEditTraspaso"||
     $ruta["query"]=="ctrEliTraspaso"||
     $ruta["query"]=="ctrRegHisClinica"||
     $ruta["query"]=="ctrEditHisClinica"||
     $ruta["query"]=="ctrEliHistoria"||
     $ruta["query"]=="ctrRegNotaEvoOrd"||
     $ruta["query"]=="ctrInfoNotaEvoOrd"||
     $ruta["query"]=="ctrEditNota"||
     $ruta["query"]=="ctrEliNotaOrden"||
     $ruta["query"]=="ctrRegEpicrisis"||
     $ruta["query"]=="ctrEditEpicrisis"||
     $ruta["query"]=="ctrEliEpicrisis"||
     $ruta["query"]=="ctrMarcarRealizado"||
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
      "estadoPaciente"=>$_POST["estadoPaciente"],
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

  static function ctrInfoTraspaso($id){
    $respuesta=ModeloPaciente::mdlInfoTraspaso($id);
    return $respuesta;
  }

  static function ctrInfoTraspasosPaciente($id){
    $respuesta=ModeloPaciente::mdlInfoTraspasosPaciente($id);
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
      "diagnostico" => $_POST["diagnostico"],
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
    echo $respuesta;
  }

  static function ctrEditTraspaso(){

    require "../modelo/pacienteModelo.php";
    $datos_traspaso = array(
      "idTraspaso" => $_POST["idTraspaso"],
      "fIngreso" => $_POST["fIngreso"],
      "fEgreso" => $_POST["fEgreso"],
      "hIngreso" => $_POST["hIngreso"],
      "hEgreso" => $_POST["hEgreso"],
      "servicio" => $_POST["servicio"],
      "sala" => $_POST["sala"],
      "cama" => $_POST["cama"],
      "operaciones" => $_POST["operaciones"],
      "diagnostico" => $_POST["diagnostico"],
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

    $respuesta=ModeloPaciente::mdlEditTraspaso($datos_traspaso);
    echo $respuesta;
  }

  static function ctrEliTraspaso(){
    require "../modelo/pacienteModelo.php";
    $id=$_POST["id"];

    $respuesta=ModeloPaciente::mdlEliTraspaso($id);
    echo $respuesta;
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

  static public function ctrInfoHistoriaPaciente($id){
    $respuesta=ModeloPaciente::mdlInfoHistoriaPaciente($id);
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

  static public function ctrInfoNotasEvoOrd($idPaciente){
    $respuesta=ModeloPaciente::mdlInfoNotasEvoOrd($idPaciente);
    return $respuesta;
  }

  static public function ctrInfoNotaEvoOrd($id){
    $respuesta=ModeloPaciente::mdlInfoNotaEvoOrd($id);
    return $respuesta;
  }

  static public function ctrInfoDatosEvOrdenesPaciente($id){
    $respuesta=ModeloPaciente::mdlInfoDatosEvOrdenesPaciente($id);
    return $respuesta;
  }

  static public function ctrEditNota(){
    require "../modelo/pacienteModelo.php";

    $data = array(
      "idNota" => $_POST["idNota"],
      "notaEvoClinica" => $_POST["notaEvoClinica"],
      "ordenMedica" => $_POST["ordenMedica"]
    );

    $respuesta=ModeloPaciente::mdlEditNota($data);

    echo $respuesta;
  }

  static public function ctrEliNotaOrden(){
    require "../modelo/pacienteModelo.php";
    $id=$_POST["id"];

    $respuesta=ModeloPaciente::mdlEliNotaOrden($id);
    echo $respuesta;
  }

  /*=======================
epicrisis
========================*/

  static public function ctrRegEpicrisis(){
    require "../modelo/pacienteModelo.php";

    $data_epicrisis = array(
      "id_paciente" => $_POST["id_paciente"],
      "fecha_ingreso" => $_POST["fecha_ingreso"],
      "serv_egreso" => $_POST["serv_egreso"],
      "fecha_egreso" => $_POST["fecha_egreso"],
      "servicio_epicrisis" => $_POST["servicio_epicrisis"],
      "medico_ingreso" => $_POST["medico_ingreso"],
      "fecha_ingreso_epi" => $_POST["fecha_ingreso_epi"],
      "por_emergencia" => $_POST["por_emergencia"],
      "consulta_externa" => $_POST["consulta_externa"],
      "referido" => isset($_POST["referido"]) ? 1 : 0,
      "referido_de" => $_POST["referido_de"],
      "condicion_ingreso" => $_POST["condicion_ingreso"],
      "resumen_anamnesi" => $_POST["resumen_anamnesi"],
      "examen_fisico" => $_POST["examen_fisico"],
      "diagnostico_ingreso" => $_POST["diagnostico_ingreso"],
      "emograma" => $_POST["emograma"],
      "reaccion_widal" => $_POST["reaccion_widal"],
      "coproparasitolo" => $_POST["coproparasitolo"],
      "examen_orina" => $_POST["examen_orina"],
      "electrolito" => $_POST["electrolito"],
      "radiografia" => $_POST["radiografia"],
      "diagnostico_sala" => $_POST["diagnostico_sala"],
      "tratamiento_recibido" => $_POST["tratamiento_recibido"],
      "evaluacion_servicio" => $_POST["evaluacion_servicio"],
      "complicaciones" => $_POST["complicaciones"],
      "diagnostico_egreso" => $_POST["diagnostico_egreso"],
      "fecha_egreso_epi" => $_POST["fecha_egreso_epi"],
      "tratamiento_ambulatorio" => $_POST["tratamiento_ambulatorio"],
      "condicion_egreso" => $_POST["condicion_egreso"],
      "fecha_control" => $_POST["fecha_control"],
      "nombre_medico" => $_POST["nombre_medico"],
      "matricula_medico" => $_POST["matricula_medico"]
    );

    $respuesta=ModeloPaciente::mdlRegEpicrisis($data_epicrisis);

    echo $respuesta;
  }

  static public function ctrInfoEpicrisis(){
    $respuesta=ModeloPaciente::mdlInfoEpicrisis();
    return $respuesta;
  }

  static public function ctrInfoEpicrisi($idEpicrisis){
    $respuesta=ModeloPaciente::mdlInfoEpicrisi($idEpicrisis);
    return $respuesta;
  }

  static public function ctrInfoEpicrisisPaciente($idPaciente){
    $respuesta=ModeloPaciente::mdlInfoEpicrisisPaciente($idPaciente);
    return $respuesta;
  }

  static public function ctrEditEpicrisis(){
    require "../modelo/pacienteModelo.php";

    $data_epicrisis = array(
      "id_epicrisis" => $_POST["id_epicrisis"],
      "fecha_ingreso" => $_POST["fecha_ingreso"],
      "serv_egreso" => $_POST["serv_egreso"],
      "fecha_egreso" => $_POST["fecha_egreso"],
      "servicio_epicrisis" => $_POST["servicio_epicrisis"],
      "medico_ingreso" => $_POST["medico_ingreso"],
      "fecha_ingreso_epi" => $_POST["fecha_ingreso_epi"],
      "por_emergencia" => $_POST["por_emergencia"],
      "consulta_externa" => $_POST["consulta_externa"],
      "referido" => isset($_POST["referido"]) ? 1 : 0,
      "referido_de" => $_POST["referido_de"],
      "condicion_ingreso" => $_POST["condicion_ingreso"],
      "resumen_anamnesi" => $_POST["resumen_anamnesi"],
      "examen_fisico" => $_POST["examen_fisico"],
      "diagnostico_ingreso" => $_POST["diagnostico_ingreso"],
      "emograma" => $_POST["emograma"],
      "reaccion_widal" => $_POST["reaccion_widal"],
      "coproparasitolo" => $_POST["coproparasitolo"],
      "examen_orina" => $_POST["examen_orina"],
      "electrolito" => $_POST["electrolito"],
      "radiografia" => $_POST["radiografia"],
      "diagnostico_sala" => $_POST["diagnostico_sala"],
      "tratamiento_recibido" => $_POST["tratamiento_recibido"],
      "evaluacion_servicio" => $_POST["evaluacion_servicio"],
      "complicaciones" => $_POST["complicaciones"],
      "diagnostico_egreso" => $_POST["diagnostico_egreso"],
      "fecha_egreso_epi" => $_POST["fecha_egreso_epi"],
      "tratamiento_ambulatorio" => $_POST["tratamiento_ambulatorio"],
      "condicion_egreso" => $_POST["condicion_egreso"],
      "fecha_control" => $_POST["fecha_control"],
      "nombre_medico" => $_POST["nombre_medico"],
      "matricula_medico" => $_POST["matricula_medico"]
    );

    $respuesta=ModeloPaciente::mdlEditEpicrisis($data_epicrisis);

    echo $respuesta;
  }

  static public function ctrEliEpicrisis(){
    require "../modelo/pacienteModelo.php";
    $id=$_POST["id"];

    $respuesta=ModeloPaciente::mdlEliEpicrisis($id);
    echo $respuesta;
  }

  static public function ctrMarcarRealizado(){
    require "../modelo/pacienteModelo.php";

    $data=array(
      "idEvolucion"=>$_POST["idEvolucion"],
      "valor"=>$_POST["valor"],
      "idenfermero"=>$_POST["idenfermero"]
    );

    $respuesta = ModeloPaciente::mdlMarcarRealizado($data);
    echo $respuesta;
  }

}