<?php
require_once "../assest/fpdf/fpdf.php";
require_once "../controlador/pacienteControlador.php";
require_once "../modelo/pacienteModelo.php";
require_once "../modelo/usuarioModelo.php";

$id=$_GET["id"];

$paciente=ControladorPaciente::ctrInfoPaciente($id);

// Obtener los datos de los traspasos
$traspasos = ControladorPaciente::ctrInfoTraspasosPaciente($id);

// Obtener los datos del historial clinico
$historial = ControladorPaciente::ctrInfoHistoriaPaciente($id);

// Obtener los datos de evolucion y ordenes medicas
$ordenes = ControladorPaciente::ctrInfoDatosEvOrdenesPaciente($id);

// Obtener los datos de la epicrisis
$epicrisis = ControladorPaciente::ctrInfoEpicrisisPaciente($id);
class PDF extends FPDF {
  var $caratula = false;
  // Cabecera de página
  function Header() {
    // Logo
    /*$this->SetXY(100,15);
    $this->Image('../assest/dist/img/logo_reporte.png',50,8,80);*/
    $this->SetTextColor(100,130,101);
    $this->Image('../assest/dist/img/logo_reporte.png',10,10,35);
    $this->SetFont('Arial', 'B', 15);
    $this->Cell(0,5,'Gobierno Autonomo Municipal de Villa Tunari',0,1,'C');
    $this->SetFont('Arial', 'B', 12);
    $this->Cell(0,5,'HOSPITAL',0,1,'C');
    $this->SetFont('Arial', 'B', 12);
    $this->Cell(0,5,'"SAN FRANACISCO DE ASIS "',0,1,'C');
    $this->SetFont('Arial', 'B', 14);
    $this->Cell(0,5,'"VILLA TUNARI-CHAPARE "',0,1,'C');
    $this->SetFont('Arial', 'B', 8);
    $this->Cell(0,5,'"COCHABAMBA - BOLIVIA "',0,1,'C');
    $this->SetFont('Arial', 'B', 7);
    $this->Cell(0,4,'Telefono: 4413-5714  fax: 4413-6279 ',0,1,'C');
    //$this->Cell(0,10,'Historial Clinico',0,1,'C');
    $this->Ln(18);
  }

  // Pie de página
  function Footer() {
    $this->SetY(-15);
    $this->SetFont('Arial','I',8);
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
  }

  // Caratula
  function Caratula($nombre_paciente) {
    $this->AddPage();
    // Dibujar el marco de 5px de color negro
    $this->SetLineWidth(1);
    $this->SetDrawColor(48,113,72);
    $this->Rect(5, 5, $this->GetPageWidth()-10, $this->GetPageHeight()-10);
    $this->SetDrawColor(0, 0, 0);
    $this->SetFont('Arial','B',18);
    $this->SetY(100);
    $this->Cell(0,10,"Paciente: $nombre_paciente",0,1,'C');
    $this->Ln(20);
    $this->SetLineWidth(0);
  }

