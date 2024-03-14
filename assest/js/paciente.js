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

      if(data=="ok"){

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


      if(data=="ok"){

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

/*========================
traspaso paciente
========================*/
function regTraspaso(){
  var formData=new FormData($("#FRegTraspaso")[0])


  $.ajax({
    type:"POST",
    url:"controlador/pacienteControlador.php?ctrRegTraspaso",
    data:formData,
    cache:false,
    contentType:false,
    processData:false,
    success:function(data){

      if(data=="ok"){

        Swal.fire({
          icon: 'success',
          showConfirmButton: false,
          title: 'El Ingreso/Traspaso/Egreso ha sido registrado',
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

function editTraspaso(){
  
  var formData=new FormData($("#FEditTraspaso")[0])

  $.ajax({
    type:"POST",
    url:"controlador/pacienteControlador.php?ctrEditTraspaso",
    data:formData,
    cache:false,
    contentType:false,
    processData:false,
    success:function(data){

      if(data=="ok"){

        Swal.fire({
          icon: 'success',
          showConfirmButton: false,
          title: 'Traslado actualizado',
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

function MEliTraspaso(id){
  var obj={
    id:id
  }

  Swal.fire({
    title:"Estas seguro de eliminar este registro?",
    showDenyButton:true,
    showCancelButton:false,
    confirmButtonText:'Confirmar',
    denyButtonText:'Cancelar'
  }).then((result)=>{
    if(result.isConfirmed){
      $.ajax({
        type:"POST",
        url:"controlador/pacienteControlador.php?ctrEliTraspaso",
        data:obj,
        success:function(data){

          if(data=="ok"){
            location.reload()
          }else{
            Swal.fire({
              icon: 'error',
              showConfirmButton: false,
              title: 'Error',
              text:'Registro eliminado',
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

      if(data=="ok"){

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

function editHisClinica(){
  var formData=new FormData($("#FEditHisClinica")[0])


  $.ajax({
    type:"POST",
    url:"controlador/pacienteControlador.php?ctrEditHisClinica",
    data:formData,
    cache:false,
    contentType:false,
    processData:false,
    success:function(data){

      if(data=="ok"){

        Swal.fire({
          icon: 'success',
          showConfirmButton: false,
          title: 'Historia actualizada',
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
  var obj={
    id:id
  }

  Swal.fire({
    title:"Estas seguro de eliminar esta historia?",
    showDenyButton:true,
    showCancelButton:false,
    confirmButtonText:'Confirmar',
    denyButtonText:'Cancelar'
  }).then((result)=>{
    if(result.isConfirmed){
      $.ajax({
        type:"POST",
        url:"controlador/pacienteControlador.php?ctrEliHistoria",
        data:obj,
        success:function(data){

          if(data=="ok"){
            location.reload()
          }else{
            Swal.fire({
              icon: 'error',
              showConfirmButton: false,
              title: 'Error',
              text:'La historia no puede ser eliminado',
              timer: 1000
            })
          }
        }
      })
    }
  })
}

/*================
ordenes medicas
=================*/
function regNotaEvoOrd(){
  var formData=new FormData($("#FRegNotaEvoOrd")[0])

  $.ajax({
    type:"POST",
    url:"controlador/pacienteControlador.php?ctrRegNotaEvoOrd",
    data:formData,
    cache:false,
    contentType:false,
    processData:false,
    success:function(data){

      if(data=="ok"){

        Swal.fire({
          icon: 'success',
          showConfirmButton: false,
          title: 'Registrado agregado',
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

function MEditNota(id){
  $("#modal-default").modal("show")

  var obj=""
  $.ajax({
    type:"POST",
    url:"vista/paciente/FEditNota.php?id="+id,
    data:obj,
    success:function(data){
      $("#content-default").html(data)
    }

  })
}

function editNota(){
  var formData=new FormData($("#FEditNota")[0])

  $.ajax({
    type:"POST",
    url:"controlador/pacienteControlador.php?ctrEditNota",
    data:formData,
    cache:false,
    contentType:false,
    processData:false,
    success:function(data){

      if(data=="ok"){

        Swal.fire({
          icon: 'success',
          showConfirmButton: false,
          title: 'Nota/Orden actualizada',
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

function MEliNota(id){
  var obj={
    id:id
  }

  Swal.fire({
    title:"Estas seguro de eliminar esta Nota/Orden?",
    showDenyButton:true,
    showCancelButton:false,
    confirmButtonText:'Confirmar',
    denyButtonText:'Cancelar'
  }).then((result)=>{
    if(result.isConfirmed){
      $.ajax({
        type:"POST",
        url:"controlador/pacienteControlador.php?ctrEliNotaOrden",
        data:obj,
        success:function(data){

          if(data=="ok"){
            location.reload()
          }else{
            Swal.fire({
              icon: 'error',
              showConfirmButton: false,
              title: 'Error',
              text:'La orden no puede ser eliminada',
              timer: 1000
            })
          }
        }
      })
    }
  })
}

/*================
epicrisis
=================*/
function regEpicrisis(){
    var formData=new FormData($("#FRegEpicrisis")[0])


  $.ajax({
    type:"POST",
    url:"controlador/pacienteControlador.php?ctrRegEpicrisis",
    data:formData,
    cache:false,
    contentType:false,
    processData:false,
    success:function(data){
console.log(data)
      /*if(data=="ok"){

        Swal.fire({
          icon: 'success',
          showConfirmButton: false,
          title: 'Registro de Epicrisis',
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
      }*/

    }

  })
}