<?php
require_once "../../controlador/pacienteControlador.php";
require_once "../../modelo/pacienteModelo.php";

$id=$_GET["id"];

$paciente=ControladorPaciente::ctrInfoPaciente($id);

?>
<form action="" id="FEditPaciente">
  <div class="modal-header bg-primary">
    <h4 class="modal-title">Actualizar paciente</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <div class="row">
      <div class="col-sm-4">
        <div class="form-group">
          <label for="">Nombre</label>
          <input type="text" class="form-control" name="nomPaciente" id="nomPaciente" value="<?php echo $paciente["nombre_paciente"];?>">
          <input type="hidden" name="idPaciente" value="<?php echo $paciente["id_paciente"];?>">
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group">
          <label for="">Apellido Paterno</label>
          <input type="text" class="form-control" name="patPaciente" id="patPaciente" value="<?php echo $paciente["ap_pat_paciente"];?>">
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group">
          <label for="">Apellido Materno</label>
          <input type="text" class="form-control" name="matPaciente" id="matPaciente" value="<?php echo $paciente["ap_mat_paciente"];?>">
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-2">
        <div class="form-group">
          <label for=""># de Historia clinica</label>
          <input type="text" class="form-control" name="hisClinica" id="hisClinica" value="<?php echo $paciente["num_historia_clinica"];?>" readonly>
        </div>
      </div>
      <div class="col-sm-2">
        <div class="form-group">
          <label for=""># SUS</label>
          <input type="text" class="form-control" name="numSus" id="numSus" value="<?php echo $paciente["num_sus"];?>" readonly>
        </div>
      </div>
      <div class="col-sm-2">
        <div class="form-group">
          <label for="">Fecha de nacimiento</label>
          <input type="date" class="form-control" name="nacPaciente" id="nacPaciente" value="<?php echo $paciente["fecha_nacimiento"];?>">
        </div>
      </div>
      <div class="col-sm-2">
        <div class="form-group">
          <label for="">Sexo</label>
          <select name="sexoPaciente" id="sexoPaciente" class="form-control">
            <option value="Masculino" <?php if($paciente["sexo_paciente"]=="Masculino"):?>selected<?php endif;?>>Masculino</option>
            <option value="Femenino" <?php if($paciente["sexo_paciente"]=="Femenino"):?>selected<?php endif;?>>Femenino</option>
          </select>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group">
          <label for="">Estado civil</label>
          <input type="text" class="form-control" id="estCivil" name="estCivil" value="<?php echo $paciente["estado_civil"];?>">
        </div>
      </div>
    </div>

    <div class="row">

      <div class="col-sm-6">
        <div class="form-group">
          <label for="">Dirección</label>
          <input type="text" class="form-control" name="dirPaciente" id="dirPaciente" placeholder="Direccion del paciente u otra persona de referencia" value="<?php echo $paciente["direccion_paciente"];?>">
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label for="">Procedencia</label>
          <input type="text" class="form-control" name="procPaciente" id="procPaciente" placeholder="Pueblo o municipio de dónde imigra el paciente" value="<?php echo $paciente["procedencia"];?>">
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-4">
        <div class="form-group">
          <label for="">Lugar de nacimiento</label>
          <input type="text" class="form-control" name="lugNacimiento" id="lugNacimiento" placeholder="Pueblo o municipio donde nacio" value="<?php echo $paciente["lugar_nacimiento"];?>">
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group">
          <label for="">Provincia</label>
          <input type="text" class="form-control" name="provPaciente" id="provPaciente" placeholder="Lugar de residencia actual del paciente" value="<?php echo $paciente["provincia"];?>">
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group">
          <label for="">Departamento</label>

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
              if($paciente["departamento"]==$value){
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

    <div class="row">
      <div class="col-sm-4">
        <div class="form-group">
          <label for="">Ocupacion</label>
          <input type="text" class="form-control" name="ocupaPaciente" id="ocupaPaciente" value="<?php echo $paciente["ocupacion"];?>">
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group">
          <label for="">Grado de instrucción</label>
          <?php
          $instruccion=array(
            "A"=>"A",
            "B"=>"B",
            "I"=>"I",
            "M"=>"M",
            "T"=>"T",
            "U"=>"U"
          );
          ?>
          <select name="instPaciente" id="instPaciente" class="form-control">
            <?php
            foreach($instruccion as $value){
              if($paciente["grado_instruccion"]==$value){
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
      <div class="col-sm-4">
        <div class="form-group">
          <label for="">Diagnostico de ingreso</label>
          <textarea name="diagnostico" id="diagnostico" class="form-control"><?php echo $paciente["diagnostico_ingreso"];?></textarea>
        </div>
      </div>
    </div>

    <div class="row">

      <div class="col-sm-4">
        <div class="form-group">
          <label for="">Medico de internación</label>
          <input type="text" class="form-control" name="medInternacion" id="medInternacion" value="<?php echo $paciente["medico_internacion"];?>">
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group">
          <label for="">Matricula del medico</label>
          <input type="text" class="form-control" name="matMedico" id="matMedico" value="<?php echo $paciente["matricula_medico"];?>">
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group">
          <label for="">Enviado de:</label>
          <input type="text" class="form-control" name="enviadoDe" id="enviadoDe" value="<?php echo $paciente["enviado_de"];?>">
        </div>
      </div>
    </div>
  </div>
  <div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
    <button type="submit" class="btn btn-primary">Guardar</button>
  </div>
</form>

<script>
  $(function () {
    $.validator.setDefaults({
      submitHandler: function () {
        editPaciente()
      }
    });

    $('#FEditPaciente').validate({
      rules: {
        nomPaciente: {
          required: true,
          minlength: 3,
        },
        patPaciente: {
          required: true,
          minlength: 3
        },
        matPaciente: {
          required: true,
          minlength: 3
        },
        dirPaciente: {
          required: true,
          minlength: 3
        },
        procPaciente: {
          required: true,
          minlength: 3
        },
        lugNacimiento: {
          required: true,
          minlength: 3
        },
        provPaciente: {
          required: true,
          minlength: 3
        },
        ocupaPaciente: {
          required: true,
          minlength: 3
        },
        diagnostico: {
          required: true,
          minlength: 3
        },
        medInternacion: {
          required: true,
          minlength: 3
        },
        matMedico: {
          required: true,
          minlength: 3
        },
        enviadoDe: {
          required: true,
          minlength: 3
        }

      },

      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });
  });
</script>


