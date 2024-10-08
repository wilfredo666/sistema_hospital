
<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">

        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="inicio" class="brand-link">
        <img src="assest/dist/img/logo.png" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Sistema Hospital</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="assest/dist/img/user_default.png" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block" id="usuarioLogin"><?php echo $_SESSION["nomUsuario"];?></a>
            <input type="hidden" id="idUsuario" value="<?php echo $_SESSION["idUsuario"];?>">
          </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <?php
            if($_SESSION["perfil"]=="Administrador"){
            ?>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  Usuarios
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">

                <li class="nav-item">
                  <a href="VUsuario" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Lista de usuarios</p>
                  </a>
                </li>
              </ul>
            </li>
            <?php
            }
            ?>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user-injured"></i>
                <p>
                  Pacientes
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">

                <li class="nav-item">
                  <a href="VPaciente" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Lista de pacientes</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="VTraspaso" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Ingresos/Traslados/Egresos</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="VHistoria" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Historias Clínicas</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="VEpicrisis" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Lista de Epicrisis</p>
                  </a>
                </li>

              </ul>
            </li>

            <li class="nav-item">
              <a href="salir" class="nav-link">
                <i class="fas fa-door-open nav-icon"></i>
                <p>Salir</p>
              </a>
            </li>

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
