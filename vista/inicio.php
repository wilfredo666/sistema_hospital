<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Panel de Control</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>2</h3>

              <p>Usuarios</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <?php
            if($_SESSION["perfil"]=="Administrador"){
            ?>
            <a href="VUsuario" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
            <?php
            }else{
            ?>
            <a href="#" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
            <?php
            }
            ?>

          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>3</h3>

              <p>Pacientes</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="VPaciente" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

      </div>
      <!-- /.row -->

    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
