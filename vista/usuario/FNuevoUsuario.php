<form action="" id="FRegUsuario">
  <div class="modal-header bg-primary">
    <h4 class="modal-title">Registro nuevo usuario</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <div class="form-group">
      <label for="">Nombre y apellido</label>
      <input type="text" class="form-control" name="nomUsuario" id="nomUsuario">
    </div>
    <div class="form-group">
      <label for="">Perfil</label>
     <select name="perfil" id="perfil" class="form-control">
       <option value="Administrador">Administrador</option>
       <option value="Enfermero">Enfermero</option>
       <option value="Medico">Medico</option>
     </select>
    </div>
    <div class="form-group">
      <label for="">Login Usuario</label>
      <input type="text" class="form-control" name="login" id="login">
    </div>
    <div class="form-group">
      <label for="">Password</label>
      <input type="password" class="form-control" name="password" id="password">
    </div>
    <div class="form-group">
      <label for="">Repetir password</label>
      <input type="password" class="form-control" name="vrPassword" id="vrPassword">
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
      regUsuario()
    }
  });
  
  $('#FRegUsuario').validate({
    rules: {
      login: {
        required: true,
        minlength: 3,
      },
      password: {
        required: true,
        minlength: 3,
      },
      vrPassword:{
        required: true,
        equalTo:"#password" //validando las mismas password
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

