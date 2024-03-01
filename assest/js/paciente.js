function MNuevoPaciente(){
  $("#modal-xl").modal("show")

  var obj=""
  $.ajax({
    type:"POST",
    url:"vista/paciente/FNuevoPaciente.php",
    data:obj,
    success:function(data){
      $("#content-xl").html(data)
    }

  })


}

function regPaciente(){

  var formData=new FormData($("#FRegPaciente")[0])


  $.ajax({
    type:"POST",
    url:"controlador/pacienteControlador.php?ctrRegPaciente",
    data:formData,
    cache:false,
    contentType:false,
    processData:false,
    success:function(data){

      if(data="ok"){

        Swal.fire({
          icon: 'success',
          showConfirmButton: false,
          title: 'El Paciente ha sido registrado',
          timer: 1000
        })
        setTimeout(function(){
          location.reload()
        },1200)

      }else{
        Swal.fire({
          title: "Error!",
          icon: "error",
          showConfirmButton: false,
          timer: 1000
        })
      }

    }

  })
}

function MVerPaciente(id){
  $("#modal-lg").modal("show")

  var obj=""
  $.ajax({
    type:"POST",
    url:"vista/paciente/VerPaciente.php?id="+id,
    data:obj,
    success:function(data){
      $("#content-lg").html(data)
    }

  })

}

function MEditPaciente(id){

  $("#modal-xl").modal("show")

  var obj=""
  $.ajax({
    type:"POST",
    url:"vista/paciente/FEditPaciente.php?id="+id,
    data:obj,
    success:function(data){
      $("#content-xl").html(data)
    }

  })
}

function editPaciente(){

  var formData=new FormData($("#FEditPaciente")[0])

  $.ajax({
    type:"POST",
    url:"controlador/pacienteControlador.php?ctrEditPaciente",
    data:formData,
    cache:false,
    contentType:false,
    processData:false,
    success:function(data){


      if(data="ok"){

        Swal.fire({
          icon: 'success',
          showConfirmButton: false,
          title: 'El Paciente ha sido actualizado',
          timer: 1000
        })
        setTimeout(function(){
          location.reload()
        },1200)

      }else{
        Swal.fire({
          title: "Error!",
          icon: "error",
          showConfirmButton: false,
          timer: 1000
        })
      }

    }

  })

}

function MEliPaciente(id){
  var obj={
    id:id
  }

  Swal.fire({
    title:"Estas seguro de eliminar este Paciente?",
    showDenyButton:true,
    showCancelButton:false,
    confirmButtonText:'Confirmar',
    denyButtonText:'Cancelar'
  }).then((result)=>{
    if(result.isConfirmed){
      $.ajax({
        type:"POST",
        url:"controlador/pacienteControlador.php?ctrEliPaciente",
        data:obj,
        success:function(data){

          if(data=="ok"){
            location.reload()
          }else{
            Swal.fire({
              icon: 'error',
              showConfirmButton: false,
              title: 'Error',
              text:'El Paciente no puede ser eliminado',
              timer: 1000
            })
          }
        }
      })
    }
  })
}

/*=======================
historia clinica en sala
========================*/
function regHisClinica(){
    var formData=new FormData($("#FRegHisClinica")[0])


  $.ajax({
    type:"POST",
    url:"controlador/pacienteControlador.php?ctrRegHisClinica",
    data:formData,
    cache:false,
    contentType:false,
    processData:false,
    success:function(data){

      if(data="ok"){

        Swal.fire({
          icon: 'success',
          showConfirmButton: false,
          title: 'Historia registrada',
          timer: 1000
        })
        setTimeout(function(){
          location.reload()
        },1200)

      }else{
        Swal.fire({
          title: "Error!",
          icon: "error",
          showConfirmButton: false,
          timer: 1000
        })
      }

    }

  })
}

function MEliHistoria(id){

}