  // Tabla de información del paciente
  function DatosPaciente($paciente) {
    $this->AddPage();
    $this->SetFont('Arial','B',12);
    $this->Cell(0,10,'Datos del Paciente',0,1,'C');
    $this->Ln(10);

    $this->SetFont('Arial','',10);

    $this->Cell(50,10,"Nombre Paciente:",1);
    $this->Cell(140,10,utf8_decode($paciente["nombre_paciente"]),1);
    $this->Ln();

    $this->Cell(50,10,"Apellido Paterno:",1);
    $this->Cell(140,10,utf8_decode($paciente["ap_pat_paciente"]),1);
    $this->Ln();

    $this->Cell(50, 10, "Apellido Materno:", 1);
    $this->Cell(140, 10, utf8_decode($paciente["ap_mat_paciente"]), 1);
    $this->Ln();

    $this->Cell(50, 10, "Numero Historia Clinica:", 1);
    $this->Cell(140, 10, utf8_decode($paciente["num_historia_clinica"]), 1);
    $this->Ln();

    $this->Cell(50, 10, "Numero SUS:", 1);
    $this->Cell(140, 10, utf8_decode($paciente["num_sus"]), 1);
    $this->Ln();

    $this->Cell(50, 10, "Fecha Nacimiento:", 1);
    $this->Cell(140, 10, utf8_decode($paciente["fecha_nacimiento"]), 1);
    $this->Ln();

    $this->Cell(50, 10, "Sexo Paciente:", 1);
    $this->Cell(140, 10, utf8_decode($paciente["sexo_paciente"]), 1);
    $this->Ln();

    $this->Cell(50, 10, "Lugar Nacimiento:", 1);
    $this->Cell(140, 10, utf8_decode($paciente["lugar_nacimiento"]), 1);
    $this->Ln();

    $this->Cell(50, 10, "Provincia:", 1);
    $this->Cell(140, 10, utf8_decode($paciente["provincia"]), 1);
    $this->Ln();

    $this->Cell(50, 10, "Departamento:", 1);
    $this->Cell(140, 10, utf8_decode($paciente["departamento"]), 1);
    $this->Ln();

    $this->Cell(50, 10, "Procedencia:", 1);
    $this->Cell(140, 10, utf8_decode($paciente["procedencia"]), 1);
    $this->Ln();

    $this->Cell(50, 10, "Estado Civil:", 1);
    $this->Cell(140, 10, utf8_decode($paciente["estado_civil"]), 1);
    $this->Ln();

    $this->Cell(50, 10, "Ocupacion:", 1);
    $this->Cell(140, 10, utf8_decode($paciente["ocupacion"]), 1);
    $this->Ln();

    $this->Cell(50, 10, "Grado de Instruccion:", 1);
    $this->Cell(140, 10, utf8_decode($paciente["grado_instruccion"]), 1);
    $this->Ln();

    $this->Cell(50, 10, "Diagnostico Ingreso:", 1);
    $this->Cell(140, 10, utf8_decode($paciente["diagnostico_ingreso"]), 1);
    $this->Ln();

    $this->Cell(50, 10, "Medico Internacion:", 1);
    $this->Cell(140, 10, utf8_decode($paciente["medico_internacion"]), 1);
    $this->Ln();

    $this->Cell(50, 10, "Matricula Medico:", 1);
    $this->Cell(140, 10, utf8_decode($paciente["matricula_medico"]), 1);
    $this->Ln();

    $this->Cell(50, 10, "Estado Civil:", 1);
    $this->Cell(140, 10, utf8_decode($paciente["estado_civil"]), 1);
    $this->Ln();

    $this->Cell(50, 10, "Ocupacion:", 1);
    $this->Cell(140, 10, utf8_decode($paciente["ocupacion"]), 1);
    $this->Ln();

    $this->Cell(50, 10, "Grado de Instruccion:", 1);
    $this->Cell(140, 10, utf8_decode($paciente["grado_instruccion"]), 1);
    $this->Ln();

    $this->Cell(50, 10, "Diagnostico Ingreso:", 1);
    $this->Cell(140, 10, utf8_decode($paciente["diagnostico_ingreso"]), 1);
    $this->Ln();

    $this->Cell(50, 10, "Medico Internacion:", 1);
    $this->Cell(140, 10, utf8_decode($paciente["medico_internacion"]), 1);
    $this->Ln();

    $this->Cell(50, 10, "Matricula Medico:", 1);
    $this->Cell(140, 10, utf8_decode($paciente["matricula_medico"]), 1);
    $this->Ln();
  }

