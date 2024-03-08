<?php
require_once "../../controlador/pacienteControlador.php";
require_once "../../modelo/pacienteModelo.php";

$id=$_GET["id"];

$notaOrden=ControladorPaciente::ctrInfoNotaEvoOrd($id);

?> 

<form action="" id="FEditNota">
  <div class="modal-header bg-secondary">
    <h4 class="modal-title">Editar Nota</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">

    <div class="form-group">
      <label for="">Notas de evolucion clínica</label>
      <textarea name="notaEvoClinica" id="notaEvoClinica" class="form-control"><?php echo $notaOrden["nota_evolucion"];?></textarea>
      <input type="hidden" id="idNota" name="idNota" value="<?php echo $id;?>">
    </div>

    <div class="form-group">
      <label for="">Ordenes médicas</label>
      <textarea name="ordenMedica" id="ordenMedica" class="form-control"><?php echo $notaOrden["orden_medica"];?></textarea>
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
        editNota()
      }
    });

    $('#FEditNota').validate({
      rules: {
        notaEvoClinica: {
          required: true,
          minlength: 3,
        },
        ordenMedica: {
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


