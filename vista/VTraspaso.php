
<!-- Content Wrapper. Contains page content -->
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
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Lista de: Ingresos, Traslados durante la hospitalizacion y Egresos</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th># H. Clinica</th>
                <th># SUS</th>
                <th>Paciente</th>
                <th>Fecha de Ingreso</th>
                <th>Fecha de Egreso</th>
                <th>Hora de Ingreso</th>
                <th>Hora de Egreso</th>
                <td></td>
              </tr>
            </thead>
            <tbody>
              <?php
              $traspaso=ControladorPaciente::ctrInfoTraspasos();
              foreach($traspaso as $value){
              ?>
              <tr>
                <td><?php echo $value["num_historia_clinica"];?></td>
                <td><?php echo $value["num_sus"];?></td>
                <td><?php echo $value["nombre_paciente"]." ".$value["ap_pat_paciente"]." ".$value["ap_mat_paciente"];?></td>
                <td><?php echo $value["fecha_ingreso"];?></td>
                <td><?php echo $value["fecha_egreso"];?></td>
                <td><?php echo $value["hora_ingreso"];?></td>
                <td><?php echo $value["hora_egreso"];?></td>

                <td>
                  <div class="btn-group">
                    <a href="FEditTraspaso?<?php echo $value['id_traspaso']; ?>" class="btn btn-secondary">
                      <i class="fas fa-edit"></i>
                    </a>

                    <button class="btn btn-danger" onclick="MEliTraspaso(<?php echo $value["id_traspaso"];?>)">
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
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