  // Tabla de traspasos
  function DatosTraspasos($traspasos) {

    $this->AddPage();
    $this->SetFont('Arial','B',12);
    $this->Cell(0,10,'Traspasos',0,1,'C');
    $this->Ln(10);

    $this->SetFont('Arial','',10);

    foreach ($traspasos as $registro) {
      $this->Cell(50, 10, "Fecha Ingreso:", 1);
      $this->Cell(140, 10, utf8_decode($registro["fecha_ingreso"]), 1);
      $this->Ln();

      $this->Cell(50, 10, "Fecha Egreso:", 1);
      $this->Cell(140, 10, utf8_decode($registro["fecha_egreso"]), 1);
      $this->Ln();

      $this->Cell(50, 10, "Hora Ingreso:", 1);
      $this->Cell(140, 10, utf8_decode($registro["hora_ingreso"]), 1);
      $this->Ln();

      $this->Cell(50, 10, "Hora Egreso:", 1);
      $this->Cell(140, 10, utf8_decode($registro["hora_egreso"]), 1);
      $this->Ln();

      $this->Cell(50, 10, "Servicio:", 1);
      $this->Cell(140, 10, utf8_decode($registro["servicio"]), 1);
      $this->Ln();

      $this->Cell(50, 10, "Sala:", 1);
      $this->Cell(140, 10, utf8_decode($registro["sala"]), 1);
      $this->Ln();

      $this->Cell(50, 10, "Cama:", 1);
      $this->Cell(140, 10, utf8_decode($registro["cama"]), 1);
      $this->Ln();

      $this->Cell(50, 10, "Operaciones:", 1);
      $this->Cell(140, 10, utf8_decode($registro["operaciones"]), 1);
      $this->Ln();

      $this->Cell(50, 10, "Diagnostico:", 1);
      $this->Cell(140, 10, utf8_decode($registro["diagnostico"]), 1);
      $this->Ln();

      $this->Cell(50, 10, "Otro Diagnostico:", 1);
      $this->Cell(140, 10, utf8_decode($registro["otroDiagnostico"]), 1);
      $this->Ln();

      $this->Cell(50, 10, "Causas Externas:", 1);
      $this->Cell(140, 10, utf8_decode($registro["causasExternas"]), 1);
      $this->Ln();

      $this->Cell(50, 10, "Numero Dias Estadia:", 1);
      $this->Cell(140, 10, utf8_decode($registro["numDiasEstadia"]), 1);
      $this->Ln();

      $this->Cell(50, 10, "Condicion Egreso:", 1);
      $this->Cell(140, 10, utf8_decode($registro["condEgreso"]), 1);
      $this->Ln();

      $this->Cell(50, 10, "Causa Alta:", 1);
      $this->Cell(140, 10, utf8_decode($registro["causaAlta"]), 1);
      $this->Ln();

      $this->Cell(50, 10, "Recien Nacido:", 1);
      $this->Cell(140, 10, utf8_decode($registro["recienNacido"]), 1);
      $this->Ln();

      $this->Cell(50, 10, "Tipo Nacido:", 1);
      $this->Cell(140, 10, utf8_decode($registro["tipoNacido"]), 1);
      $this->Ln();

      $this->Cell(50, 10, "Sexo Nacido:", 1);
      $this->Cell(140, 10, utf8_decode($registro["sexoNacido"]), 1);
      $this->Ln();

      $this->Cell(50, 10, "Condicion Nacer:", 1);
      $this->Cell(140, 10, utf8_decode($registro["condNacer"]), 1);
      $this->Ln();

      $this->Cell(50, 10, "Peso Nacido:", 1);
      $this->Cell(140, 10, utf8_decode($registro["pesoNacido"]), 1);
      $this->Ln();

      $this->Cell(50, 10, "Nombre Medico:", 1);
      $this->Cell(140, 10, utf8_decode($registro["nomMedico"]), 1);
      $this->Ln();

      $this->Cell(50, 10, "Matricula Medico:", 1);
      $this->Cell(140, 10, utf8_decode($registro["matrMedico"]), 1);
      $this->Ln();

      // Añadir un espacio después de cada registro
      $this->Ln(5);
    }
  }

