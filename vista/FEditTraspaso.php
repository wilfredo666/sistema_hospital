<?php
$path = parse_url($_SERVER['REQUEST_URI']);
//id traspaso
$idTraspaso = $path["query"];

$traspaso=ControladorPaciente::ctrInfoTraspaso($idTraspaso);

$paciente=ControladorPaciente::ctrInfoPaciente($traspaso["id_paciente"]);

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
        <form action="POST" id="FEditTraspaso">
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
                      <input type="date" class="form-control" name="fIngreso" id="fIngreso" value="<?php echo $traspaso["fecha_ingreso"];?>">
                      <input type="hidden" name="idTraspaso" id="idTraspaso" value="<?php echo $idTraspaso;?>">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="">Egreso</label>
                      <input type="date" class="form-control" name="fEgreso" id="fEgreso" value="<?php echo $traspaso["fecha_egreso"];?>">
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
                      <input type="time" class="form-control" name="hIngreso" id="hIngreso" value="<?php echo $traspaso["hora_ingreso"];?>">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="">Egreso</label>
                      <input type="time" class="form-control" name="hEgreso" id="hEgreso" value="<?php echo $traspaso["hora_egreso"];?>">
                    </div>
                  </div>
                </fieldset>
              </div>
              <div class="col-sm-2">
                <div class="form-group">
                  <label for="">Servicio</label>
                  <input type="text" class="form-control" name="servicio" id="servicio" value="<?php echo $traspaso["servicio"];?>">
                </div>
              </div>

              <div class="col-sm-1">
                <div class="form-group">
                  <label for="">Sala</label>
                  <input type="text" class="form-control" name="sala" id="sala" value="<?php echo $traspaso["sala"];?>">
                </div>
              </div>
              <div class="col-sm-1">
                <div class="form-group">
                  <label for="">Cama</label>
                  <input type="text" class="form-control" id="cama" name="cama" value="<?php echo $traspaso["cama"];?>">
                </div>
              </div>
            </div>

            <div class="row">

              <div class="col-sm-3">
                <div class="form-group">
                  <label for="">Operaciones</label>
                  <textarea class="form-control" name="operaciones" id="operaciones"><?php echo $traspaso["operaciones"];?></textarea>

                </div>
              </div>

              <div class="col-sm-3">
                <div class="form-group">
                  <label for="">Diagnostico</label>
                  <textarea class="form-control" name="diagnostico" id="diagnostico"><?php echo $traspaso["diagnostico"];?></textarea>

                </div>
              </div>

              <div class="col-sm-3">
                <div class="form-group">
                  <label for="">Otro diagnostico</label>
                  <textarea class="form-control" name="otroDiagnostico" id="otroDiagnostico"><?php echo $traspaso["otroDiagnostico"];?></textarea>

                </div>
              </div>

              <div class="col-sm-3">
                <div class="form-group">
                  <label for="">Causas externas</label>
                  <textarea class="form-control" name="causasExternas" id="causasExternas"><?php echo $traspaso["causasExternas"];?></textarea>

                </div>
              </div>

            </div>

            <div class="row">
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="">Num. dias de estadia</label>
                  <input type="text" class="form-control" name="numDiasEstadia" id="numDiasEstadia" value="<?php echo $traspaso["numDiasEstadia"];?>">
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="">Condiciones de egreso</label>
                  <select name="condEgreso" id="condEgreso" class="form-control">
                    <option value="vivo" <?php if($traspaso["condEgreso"]=="vivo"):?>selected<?php endif;?>>Vivo</option>
                    <option value="muerto" <?php if($traspaso["condEgreso"]=="muerto"):?>selected<?php endif;?>>Muerto</option>
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
                      if($traspaso["causaAlta"]==$value){
                    ?>
                    <option value="<?php echo $value;?>" selected><?php echo $value;?></option>
                    <?php
                      }else{  
                    ?>
                    <option value="<?php echo $value;?>"><?php echo $value;?></option>
                    <?php
                      }
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
                  <input type="text" class="form-control" name="recienNacido" id="recienNacido" value="<?php echo $traspaso["recienNacido"];?>">
                </div>
              </div>
              <div class="col-sm-2">
                <div class="form-group">
                  <label for="">Tipo</label>
                  <?php
                  $tipo=array(
                    ""=>"",
                    "gemelos"=>"gemelos",
                    "mellizos"=>"mellizos"
                  );
                  ?>
                  <select name="tipoNacido" id="tipoNacido" class="form-control">
                    <?php
                    foreach($tipo as $value){
                      if($traspaso["tipoNacido"]==$value){
                    ?>
                    <option value="<?php echo $value;?>" selected><?php echo $value;?></option>
                    <?php
                      }else{
                    ?>
                    <option value="<?php echo $value;?>"><?php echo $value;?></option>
                    ?>
                    <?php
                      }
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class="col-sm-2">
                <div class="form-group">
                  <label for="">Sexo</label>
                  <select name="sexoNacido" id="sexoNacido" class="form-control">
                    <option value="" <?php if($traspaso["sexoNacido"]==""):?>selected<?php endif;?>></option>
                    <option value="masculino" <?php if($traspaso["sexoNacido"]=="masculino"):?>selected<?php endif;?>>Masculino</option>
                    <option value="femenino" <?php if($traspaso["sexoNacido"]=="femenino"):?>selected<?php endif;?>>Femenino</option>
                  </select>
                </div>
              </div>
              <div class="col-sm-2">
                <div class="form-group">
                  <label for="">Condiciones al nacer</label>
                  <select name="condNacer" id="condNacer" class="form-control">
                    <option value="" <?php if($traspaso["condNacer"]==""):?>selected<?php endif;?>></option>
                    <option value="vivo" <?php if($traspaso["condNacer"]=="vivo"):?>selected<?php endif;?>>Vivo</option>
                    <option value="muerto" <?php if($traspaso["condNacer"]=="muerto"):?>selected<?php endif;?>>Muerto</option>
                  </select>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label for="">Peso en gramos</label>
                  <input type="text" class="form-control" name="pesoNacido" id="pesoNacido" value="<?php echo $traspaso["pesoNacido"];?>">
                </div>
              </div>
            </fieldset>
            <div class="row">
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="">Nombre de medico:</label>
                  <input type="text" class="form-control" name="nomMedico" id="nomMedico" value="<?php echo $traspaso["nomMedico"];?>">
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="">Numero de matricula:</label>
                  <input type="text" class="form-control" name="matrMedico" id="matrMedico" value="<?php echo $traspaso["matrMedico"];?>">
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
