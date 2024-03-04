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
          <h4>Notas de evolucion clínica y ordenes médicas</h4>
        </div>
        <form action="POST" id="FRegNotaEvoOrd">
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

            <fieldset class="border row">
              <legend class="float-none w-auto px-3">Agregar notas nuevas</legend>

              <div class="col-sm-2">
                <div class="form-group">
                  <label for="">Fecha y hora</label>
                  <input type="datetime-local" class="form-control" name="fechaEvolucion" id="fechaEvolucion">
                  <input type="hidden" id="idPaciente" name="idPaciente" value="<?php echo $id;?>">
                </div>
              </div>
              <div class="col-sm-5">
                <div class="form-group">
                  <label for="">Notas de evolucion clínica</label>
                  <textarea name="notaEvoClinica" id="notaEvoClinica" class="form-control"></textarea>
                </div>
              </div>

              <div class="col-sm-5">
                <div class="form-group">
                  <label for="">Ordenes médicas</label>
                  <textarea name="ordenMedica" id="ordenMedica" class="form-control"></textarea>
                </div>
              </div>
            </fieldset>
            <br>
            <div class="row">
              <div class="col-sm-12 text-right">
                <button type="submit" class="btn btn-success">Guardar</button>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-sm-12">
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Fecha y hora</th>
                      <th>Notas de evolucion clínica</th>
                      <th>Ordenes médicas</th>
                      <td></td>
                    </tr>

                  </thead>
                  <tbody>
                    <?php
                    $notas=ControladorPaciente::ctrInfoNotasEvoOrd();
                    foreach($notas as $value){
                    ?>
                    <tr>
                      <td><?php echo $value["fecha_hora_evolucion"];?></td>
                      <td><?php echo $value["nota_evolucion"];?></td>
                      <td><?php echo $value["orden_medica"];?></td>
                      <td>
                        <div class="btn-group">

                          <button class="btn btn-secondary" onclick="MEditNota(<?php echo $value["id_evolucion_orden"];?>)">
                            <i class="fas fa-edit"></i>
                          </button>
                          <button class="btn btn-danger" onclick="MEliNota(<?php echo $value["id_evolucion_orden"];?>)">
                            <i class="fas fa-trash"></i>
                          </button>
                        </div>
                      </td>

                    </tr>
                    <?php
                    }
                    ?>


                  </tbody>
                </table>
              </div>
            </div>

          </div>


        </form>

      </div>


    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