  // Tabla de historial
  function DatosHistorial($historial) {
    $this->AddPage();
    $this->SetFont('Arial','B',12);
    $this->Cell(0,10,'Historia Clinica',0,1,'C');
    $this->Ln(10);

    $this->SetFont('Arial','',10);
    $this->Cell(50,10,"Fuente Historia:",1);
    $this->Cell(140,10,utf8_decode($historial["fuente_historia"]),1);
    $this->Ln();

    $this->Cell(50,10,"Motivo Consulta:",1);
    $this->Cell(140,10,utf8_decode($historial["motivo_consulta"]),1);
    $this->Ln();

    /*$this->Cell(50,10,"Anamnesis:",1);
    $this->Cell(140,10,utf8_decode($historial["anamnesis"]),1);
    $this->Ln();*/
    $this->Cell(50, 5, "Anamnesis:", 1, 0, 'L');
    $this->MultiCell(140, 5, utf8_decode($historial["anamnesis"]), 1);


    $this->Cell(50,5,"Antecedentes:",1);
    $this->MultiCell(140, 5,utf8_decode($historial["antecedentes"]),1);


    $this->Cell(50,5,"Revision Sistema:",1);
    $this->MultiCell(140, 5,utf8_decode($historial["revision_sistema"]),1);


    $this->Cell(50,10,"Fecha Historia:",1);
    $this->Cell(140,10,utf8_decode($historial["fecha_historia"]),1);
    $this->Ln();

    $this->Cell(50,10,"Hora Historia:",1);
    $this->Cell(140,10,utf8_decode($historial["hora_historia"]),1);
    $this->Ln();

    $this->Cell(50,10,"Presion Actual:",1);
    $this->Cell(140,10,utf8_decode($historial["precion_actual"]),1);
    $this->Ln();

    $this->Cell(50,10,"Talla:",1);
    $this->Cell(140,10,utf8_decode($historial["talla"]),1);
    $this->Ln();

    $this->Cell(50,10,"Temperatura Auxiliar:",1);
    $this->Cell(140,10,utf8_decode($historial["tmp_auxiliar"]),1);
    $this->Ln();

    $this->Cell(50,10,"Temperatura Bucal:",1);
    $this->Cell(140,10,utf8_decode($historial["tmp_bucal"]),1);
    $this->Ln();

    $this->Cell(50,10,"Temperatura Rectal:",1);
    $this->Cell(140,10,utf8_decode($historial["tmp_rectal"]),1);
    $this->Ln();

    $this->Cell(50,10,"Pulso:",1);
    $this->Cell(140,10,utf8_decode($historial["pulso"]),1);
    $this->Ln();

    $this->Cell(50,10,"Frecuencia Respiratoria:",1);
    $this->Cell(140,10,utf8_decode($historial["frec_respiratoria"]),1);
    $this->Ln();

    $this->Cell(50,10,"Presion Maxima:",1);
    $this->Cell(140,10,utf8_decode($historial["presion_max"]),1);
    $this->Ln();

    $this->Cell(50,10,"Presion Minima:",1);
    $this->Cell(140,10,utf8_decode($historial["presion_min"]),1);
    $this->Ln();

    $this->Cell(50,5,"Examen Fisico General:",1);
    $this->MultiCell(140, 5,utf8_decode($historial["exm_fis_general"]),1);
    $this->Ln();

    $this->Cell(50,5,"Examen Fisico Regional:",1);
    $this->MultiCell(140, 5,utf8_decode($historial["exm_fis_regional"]),1);
  }

