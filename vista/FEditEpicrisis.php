<?php
$path = parse_url($_SERVER['REQUEST_URI']);
//id epicrisis
$id = $path["query"];

$epicrisis=ControladorPaciente::ctrInfoEpicrisi($id);

$paciente=ControladorPaciente::ctrInfoPaciente($epicrisis["id_paciente"]);

?> 

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">

    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">

      <div class="card card-primary">
        <div class="card-header">
          <h4>Epicrisis - Actualizar informacion</h4>
        </div>
        <form action="POST" id="FEditEpicrisis">
          <div class="card-body">
            <div class="row border-bottom">
              <table class="table">
                <tr>
                  <th>Nombre:</th>
                  <td><?php echo $paciente["nombre_paciente"];?></td>
                  <th>Apellido Paterno:</th>
                  <td><?php echo $paciente["ap_pat_paciente"];?></td>
                  <th>Apellido Materno:</th>
                  <td><?php echo $paciente["ap_mat_paciente"];?></td>
                  <th>Num. Historia Clinica:</th>
                  <td><?php echo $paciente["num_historia_clinica"];?></td>
                  <th>Num. de SUS:</th>
                  <td><?php echo $paciente["num_sus"];?></td>
                </tr>
                <tr>
                  <th colspan="2">Procedencia:</th>
                  <td colspan="2"><?php echo $paciente["procedencia"];?></td>
                  <th colspan="2">Provincia:</th>
                  <td colspan="2"><?php echo $paciente["provincia"];?></td>
                  <th>Departamento:</th>
                  <td><?php echo $paciente["departamento"];?></td>
                </tr>
              </table>
              <hr>
            </div>
            <div class="row">

              <div class="col-md-4">
                <div class="form-group">
                  <label for="fecha_ingreso">Fecha Ingreso</label>
                  <input type="date" class="form-control" id="fecha_ingreso" name="fecha_ingreso" value="<?php echo $epicrisis["fecha_ingreso"];?>">
                  <input type="hidden" id="id_epicrisis" name="id_epicrisis" value="<?php echo $id;?>">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="serv_egreso">Servicio de Egreso</label>
                  <input type="text" class="form-control" id="serv_egreso" name="serv_egreso" value="<?php echo $epicrisis["serv_egreso"];?>">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="fecha_egreso">Fecha Egreso</label>
                  <input type="date" class="form-control" id="fecha_egreso" name="fecha_egreso" value="<?php echo $epicrisis["fecha_egreso"];?>">
                </div>
              </div>  

            </div>

            <fieldset class="border row">
              <legend class="float-none w-auto px-3">Información ingreso a Epicrisis</legend>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="servicio_epicrisis">Servicio</label>
                  <input type="text" class="form-control" id="servicio_epicrisis" name="servicio_epicrisis" value="<?php echo $epicrisis["servicio_epicrisis"];?>">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="medico_ingreso">Médico de Ingreso</label>
                  <input type="text" class="form-control" id="medico_ingreso" name="medico_ingreso" value="<?php echo $epicrisis["medico_ingreso"];?>">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="fecha_ingreso_epi">Fecha Ingreso</label>
                  <input type="date" class="form-control" id="fecha_ingreso_epi" name="fecha_ingreso_epi" value="<?php echo $epicrisis["fecha_ingreso_epi"];?>">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="por_emergencia">Por Emergencia</label>
                  <input type="text" class="form-control" id="por_emergencia" name="por_emergencia" value="<?php echo $epicrisis["por_emergencia"];?>">
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="consulta_externa">Consulta Externa</label>
                  <input type="text" class="form-control" id="consulta_externa" name="consulta_externa" value="<?php echo $epicrisis["consulta_externa"];?>">
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group">
                  <label for="referido">Referido</label>
                  <select class="form-control" id="referido" name="referido">
                    <option value="1" <?php if($epicrisis["referido"]=="1"):?>selected<?php endif;?>>Sí</option>
                    <option value="0" <?php if($epicrisis["referido"]=="0"):?>selected<?php endif;?>>No</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="referido_de">Referido De</label>
                  <input type="text" class="form-control" id="referido_de" name="referido_de" <?php echo $epicrisis["referido_de"];?>>
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="condicion_ingreso">Condición Ingreso</label>
                  <input type="text" class="form-control" id="condicion_ingreso" name="condicion_ingreso" <?php echo $epicrisis["condicion_ingreso"];?>>
                </div>
              </div>

            </fieldset>

            <div class="row">

              <div class="col-md-4">
                <div class="form-group">
                  <label for="resumen_anamnesi">Resumen Anamnesis</label>
                  <textarea class="form-control" id="resumen_anamnesi" name="resumen_anamnesi" rows="3"><?php echo $epicrisis["resumen_anamnesi"];?></textarea>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="examen_fisico">Resumen de examen Físico</label>
                  <textarea class="form-control" id="examen_fisico" name="examen_fisico" rows="3"><?php echo $epicrisis["examen_fisico"];?></textarea>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="diagnostico_ingreso">Diagnóstico Ingreso</label>
                  <textarea class="form-control" id="diagnostico_ingreso" name="diagnostico_ingreso" rows="3"><?php echo $epicrisis["diagnostico_ingreso"];?></textarea>
                </div>
              </div>

            </div>

            <fieldset class="border row">
              <legend class="float-none w-auto px-3">Examenes de laboratorio</legend>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="emograma">Emograma</label>
                  <input type="text" class="form-control" id="emograma" name="emograma" value="<?php echo $epicrisis["emograma"];?>">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="reaccion_widal">Reacción Widal</label>
                  <input type="text" class="form-control" id="reaccion_widal" name="reaccion_widal" value="<?php echo $epicrisis["reaccion_widal"];?>">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="coproparasitolo">Coproparasitolo</label>
                  <input type="text" class="form-control" id="coproparasitolo" name="coproparasitolo" value="<?php echo $epicrisis["coproparasitolo"];?>">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="examen_orina">Examen de Orina</label>
                  <input type="text" class="form-control" id="examen_orina" name="examen_orina" value="<?php echo $epicrisis["examen_orina"];?>">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="electrolito">Electrolitos</label>
                  <input type="text" class="form-control" id="electrolito" name="electrolito" value="<?php echo $epicrisis["electrolito"];?>">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="radiografia">Radiografía</label>
                  <input type="text" class="form-control" id="radiografia" name="radiografia" value="<?php echo $epicrisis["radiografia"];?>">
                </div>
              </div>
            </fieldset>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="diagnostico_sala">Diagnóstico en Sala</label>
                  <textarea class="form-control" id="diagnostico_sala" name="diagnostico_sala" rows="3"><?php echo $epicrisis["diagnostico_sala"];?></textarea>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="tratamiento_recibido">Tratamiento Recibido</label>
                  <textarea class="form-control" id="tratamiento_recibido" name="tratamiento_recibido" rows="3"><?php echo $epicrisis["tratamiento_recibido"];?></textarea>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="evaluacion_servicio">Evaluación del Servicio</label>
                  <input type="text" class="form-control" id="evaluacion_servicio" name="evaluacion_servicio" value="<?php echo $epicrisis["evaluacion_servicio"];?>">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="complicaciones">Complicaciones</label>
                  <input type="text" class="form-control" id="complicaciones" name="complicaciones" value="<?php echo $epicrisis["complicaciones"];?>">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="diagnostico_egreso">Diagnóstico de Egreso</label>
                  <input type="text" class="form-control" id="diagnostico_egreso" name="diagnostico_egreso" value="<?php echo $epicrisis["diagnostico_egreso"];?>">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="diagnostico_egreso">Fecha de egreso</label>
                  <input type="date" class="form-control" id="fecha_egreso_epi" name="fecha_egreso_epi" value="<?php echo $epicrisis["fecha_egreso_epi"];?>">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="tratamiento_ambulatorio">Tratamiento Ambulatorio</label>
                  <textarea class="form-control" id="tratamiento_ambulatorio" name="tratamiento_ambulatorio" rows="3"><?php echo $epicrisis["tratamiento_ambulatorio"];?></textarea>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="condicion_egreso">Condición de Egreso</label>
                  <input type="text" class="form-control" id="condicion_egreso" name="condicion_egreso" value="<?php echo $epicrisis["condicion_egreso"];?>">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="fecha_control">Fecha de Control</label>
                  <input type="date" class="form-control" id="fecha_control" name="fecha_control" value="<?php echo $epicrisis["fecha_control"];?>">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="nombre_medico">Nombre del Médico</label>
                  <input type="text" class="form-control" id="nombre_medico" name="nombre_medico" value="<?php echo $epicrisis["nombre_medico"];?>">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="matricula_medico">Matrícula del Médico</label>
                  <input type="text" class="form-control" id="matricula_medico" name="matricula_medico" value="<?php echo $epicrisis["matricula_medico"];?>">
                </div>
              </div>
            </div>

          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>

        </form>

      </div>


    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
