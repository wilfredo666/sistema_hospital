<?php
$path = parse_url($_SERVER['REQUEST_URI']);
//id historia
$idHistoria = $path["query"];

$historia=ControladorPaciente::ctrInfoHistoria($idHistoria);
$paciente=ControladorPaciente::ctrInfoPaciente($historia["id_paciente"]);

?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">

    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <div class="row border-bottom">

  </div>

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">

      <div class="card card-primary">
        <div class="card-header">
          <h4>Actualizar Historia Clínica en sala</h4>
        </div>

      </div>
      <form action="POST" id="FEditHisClinica">
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
            </table>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <label for="fuente_historia">Fuente historia</label>
                <textarea id="fuente_historia" name="fuente_historia" class="form-control"><?php echo $historia["fuente_historia"]; ?></textarea>
                <input type="hidden" name="idHistoria" id="idHistoria" value="<?php echo $idHistoria;?>">
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label for="motivo_consulta">Motivo de consulta</label>
                <textarea class="form-control" id="motivo_consulta" name="motivo_consulta"><?php echo $historia["motivo_consulta"]; ?></textarea>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label for="anamnesis">Anamnesis</label>
                <textarea class="form-control" id="anamnesis" name="anamnesis"><?php echo $historia["anamnesis"]; ?></textarea>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <label for="antecedentes">Antecedentes</label>
                <textarea class="form-control" id="antecedentes" name="antecedentes"><?php echo $historia["antecedentes"]; ?></textarea>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label for="revision_sistemas">Revisión de sistemas</label>
                <textarea class="form-control" id="revision_sistemas" name="revision_sistemas"><?php echo $historia["revision_sistema"]; ?></textarea>
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label for="fecha">Fecha</label>
                <input type="date" class="form-control" id="fecha" name="fecha" value="<?php echo $historia["fecha_historia"]; ?>">
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label for="hora">Hora</label>
                <input type="time" class="form-control" id="hora" name="hora" value="<?php echo $historia["hora_historia"]; ?>">
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-sm-2">
              <div class="form-group">
                <label for="p_actual">Peso Actual</label>
                <input type="number" class="form-control" id="p_actual" name="p_actual" value="<?php echo $historia["precion_actual"]; ?>">
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label for="talla">Talla</label>
                <input type="number" class="form-control" id="talla" name="talla" value="<?php echo $historia["talla"];?>">
              </div>
            </div>
            <div class="col-sm-4">
              <fieldset class="border row">
                <legend class="float-none w-auto px-3">
                  Temperatura
                </legend>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="temperatura"> Auxiliar</label>
                    <input type="number" class="form-control" id="auxiliar" name="auxiliar" value="<?php echo $historia["tmp_auxiliar"]; ?>">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="temperatura">Bucal</label>
                    <input type="number" class="form-control" id="bucal" name="bucal" value="<?php echo $historia["tmp_bucal"]; ?>">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="temperatura">Rectal</label>
                    <input type="number" class="form-control" id="rectal" name="rectal" value="<?php echo $historia["tmp_rectal"]; ?>">
                  </div>
                </div>
              </fieldset>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label for="number">Pulso</label>
                <input type="text" class="form-control" id="pulso" name="pulso" value="<?php echo $historia["pulso"]; ?>">
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label for="frec_respiratoria">Frec. Respiratoria</label>
                <input type="number" class="form-control" id="frec_respiratoria" name="frec_respiratoria" value="<?php echo $historia["frec_respiratoria"]; ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <fieldset class="border row">
                <legend class="float-none w-auto px-3">
                  Presión arterial
                </legend>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="presion_max">Máxima</label>
                    <input type="number" class="form-control" id="presion_max" name="presion_max" value="<?php echo $historia["presion_max"]; ?>">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="presion_min">Mínima</label>
                    <input type="number" class="form-control" id="presion_min" name="presion_min" value="<?php echo $historia["presion_min"]; ?>">
                  </div>
                </div>
              </fieldset>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label for="examen_general">Examen físico general</label>
                <textarea class="form-control" id="examen_general" name="examen_general"><?php echo $historia["exm_fis_general"]; ?></textarea>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label for="examen_regional">Examen físico regional</label>
                <textarea class="form-control" id="examen_regional" name="examen_regional"><?php echo $historia["exm_fis_regional"]; ?></textarea>
              </div>
            </div>
          </div>
          
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </form>

    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
