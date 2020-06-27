function Respuesta(){
  var respuesta,idTicket, tipoGuardar;
  respuesta = document.getElementById('txtDescripcion').value;
  idTicket = document.getElementById('txtIdTicket').value;
  respuesta = respuesta.replace(/\r?\n/g, " ");


  if (respuesta == ''||respuesta == ' '||respuesta == '   ') {
    swal("Error", "Porfavor inserte un comentario", "error");
    document.getElementById("txtDescripcion").focus();
    return 0;
  }

  var tipoGuardar = "Respuesta";
      swal({
      title: "\u00BFSeguro que quiere enviar este mensaje?",
      type: "info",
      showCancelButton: true,
      confirmButtonColor: '#DD6B55',
      confirmButtonText: 'Aceptar',
      cancelButtonText: "Cancelar",
    },
  function (isConfirm) {
    if (isConfirm) {
      var datos = 'txtRespuesta=' + respuesta+ '&IdTicket='+ idTicket+ '&TipoGuardar=' + tipoGuardar ;
      // alert(datos);
      $.ajax({
        type:"POST",
        url:"view/ajax/insertar.php",
        data:datos,
        success:function(data){
          // alert(data);
        }
      })

      .done(function(data) {
        if(data != 0){
          swal({
          title: "Has mensaje enviado",
          type: "success",
          showCancelButton: true,
          confirmButtonColor: '#DD6B55',
          confirmButtonText: 'Aceptar',
        },
        function(isConfirm){
          if(isConfirm){
            location.href ="?mwc=respuesta&Id=".concat(idTicket);
            document.frmA.MovA.value='GuardarA';document.frmA.submit();
          }
        });
        }else{
          location.href ="?mwc=respuesta&Id=".concat(idTicket);

        }
      })
      .error(function(data) {
        swal("Error", "No se puede guardar, code: Ix000001", "error");
      });
    }
  });
}

function Cerrar(){
  var idTicket,permiso, tipoGuardar;
  permiso = document.getElementById('txtPermiso').value;

  idTicket = document.getElementById('txtIdTicket').value;

  var tipoGuardar = "Cerrar";
      swal({
      title: "\u00BFSeguro que quiere cerrar este ticket?",
      type: "info",
      showCancelButton: true,
      confirmButtonColor: '#DD6B55',
      confirmButtonText: 'Aceptar',
      cancelButtonText: "Cancelar",
    },
  function (isConfirm) {
    if (isConfirm) {
      var datos = 'IdTicket='+ idTicket+ '&TipoGuardar=' + tipoGuardar ;
      // alert(datos);
      $.ajax({
        type:"POST",
        url:"view/ajax/insertar.php",
        data:datos,
        success:function(data){
          // alert(data);
          if (permiso==2) {
            location.href ="?mwc=lstticketA&Id=1";
          }else {
            location.href ="?mwc=lstticketG&Id=1";
          }
        }
      })

      .done(function(data) {
        if(data != 0){
          swal({
          title: "Se a cerrado",
          type: "success",
          showCancelButton: true,
          confirmButtonColor: '#DD6B55',
          confirmButtonText: 'Aceptar',
        },
        function(isConfirm){
          if(isConfirm){
            if (permiso==2) {
              location.href ="?mwc=lstticketA&Id=1";
              document.frmA.MovA.value='GuardarA';document.frmA.submit();

            }else {
              location.href ="?mwc=lstticketG&Id=1";
            }
          }
        });
        }else{
          location.reload();
        }
      })
      .error(function(data) {
        swal("Error", "No se puede guardar, code: Ix000001", "error");
      });
    }
  });
}
