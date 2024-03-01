
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
          <h3 class="card-title">Lista de historiales clínicos</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th># H. Clinica</th>
                <th>Paciente</th>
                <th>Edad</th>
                <th>Fecha</th>
                <th>Estado</th>
                <td>
                  <button class="btn btn-primary" onclick="MNuevoPaciente()">Nuevo</button>
                </td>
              </tr>
            </thead>
            <tbody>
              <?php
              $historia=ControladorPaciente::ctrInfoHistorias();
              foreach($historia as $value){
              ?>
              <tr>
                <td><?php echo $value["num_historia_clinica"];?></td>
                <td><?php echo $value["nombre_paciente"]." ".$value["ap_pat_paciente"]." ".$value["ap_mat_paciente"];?></td>
                <td><?php echo $value["fecha_nacimiento"];?></td>
                <td><?php echo $value["fecha_historia"];?></td>
                <td></td>

                <td>
                  <div class="btn-group">
                   <a href="vista/paciente/FEditHistoria?<?php echo $value['id_historia']; ?>" class="btn btn-secondary">
                   <i class="fas fa-edit"></i>
                   </a>

                    <button class="btn btn-danger" onclick="MEliHistoria(<?php echo $value["id_historia"];?>)">
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
