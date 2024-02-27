
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
          <h3 class="card-title">Lista de Pacientes registrados</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th># H. Clinica</th>
                <th>Nombre</th>
                <th># SUS</th>
                <th>Sexo</th>
                <th>Estado</th>
                <td>
                  <button class="btn btn-primary" onclick="MNuevoPaciente()">Nuevo</button>
                </td>
              </tr>
            </thead>
            <tbody>
              <?php
              $cliente=ControladorPaciente::ctrInfoPacientes();
              foreach($cliente as $value){
              ?>

              <tr>
                <td><?php echo $value["num_historia_clinica"];?></td>
                <td><?php echo $value["nombre_paciente"];?></td>
                <td><?php echo $value["num_sus"];?></td>
                <td><?php echo $value["sexo_paciente"];?></td>
                <td>
                <?php 
                if($value["estado_paciente"]==1){
                  ?>
                  <span class="badge badge-success">Activo</span>
                  <?php
                }else{
                  ?>
                  <span class="badge badge-danger">De baja</span>
                  <?php
                }
                  ?>
                <td>
                  <div class="btn-group">
                    <button class="btn btn-info" onclick="MVerPaciente(<?php echo $value["id_paciente"];?>)">
                      <i class="fas fa-eye"></i>
                    </button>
                    <button class="btn btn-secondary" onclick="MEditPaciente(<?php echo $value["id_paciente"];?>)">
                      <i class="fas fa-edit"></i>
                    </button>
                    <button class="btn btn-danger" onclick="MEliPaciente(<?php echo $value["id_paciente"];?>)">
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