  // Tabla de evolucion y ordenes medicas
  function DatosEvOrdenes($ordenes) {
    $this->AddPage();
    $this->SetFont('Arial','B',12);
    $this->Cell(0,10,'Notas de evolucion y ordenes medicas',0,1,'C');
    $this->Ln(10);

    $this->SetFont('Arial','',10);
    foreach ($ordenes as $registro) {
      $this->Cell(50,10,utf8_decode("Fecha y Hora de Evolución:"),1);
      $this->Cell(140,10,utf8_decode($registro["fecha_hora_evolucion"]),1);
      $this->Ln();

      $this->Cell(50,5,utf8_decode("Nota de Evolución:"),1);
      $this->MultiCell(140, 5,utf8_decode($registro["nota_evolucion"]),1);


      $this->Cell(50,5,utf8_decode("Orden Médica:"),1);
      $this->MultiCell(140, 5,utf8_decode($registro["orden_medica"]),1);

      //info medico
      $medico = ModeloUsuario::mdlInfoUsuario($registro["realizado"]);

      $this->Cell(50,10,utf8_decode("Médico:"),1);
      $this->Cell(140,10,utf8_decode($medico["nombre_usuario"]),1);
      $this->Ln();

      //info enfermero
      $enfermero = ModeloUsuario::mdlInfoUsuario($registro["id_enfermero"]);

      $this->Cell(50,10,utf8_decode("Enfermero:"),1);
      $this->Cell(140,10,utf8_decode($enfermero["nombre_usuario"]),1);
      $this->Ln();

      // Añadir un espacio después de cada registro
      $this->Ln(5); 
    }
  }

