<?php
require_once "conexion.php";

class ModeloPaciente{


  static public function mdlInfoPacientes(){
    $stmt=Conexion::conectar()->prepare("select * from paciente");
    $stmt->execute();

    return $stmt->fetchAll();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlRegPaciente($data){
    $nomPaciente=$data["nomPaciente"];
    $patPaciente=$data["patPaciente"];
    $matPaciente=$data["matPaciente"];
    $hisClinica=$data["hisClinica"];
    $numSus=$data["numSus"];
    $nacPaciente=$data["nacPaciente"];
    $sexoPaciente=$data["sexoPaciente"];
    $estCivil=$data["estCivil"];
    $dirPaciente=$data["dirPaciente"];
    $procPaciente=$data["procPaciente"];
    $lugNacimiento=$data["lugNacimiento"];
    $provPaciente=$data["provPaciente"];
    $depPaciente=$data["depPaciente"];
    $ocupaPaciente=$data["ocupaPaciente"];
    $instPaciente=$data["instPaciente"];
    $diagnostico=$data["diagnostico"];
    $medInternacion=$data["medInternacion"];
    $matMedico=$data["matMedico"];
    $enviadoDe=$data["enviadoDe"];
    $fechaRegistro=$data["fechaRegistro"];

    $stmt=Conexion::conectar()->prepare("insert into paciente(nombre_paciente, ap_pat_paciente, ap_mat_paciente, num_historia_clinica, num_sus, fecha_nacimiento,sexo_paciente,lugar_nacimiento,provincia,departamento,procedencia,estado_civil,ocupacion,grado_instruccion,diagnostico_ingreso,medico_internacion,matricula_medico,direccion_paciente,enviado_de,fecha_registro) values('$nomPaciente', '$patPaciente', '$matPaciente', '$hisClinica', '$numSus', '$nacPaciente','$sexoPaciente','$lugNacimiento','$provPaciente','$depPaciente','$procPaciente','$estCivil','$ocupaPaciente','$instPaciente','$diagnostico','$medInternacion','$matMedico','$dirPaciente','$enviadoDe','$fechaRegistro')");

    if($stmt->execute()){
      return "ok";
    }else{
      return "error";
    }

    $stmt->close();
    $stmt->null();
  }

  static public function mdlInfoPaciente($id){
    $stmt=Conexion::conectar()->prepare("select * from paciente where id_paciente=$id");
    $stmt->execute();

    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlEditPaciente($data){

    $nomPaciente=$data["nomPaciente"];
    $patPaciente=$data["patPaciente"];
    $matPaciente=$data["matPaciente"];
    $nacPaciente=$data["nacPaciente"];
    $sexoPaciente=$data["sexoPaciente"];
    $estCivil=$data["estCivil"];
    $dirPaciente=$data["dirPaciente"];
    $procPaciente=$data["procPaciente"];
    $lugNacimiento=$data["lugNacimiento"];
    $provPaciente=$data["provPaciente"];
    $depPaciente=$data["depPaciente"];
    $ocupaPaciente=$data["ocupaPaciente"];
    $instPaciente=$data["instPaciente"];
    $diagnostico=$data["diagnostico"];
    $medInternacion=$data["medInternacion"];
    $matMedico=$data["matMedico"];
    $enviadoDe=$data["enviadoDe"];
    $id=$data["idPaciente"];

    $stmt=Conexion::conectar()->prepare("update paciente set nombre_paciente='$nomPaciente', ap_pat_paciente='$patPaciente', ap_mat_paciente='$matPaciente', fecha_nacimiento='$nacPaciente',sexo_paciente='$sexoPaciente',lugar_nacimiento='$lugNacimiento',provincia='$provPaciente',departamento='$depPaciente',procedencia='$procPaciente',estado_civil='$estCivil',ocupacion='$ocupaPaciente',grado_instruccion='$instPaciente',diagnostico_ingreso='$diagnostico',medico_internacion='$medInternacion',matricula_medico='$matMedico',direccion_paciente='$dirPaciente',enviado_de='$enviadoDe' where id_paciente=$id");

    if($stmt->execute()){
      return "ok";
    }else{
      return "error";
    }

    $stmt->close();
    $stmt->null();
  }

  static public function mdlEliPaciente($id){
    $stmt=Conexion::conectar()->prepare("update paciente set estado_paciente=0 where id_paciente=$id");

    if($stmt->execute()){
      return "ok";
    }else{
      return "error";
    }

    $stmt->close();
    $stmt->null();
  }

  /*=======================
traspaso paciente
========================*/
  static public function mdlInfoTraspasos(){
    $stmt=Conexion::conectar()->prepare("select id_traspaso, num_historia_clinica, num_sus, nombre_paciente, ap_pat_paciente, ap_mat_paciente, fecha_ingreso, fecha_egreso, hora_ingreso, hora_egreso from traspaso JOIN paciente ON paciente.id_paciente=traspaso.id_paciente");
    $stmt->execute();

    return $stmt->fetchAll();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlRegTraspaso($data){
    $idPaciente = $data["idPaciente"];
    $fIngreso = $data["fIngreso"];
    $fEgreso = $data["fEgreso"];
    $hIngreso = $data["hIngreso"];
    $hEgreso = $data["hEgreso"];
    $servicio = $data["servicio"];
    $sala = $data["sala"];
    $cama = $data["cama"];
    $operaciones = $data["operaciones"];
    $diagnostico = $data["diagnostico"];
    $otroDiagnostico = $data["otroDiagnostico"];
    $causasExternas = $data["causasExternas"];
    $numDiasEstadia = $data["numDiasEstadia"];
    $condEgreso = $data["condEgreso"];
    $causaAlta = $data["causaAlta"];
    $recienNacido = $data["recienNacido"];
    $tipoNacido = $data["tipoNacido"];
    $sexoNacido = $data["sexoNacido"];
    $condNacer = $data["condNacer"];
    $pesoNacido = $data["pesoNacido"];
    $nomMedico = $data["nomMedico"];
    $matrMedico = $data["matrMedico"];

    $stmt=Conexion::conectar()->prepare(" INSERT INTO traspaso (id_paciente, fecha_ingreso, fecha_egreso, hora_ingreso, hora_egreso, servicio, sala, cama, operaciones, diagnostico, otroDiagnostico, causasExternas, numDiasEstadia, condEgreso, causaAlta, recienNacido, tipoNacido, sexoNacido, condNacer, pesoNacido, nomMedico, matrMedico) 
VALUES ('$idPaciente', '$fIngreso', '$fEgreso', '$hIngreso', '$hEgreso', '$servicio', '$sala', '$cama', '$operaciones', '$diagnostico', '$otroDiagnostico', '$causasExternas', '$numDiasEstadia', '$condEgreso', '$causaAlta', '$recienNacido', '$tipoNacido', '$sexoNacido', '$condNacer', '$pesoNacido', '$nomMedico', '$matrMedico')");

    if($stmt->execute()){
      return "ok";
    }else{
      return "error";
    }

    $stmt->close();
    $stmt->null();

  }

  /*=======================
historia clinica en sala
========================*/
  static public function mdlRegHisClinica($data){

    $fuente_historia = $data["fuente_historia"];
    $idPaciente = $data["idPaciente"];
    $motivo_consulta = $data["motivo_consulta"];
    $anamnesis = $data["anamnesis"];
    $antecedentes = $data["antecedentes"];
    $revision_sistemas = $data["revision_sistemas"];
    $fecha = $data["fecha"];
    $hora = $data["hora"];
    $p_actual = $data["p_actual"];
    $talla = $data["talla"];
    $auxiliar = $data["auxiliar"];
    $bucal = $data["bucal"];
    $rectal = $data["rectal"];
    $pulso = $data["pulso"];
    $frec_respiratoria = $data["frec_respiratoria"];
    $presion_max = $data["presion_max"];
    $presion_min = $data["presion_min"];
    $examen_general = $data["examen_general"];
    $examen_regional = $data["examen_regional"];

    $stmt=Conexion::conectar()->prepare("INSERT INTO historia (id_paciente, fuente_historia, motivo_consulta, anamnesis, antecedentes, revision_sistema, fecha_historia, hora_historia, precion_actual, talla, tmp_auxiliar, tmp_bucal, tmp_rectal, pulso, frec_respiratoria, presion_max, presion_min, exm_fis_general, exm_fis_regional) VALUES ($idPaciente, '$fuente_historia', '$motivo_consulta', '$anamnesis', '$antecedentes', '$revision_sistemas', '$fecha', '$hora', '$p_actual', $talla, '$auxiliar', '$bucal', '$rectal', $pulso, $frec_respiratoria, $presion_max, $presion_min, '$examen_general', '$examen_regional')");

    if($stmt->execute()){
      return "ok";
    }else{
      return "error";
    }

    $stmt->close();
    $stmt->null();

  }

  static public function mdlEditHisClinica($data){

    $idHistoria = $data["idHistoria"];
    $fuente_historia = $data["fuente_historia"];
    $motivo_consulta = $data["motivo_consulta"];
    $anamnesis = $data["anamnesis"];
    $antecedentes = $data["antecedentes"];
    $revision_sistemas = $data["revision_sistemas"];
    $fecha = $data["fecha"];
    $hora = $data["hora"];
    $p_actual = $data["p_actual"];
    $talla = $data["talla"];
    $auxiliar = $data["auxiliar"];
    $bucal = $data["bucal"];
    $rectal = $data["rectal"];
    $pulso = $data["pulso"];
    $frec_respiratoria = $data["frec_respiratoria"];
    $presion_max = $data["presion_max"];
    $presion_min = $data["presion_min"];
    $examen_general = $data["examen_general"];
    $examen_regional = $data["examen_regional"];

    $stmt=Conexion::conectar()->prepare("UPDATE historia SET 
    fuente_historia = '$fuente_historia',
    motivo_consulta = '$motivo_consulta',
    anamnesis = '$anamnesis',
    antecedentes = '$antecedentes',
    revision_sistema = '$revision_sistemas',
    fecha_historia = '$fecha',
    hora_historia = '$hora',
    precion_actual = '$p_actual',
    talla = $talla,
    tmp_auxiliar = '$auxiliar',
    tmp_bucal = '$bucal',
    tmp_rectal = '$rectal',
    pulso = $pulso,
    frec_respiratoria = $frec_respiratoria,
    presion_max = $presion_max,
    presion_min = $presion_min,
    exm_fis_general = '$examen_general',
    exm_fis_regional = '$examen_regional'
WHERE id_historia = $idHistoria");

    if($stmt->execute()){
      return "ok";
    }else{
      return "error";
    }

    $stmt->close();
    $stmt->null();
  }

  static public function mdlEliHistoria($id){
    $stmt=Conexion::conectar()->prepare("delete from historia where id_historia=$id");

    if($stmt->execute()){
      return "ok";
    }else{
      return "error";
    }

    $stmt->close();
    $stmt->null();
  }

  static public function mdlInfoHistorias(){
    $stmt=Conexion::conectar()->prepare("select id_historia, num_historia_clinica, num_sus, nombre_paciente, ap_pat_paciente, ap_mat_paciente, fecha_nacimiento, fecha_historia, hora_historia from historia JOIN paciente ON paciente.id_paciente=historia.id_paciente");
    $stmt->execute();

    return $stmt->fetchAll();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoHistoria($id){
    $stmt=Conexion::conectar()->prepare("select * from historia where id_historia=$id");
    $stmt->execute();

    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlRegNotaEvoOrd($data){

    $idPaciente = $data["idPaciente"];
    $fechaEvolucion = $data["fechaEvolucion"];
    $notaEvoClinica = $data["notaEvoClinica"];
    $ordenMedica = $data["ordenMedica"];

    $stmt=Conexion::conectar()->prepare(" INSERT INTO evolucion_orden (id_paciente, fecha_hora_evolucion, nota_evolucion, orden_medica) VALUES ($idPaciente, '$fechaEvolucion', '$notaEvoClinica', '$ordenMedica')");

    if($stmt->execute()){
      return "ok";
    }else{
      return "error";
    }

    $stmt->close();
    $stmt->null();

  }

  static public function mdlInfoNotasEvoOrd(){
    $stmt=Conexion::conectar()->prepare("select * from evolucion_orden");
    $stmt->execute();

    return $stmt->fetchAll();

    $stmt->close();
    $stmt->null;
  }
}