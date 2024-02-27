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
}