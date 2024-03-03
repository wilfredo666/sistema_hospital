<?php
$path = parse_url($_SERVER['REQUEST_URI']);
//id paciente
$id = $path["query"];

$paciente=ControladorPaciente::ctrInfoPaciente($id);


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
          <h4>Ejecutar Ingreso/Traspaso/Egreso</h4>
        </div>
        <form action="POST" id="FRegTraspaso">
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
              <hr>
            </div>

            <div class="row">
              <div class="col-sm-4">
                <fieldset class="border row">
                  <legend class="float-none w-auto px-3">Fecha</legend>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="">Ingreso</label>
                      <input type="date" class="form-control" name="fIngreso" id="fIngreso">
                      <input type="hidden" name="idPaciente" id="idPaciente" value="<?php echo $id;?>">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="">Egreso</label>
                      <input type="date" class="form-control" name="fEgreso" id="fEgreso">
                    </div>
                  </div>
                </fieldset>
              </div>

              <div class="col-sm-4">
                <fieldset class="border row">
                  <legend class="float-none w-auto px-3">Hora</legend>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="">Ingreso</label>
                      <input type="time" class="form-control" name="hIngreso" id="hIngreso">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="">Egreso</label>
                      <input type="time" class="form-control" name="hEgreso" id="hEgreso">
                    </div>
                  </div>
                </fieldset>
              </div>
              <div class="col-sm-2">
                <div class="form-group">
                  <label for="">Servicio</label>
                  <input type="text" class="form-control" name="servicio" id="servicio">
                </div>
              </div>

              <div class="col-sm-1">
                <div class="form-group">
                  <label for="">Sala</label>
                  <input type="text" class="form-control" name="sala" id="sala">
                </div>
              </div>
              <div class="col-sm-1">
                <div class="form-group">
                  <label for="">Cama</label>
                  <input type="text" class="form-control" id="cama" name="cama">
                </div>
              </div>
            </div>

            <div class="row">

              <div class="col-sm-3">
                <div class="form-group">
                  <label for="">Operaciones</label>
                  <textarea class="form-control" name="operaciones" id="operaciones"></textarea>

                </div>
              </div>

              <div class="col-sm-3">
                <div class="form-group">
                  <label for="">Diagnostico</label>
                  <textarea class="form-control" name="diagnostigo" id="diagnostigo"></textarea>

                </div>
              </div>

              <div class="col-sm-3">
                <div class="form-group">
                  <label for="">Otro diagnostico</label>
                  <textarea class="form-control" name="otroDiagnostico" id="otroDiagnostico"></textarea>

                </div>
              </div>

              <div class="col-sm-3">
                <div class="form-group">
                  <label for="">Causas externas</label>
                  <textarea class="form-control" name="causasExternas" id="causasExternas"></textarea>

                </div>
              </div>

            </div>

            <div class="row">
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="">Num. dias de estadia</label>
                  <input type="text" class="form-control" name="numDiasEstadia" id="numDiasEstadia">
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="">Condiciones de egreso</label>
                  <select name="condEgreso" id="condEgreso" class="form-control">
                    <option value="vivo">Vivo</option>
                    <option value="muerto">Muerto</option>
                  </select>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="">Causas de alta</label>

                  <?php
                  $causasAlta = array(
                    "Fuga" => "Fuga",
                    "Recuperacion" => "Recuperacion",
                  );
                  ?>
                  <select name="causaAlta" id="causaAlta" class="form-control">
                    <?php
                    foreach($causasAlta as $value){
                    ?>
                    <option value="<?php echo $value;?>"><?php echo $value;?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
              </div>
            </div>
            <fieldset class="border row">
              <legend class="float-none w-auto px-3">Condiciones de nacimiento</legend>

              <div class="col-sm-3">
                <div class="form-group">
                  <label for="">Recien nacido</label>
                  <input type="text" class="form-control" name="recienNacido" id="recienNacido">
                </div>
              </div>
              <div class="col-sm-2">
                <div class="form-group">
                  <label for="">Tipo</label>
                  <?php
                  $tipo=array(
                    "gemelos"=>"gemelos",
                    "mellizos"=>"mellizos"
                  );
                  ?>
                  <select name="tipoNacido" id="tipoNacido" class="form-control">
                    <?php
                    foreach($tipo as $value){
                    ?>
                    <option value="<?php echo $value;?>"><?php echo $value;?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class="col-sm-2">
                <div class="form-group">
                  <label for="">Sexo</label>
                  <select name="sexoNacido" id="sexoNacido" class="form-control">
                    <option value="masculino">Masculino</option>
                    <option value="femenino">Femenino</option>
                  </select>
                </div>
              </div>
              <div class="col-sm-2">
                <div class="form-group">
                  <label for="">Condiciones al nacer</label>
                  <select name="condNacer" id="condNacer" class="form-control">
                    <option value="vivo">Vivo</option>
                    <option value="muerto">Muerto</option>
                  </select>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label for="">Peso en gramos</label>
                  <input type="text" class="form-control" name="pesoNacido" id="pesoNacido">
                </div>
              </div>
            </fieldset>
            <div class="row">
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="">Nombre de medico:</label>
                  <input type="text" class="form-control" name="nomMedico" id="nomMedico">
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="">Numero de matricula:</label>
                  <input type="text" class="form-control" name="matrMedico" id="matrMedico">
                </div>
              </div>
              <div class="col-sm-4">
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
