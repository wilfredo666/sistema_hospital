<?php
require_once "../../controlador/pacienteControlador.php";
require_once "../../modelo/pacienteModelo.php";

$id=$_GET["id"];

$paciente=ControladorPaciente::ctrInfoPaciente($id);

?> 

<div class="modal-header bg-info">
  <h4 class="modal-title">Informacion de paciente</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body">

  <div class="row">
    <div class="col-sm-6">
      <table class="table">
        <tr>
          <th>Nombre:</th>
          <td><?php echo $paciente["nombre_paciente"];?></td>
        </tr>
        <tr>
          <th>Apellido Paterno:</th>
          <td><?php echo $paciente["ap_pat_paciente"];?></td>
        </tr>
        <tr>
          <th>Apellido Materno:</th>
          <td><?php echo $paciente["ap_mat_paciente"];?></td>
        </tr>
        <tr>
          <th># Historia clinica:</th>
          <td><?php echo $paciente["num_historia_clinica"];?></td>
        </tr>
        <tr>
          <th># SUS:</th>
          <td><?php echo $paciente["num_sus"];?></td>
        </tr>
        <tr>
          <th>F. Nacimiento:</th>
          <td><?php echo $paciente["fecha_nacimiento"];?></td>
        </tr>
        <tr>
          <th>Sexo:</th>
          <td><?php echo $paciente["sexo_paciente"];?></td>
        </tr>
                <tr>
          <th>Dirección:</th>
          <td><?php echo $paciente["direccion_paciente"];?></td>
        </tr>
        <tr>
          <th>Lugar de nacimiento:</th>
          <td><?php echo $paciente["lugar_nacimiento"];?></td>
        </tr>
        <tr>
          <th>Provincia:</th>
          <td><?php echo $paciente["provincia"];?></td>
        </tr>

      </table>
    </div>
    <div class="col-sm-6">
      <table class="table">
        <tr>
          <th>Departamento:</th>
          <td><?php echo $paciente["departamento"];?></td>
        </tr>
        <tr>
          <th>Procendencia:</th>
          <td><?php echo $paciente["procedencia"];?></td>
        </tr>
        <tr>
          <th>Estado Civil:</th>
          <td><?php echo $paciente["estado_civil"];?></td>
        </tr>
        <tr>
          <th>Ocupación:</th>
          <td><?php echo $paciente["ocupacion"];?></td>
        </tr>
        <tr>
          <th>Grado de instrucción:</th>
          <td><?php echo $paciente["grado_instruccion"];?></td>
        </tr>
        <tr>
          <th>Diagnostico de ingreso:</th>
          <td><?php echo $paciente["diagnostico_ingreso"];?></td>
        </tr>
        <tr>
          <th>Medico de internación:</th>
          <td><?php echo $paciente["medico_internacion"];?></td>
        </tr>
        <tr>
          <th>Enviado de:</th>
          <td><?php echo $paciente["enviado_de"];?></td>
        </tr>
        <tr>
          <th>Fecha de registro:</th>
          <td><?php echo $paciente["fecha_registro"];?></td>
        </tr>
        <tr>
          <th>Estado:</th>
          <td><?php 
            if($paciente["estado_paciente"]==1){
            ?>
            <span class="badge badge-success">Activo</span>
            <?php
            }else{
            ?>
            <span class="badge badge-danger">De Baja</span>
            <?php
            }
            ?></td>
        </tr>
      </table>
    </div>
  </div>

</div>
<div class="modal-footer justify-content-between">

</div>

