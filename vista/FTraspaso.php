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
          <h4>Ejecutar traspaso/ingreso</h4>
        </div>
        <form action="" id="FRegPaciente">
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
                      <input type="date" class="form-control" name="hisClinica" id="hisClinica">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="">Egreso</label>
                      <input type="date" class="form-control" name="numSus" id="numSus">
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
                      <input type="time" class="form-control" name="hisClinica" id="hisClinica">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="">Egreso</label>
                      <input type="time" class="form-control" name="numSus" id="numSus">
                    </div>
                  </div>
                </fieldset>
              </div>
              <div class="col-sm-2">
                <div class="form-group">
                  <label for="">Servicio</label>
                  <input type="text" class="form-control" name="nacPaciente" id="nacPaciente">
                </div>
              </div>

              <div class="col-sm-1">
                <div class="form-group">
                  <label for="">Sala</label>
                  <input type="text" class="form-control" name="nacPaciente" id="nacPaciente">
                </div>
              </div>
              <div class="col-sm-1">
                <div class="form-group">
                  <label for="">Cama</label>
                  <input type="text" class="form-control" id="estCivil" name="estCivil">
                </div>
              </div>
            </div>

            <div class="row">

              <div class="col-sm-3">
                <div class="form-group">
                  <label for="">Operaciones</label>
                  <textarea name="" id="" class="form-control" name="dirPaciente" id="dirPaciente" placeholder="Direccion del paciente u otra persona de referencia">

                  </textarea>

                </div>
              </div>

              <div class="col-sm-3">
                <div class="form-group">
                  <label for="">Diagnostico</label>
                  <textarea name="" id="" class="form-control" name="dirPaciente" id="dirPaciente" placeholder="Direccion del paciente u otra persona de referencia">

                  </textarea>

                </div>
              </div>

              <div class="col-sm-3">
                <div class="form-group">
                  <label for="">Otro diagnostico</label>
                  <textarea name="" id="" class="form-control" name="dirPaciente" id="dirPaciente" placeholder="Direccion del paciente u otra persona de referencia">

                  </textarea>

                </div>
              </div>

              <div class="col-sm-3">
                <div class="form-group">
                  <label for="">Causas externas</label>
                  <textarea name="" id="" class="form-control" name="dirPaciente" id="dirPaciente" placeholder="Direccion del paciente u otra persona de referencia">

                  </textarea>

                </div>
              </div>

            </div>

            <div class="row">
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="">Num. dias de estadia</label>
                  <input type="text" class="form-control" name="lugNacimiento" id="lugNacimiento" placeholder="Pueblo o municipio donde nacio">
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="">Condiciones de egreso</label>
                  <input type="text" class="form-control" name="provPaciente" id="provPaciente" placeholder="Lugar de residencia actual del paciente">
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="">Causas de alta</label>

                  <?php
                  $departamentos = array(
                    "La Paz" => "La Paz",
                    "Oruro" => "Oruro",
                    "Potosi" => "Postosi",
                    "Cochabamba" => "Cochabamba",
                    "Chuquisaca" => "Chuquisaca",
                    "Tarija" => "Tarija",
                    "Pando" => "Pando",
                    "Beni" => "Beni",
                    "Santa Cruz" => "Santa Cruz"
                  );
                  ?>
                  <select name="depPaciente" id="depPaciente" class="form-control">
                    <?php
                    foreach($departamentos as $value){
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
                  <input type="text" class="form-control" name="ocupaPaciente" id="ocupaPaciente">
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
                  <select name="instPaciente" id="instPaciente" class="form-control">
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
                  <select name="" id="" class="form-control">
                    <option value="masculino">Masculino</option>
                    <option value="femenino">Femenino</option>
                  </select>
                </div>
              </div>
              <div class="col-sm-2">
                <div class="form-group">
                  <label for="">Condiciones al nacer</label>
                  <select name="" id="" class="form-control">
                    <option value="vivo">Vivo</option>
                    <option value="muerto">Muerto</option>
                  </select>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label for="">Peso en gramos</label>
                  <input type="text" class="form-control" name="medInternacion" id="medInternacion">
                </div>
              </div>
            </fieldset>
            <div class="row">


              <div class="col-sm-4">
                <div class="form-group">
                  <label for="">Condicion de ingreso</label>
                  <select name="" id="" class="form-control">
                    <option value="vivo">Vivo</option>
                    <option value="muerto">Muerto</option>
                  </select>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="">Nombre de medico:</label>
                  <input type="text" class="form-control" name="enviadoDe" id="enviadoDe">
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="">Numero de matricula:</label>
                  <input type="text" class="form-control" name="enviadoDe" id="enviadoDe">
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