  // Tabla de información de la epicrisis
  function DatosEpicrisis($epicrisis) {
    $this->AddPage();
    $this->SetFont('Arial','B',12);
    $this->Cell(0,10,'Datos de la Epicrisis',0,1,'C');
    $this->Ln(10);

    $this->SetFont('Arial','',10);
    $this->Cell(50,10,"Fecha de Ingreso:",1);
    $this->Cell(140,10,utf8_decode($epicrisis["fecha_ingreso"]),1);
    $this->Ln();

    $this->Cell(50,10,"Servicio de Egreso:",1);
    $this->Cell(140,10,utf8_decode($epicrisis["serv_egreso"]),1);
    $this->Ln();

    $this->Cell(50,10,"Fecha de Egreso:",1);
    $this->Cell(140,10,utf8_decode($epicrisis["fecha_egreso"]),1);
    $this->Ln();

    $this->Cell(50,10,"Servicio Epicrisis:",1);
    $this->Cell(140,10,utf8_decode($epicrisis["servicio_epicrisis"]),1);
    $this->Ln();

    $this->Cell(50,10,utf8_decode("Médico de Ingreso:"),1);
    $this->Cell(140,10,utf8_decode($epicrisis["medico_ingreso"]),1);
    $this->Ln();

    $this->Cell(50,10,"Fecha de Ingreso Epicrisis:",1);
    $this->Cell(140,10,utf8_decode($epicrisis["fecha_ingreso_epi"]),1);
    $this->Ln();

    $this->Cell(50,10,"Por Emergencia:",1);
    $this->Cell(140,10,utf8_decode($epicrisis["por_emergencia"]),1);
    $this->Ln();

    $this->Cell(50,10,"Consulta Externa:",1);
    $this->Cell(140,10,utf8_decode($epicrisis["consulta_externa"]),1);
    $this->Ln();

    $this->Cell(50,10,"Referido:",1);
    $this->Cell(140,10,utf8_decode($epicrisis["referido"]),1);
    $this->Ln();

    $this->Cell(50,10,"Referido de:",1);
    $this->Cell(140,10,utf8_decode($epicrisis["referido_de"]),1);
    $this->Ln();

    $this->Cell(50,10,utf8_decode("Condición de Ingreso:"),1);
    $this->Cell(140,10,utf8_decode($epicrisis["condicion_ingreso"]),1);
    $this->Ln();

    $this->Cell(50,5,"Resumen Anamnesis:",1);
    $this->MultiCell(140, 5,utf8_decode($epicrisis["resumen_anamnesi"]),1);


    $this->Cell(50,10,utf8_decode("Examen Físico:"),1);
    $this->Cell(140, 10,utf8_decode($epicrisis["examen_fisico"]),1);
    $this->Ln();

    $this->Cell(50,10,utf8_decode("Diagnóstico de Ingreso:"),1);
    $this->Cell(140, 10,utf8_decode($epicrisis["diagnostico_ingreso"]),1);
    $this->Ln();

    $this->Cell(50,10,"Emograma:",1);
    $this->Cell(140,10,utf8_decode($epicrisis["emograma"]),1);
    $this->Ln();

    $this->Cell(50,10,utf8_decode("Reacción de Widal:"),1);
    $this->Cell(140,10,utf8_decode($epicrisis["reaccion_widal"]),1);
    $this->Ln();

    $this->Cell(50,10,utf8_decode("Coproparasitológico:"),1);
    $this->Cell(140,10,utf8_decode($epicrisis["coproparasitolo"]),1);
    $this->Ln();

    $this->Cell(50,10,"Examen de Orina:",1);
    $this->Cell(140,10,utf8_decode($epicrisis["examen_orina"]),1);
    $this->Ln();

    $this->Cell(50,10,"Electrolito:",1);
    $this->Cell(140,10,utf8_decode($epicrisis["electrolito"]),1);
    $this->Ln();

    $this->Cell(50,10,utf8_decode("Radiografía:"),1);
    $this->Cell(140,10,utf8_decode($epicrisis["radiografia"]),1);
    $this->Ln();

    $this->Cell(50,5,utf8_decode("Diagnóstico en Sala:"),1);
    $this->MultiCell(140, 5,utf8_decode($epicrisis["diagnostico_sala"]),1);


    $this->Cell(50,5,"Tratamiento Recibido:",1);
    $this->MultiCell(140, 5,utf8_decode($epicrisis["tratamiento_recibido"]),1);


    $this->Cell(50,10,utf8_decode("Evaluación del Servicio:"),1);
    $this->Cell(140,10,utf8_decode($epicrisis["evaluacion_servicio"]),1);
    $this->Ln();

    $this->Cell(50,10,"Complicaciones:",1);
    $this->Cell(140,10,utf8_decode($epicrisis["complicaciones"]),1);
    $this->Ln();

    $this->Cell(50,10,utf8_decode("Diagnóstico de Egreso:"),1);
    $this->Cell(140,10,utf8_decode($epicrisis["diagnostico_egreso"]),1);
    $this->Ln();

    $this->Cell(50,10,"Fecha de Egreso Epicrisis:",1);
    $this->Cell(140,10,utf8_decode($epicrisis["fecha_egreso_epi"]),1);
    $this->Ln();

    $this->Cell(50,10,"Tratamiento Ambulatorio:",1);
    $this->Cell(140,10,utf8_decode($epicrisis["tratamiento_ambulatorio"]),1);
    $this->Ln();

    $this->Cell(50,10,utf8_decode("Condición de Egreso:"),1);
    $this->Cell(140,10,utf8_decode($epicrisis["condicion_egreso"]),1);
    $this->Ln();

    $this->Cell(50,10,"Fecha de Control:",1);
    $this->Cell(140,10,utf8_decode($epicrisis["fecha_control"]),1);
    $this->Ln();

    $this->Cell(50,10,utf8_decode("Nombre del Médico:"),1);
    $this->Cell(140,10,utf8_decode($epicrisis["nombre_medico"]),1);
    $this->Ln();

    $this->Cell(50,10,utf8_decode("Matrícula del Médico:"),1);
    $this->Cell(140,10,utf8_decode($epicrisis["matricula_medico"]),1);
    $this->Ln();
  }

}



// Creación del objeto de PDF
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->Caratula($paciente['nombre_paciente']." ".$paciente['ap_pat_paciente']." ".$paciente['ap_mat_paciente']);
$pdf->DatosPaciente($paciente);
if($traspasos!=null){
  $pdf->DatosTraspasos($traspasos);
}
if($historial!=null){

  $pdf->DatosHistorial($historial);
}
if($ordenes!=null){
  $pdf->DatosEvOrdenes($ordenes);
}
if($epicrisis!=null){
  $pdf->DatosEpicrisis($epicrisis);
}
$pdf->Output();
?>

