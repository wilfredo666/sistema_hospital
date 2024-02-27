<?php
require_once "../../controlador/usuarioControlador.php";
require_once "../../modelo/usuarioModelo.php";

$id=$_GET["id"];

$usuario=ControladorUsuario::ctrInfoUsuario($id);

?>
<form action="" id="FEditUsuario">
  <div class="modal-header bg-primary">
    <h4 class="modal-title">Registro nuevo usuario</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <div class="form-group">
      <label for="">Nombre y apellido</label>
      <input type="text" class="form-control" name="nomUsuario" id="nomUsuario" value="<?php echo $usuario["nombre_usuario"];?>">
    </div>
    <div class="form-group">
      <label for="">Perfil</label>
      <select name="perfil" id="perfil" class="form-control">
        <option value="Administrador" <?php if($usuario["perfil"]=="Administrador"):?>selected<?php endif;?>>Administrador</option>
        <option value="Enfermero" <?php if($usuario["perfil"]=="Enfermero"):?>selected<?php endif;?>>Enfermero</option>
        <option value="Medico" <?php if($usuario["perfil"]=="Medico"):?>selected<?php endif;?>>Medico</option>
      </select>
    </div>
    <div class="form-group">
      <label for="">Login Usuario</label>
      <input type="text" class="form-control" name="login" id="login" value="<?php echo $usuario["login_usuario"];?>" readonly>
      <input type="hidden" name="idUsuario" value="<?php echo $usuario["id_usuario"];?>">
    </div>
    <div class="form-group">
      <label for="">Password</label>
      <input type="password" class="form-control" name="password" id="password" value="<?php echo $usuario["password"];?>">
    </div>
    <div class="form-group">
      <label for="">Repetir password</label>
      <input type="password" class="form-control" name="vrPassword" id="vrPassword" value="<?php echo $usuario["password"];?>">
      <input type="hidden" value="<?php echo $usuario["password"];?>" name="passActual">
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
        editUsuario()
      }
    });

    $('#FEditUsuario').validate({
      rules: {
        password: {
          required: true,
          minlength: 3
        },
        vrPassword:{
          required: true,
          equalTo:"#password"
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

