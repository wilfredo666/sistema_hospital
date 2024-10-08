
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
          <h3 class="card-title">Lista de Epicrisis</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th># H. Clinica</th>
                <th># SUS</th>
                <th>Paciente</th>
                <th>Fecha Ingreso a Epicrisis</th>
                <td>

                </td>
              </tr>
            </thead>
            <tbody>
              <?php
              $historia=ControladorPaciente::ctrInfoEpicrisis();
              foreach($historia as $value){
              ?>
              <tr>
                <td><?php echo $value["num_historia_clinica"];?></td>
                <td><?php echo $value["num_sus"];?></td>
                <td><?php echo $value["nombre_paciente"]." ".$value["ap_pat_paciente"]." ".$value["ap_mat_paciente"];?></td>
                <td><?php echo $value["fecha_ingreso_epi"];?></td>

                <td>
                  <div class="btn-group">
                    <a href="FEditEpicrisis?<?php echo $value['id_epicrisis']; ?>" class="btn btn-secondary">
                      <i class="fas fa-edit"></i>
                    </a>

                    <button class="btn btn-danger" onclick="FEliEpicrisis(<?php echo $value["id_epicrisis"];?>)">
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
