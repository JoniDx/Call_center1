function validarArchivoCo(obj, nombre){
    var uploadFile = obj.files[0];
    if (!window.FileReader) {
     swal("Error", "El navegador no soporta la lectura de archivos", "error");
        return;
    }

    if (!(/\.(jpg|png|jpeg|pdf|docx|pptx|xlsx|txt)$/i).test(uploadFile.name)) {
     swal("Error", "Porfavor, cargue solamente archivo .jpg .jpeg .png .pdf .docx .pptx .xlsx .txt ", "error");
        document.getElementById(nombre).value='';
        document.getElementById(nombre).focus();
    }
    else {
        var img = new Image();
        if (uploadFile.size > 10000000)
        {
         swal("Error", "El peso del archivo debe ser menos a 10 MB", "error");
            document.getElementById(nombre).value='';
            document.getElementById(nombre).focus();
        }
        else {
            // alert('Imagen correcta :)')
        }
        // };
        img.src = URL.createObjectURL(uploadFile);
    }
}

function AddTicket(){
  var  Nombre,Email,Asunto,Telefono,Servicio,Descripcion,Id,tipoGuardar;

  Nombre = document.getElementById('txtNombre').value;
  Email = document.getElementById('txtEmail').value;
  Asunto = document.getElementById('txtAsunto').value;
  Telefono = document.getElementById('txtTelefono').value;
  Servicio = document.getElementById('txtServicio').value;
  Descripcion = document.getElementById('txtDescripcion').value;
  Id = document.getElementById('id').value;
  Descripcion = Descripcion.replace(/\r?\n/g, " ");

  if (Id == ''||Id == ' ') {
    swal("Error", "Porfavor inicie sesión", "error");
    document.getElementById("txtNombre").focus();
    return 0;
  }
  if (Nombre == ''||Nombre == ' ') {
    swal("Error", "Porfavor inicie sesión", "error");
    document.getElementById("txtNombre").focus();
    return 0;
  }
  if (Email == ''||Email == ' ') {
    swal("Error", "Porfavor inicie sesión", "error");
    document.getElementById("txtEmail").focus();
    return 0;
  }
  if (Asunto == ''|| Asunto == ' ') {
    swal("Error", "Porfavor inserte asunto", "error");
    document.getElementById("txtAsunto").focus();
    return 0;
  }
  if (Telefono == ''||Telefono == ' ') {
    swal("Error", "Porfavor inicie sesión", "error");
    document.getElementById("txtTelefono").focus();
    return 0;
  }
  if (Servicio == '') {
    swal("Error", "Porfavor inserte un servicio", "error");
    document.getElementById("txtServicio").focus();
    return 0;
  }
  if (Descripcion == '' || Descripcion == ' ' || Descripcion == '  ') {
    swal("Error", "Porfavor inserte una descripcion", "error");
    document.getElementById("txtDescripcion").focus();
    return 0;
  }

  var tipoGuardar = "AgregarT";
      swal({
      title: "\u00BFSus datos son correctos?",
      type: "info",
      showCancelButton: true,
      confirmButtonColor: '#DD6B55',
      confirmButtonText: 'Aceptar',
      cancelButtonText: "Cancelar",
    },
    function (isConfirm) {
      if (isConfirm) {
        var datos = 'txtNombre=' + Nombre + '&txtEmail='+ Email + '&txtAsunto=' + Asunto +'&txtTelefono='+ Telefono + '&txtServicio=' + Servicio + '&txtDescripcion=' + Descripcion + '&TipoGuardar=' + tipoGuardar ;
      alert(datos);
        $.ajax({
          type:"POST",
          url:"view/ajax/insertar.php",
          data:datos,
          success:function(data){
           alert(data);
          }
        })

        .done(function(data) {
          if(data != 0){
           swal({
          title: "Le enviamos la informaci\u00F3n, de su ticket",
          type: "success",
          showCancelButton: true,
          confirmButtonColor: '#DD6B55',
          confirmButtonText: 'Aceptar',
        },
        function(isConfirm){
          if(isConfirm){
            document.frmI.MovI.value='GuardarI';document.frmI.submit();

          }
        });
          }else{
            swal("Error", "No se pueden enviar sus datos", "error");

          }
        })
        .error(function(data) {
          swal("Error", "No se puede guardar, code: Ix000001", "error");
        });
      }
    });
}

function AsignarTicket(){
  var Prioridad, Nivel, Encargado,IdTicket,tipoGuardar;
  IdTicket = document.getElementById('IdTicket').value;
  Prioridad = document.getElementById('txtPrioridad').value;
  Nivel = document.getElementById('txtNivel').value;
  Encargado = "";

  if (Encargado == ''||Encargado == ' ') {
    Encargado = document.getElementById('txtAdmin').value;
  }

  if (Prioridad == ''||Prioridad == ' ') {
    swal("Error", "Porfavor seleccione una prioridad", "error");
    document.getElementById("txtPrioridad").focus();
    return 0;
  }

  if (Nivel == ''||Nivel == ' ') {
    swal("Error", "Porfavor seleccione un nivel", "error");
    document.getElementById("txtNivel").focus();
    return 0;
  }

  if (Encargado == ''||Encargado == ' ') {
    swal("Error", "Porfavor seleccione un encargado", "error");
    document.getElementById("txtEncargado").focus();
    return 0;
  }

  var tipoGuardar = "AsignarT";
      swal({
      title: " \u00BFSus datos son correctos?",
      type: "info",
      showCancelButton: true,
      confirmButtonColor: '#DD6B55',
      confirmButtonText: 'Aceptar',
      cancelButtonText: "Cancelar",
    },
    function (isConfirm) {
      if (isConfirm) {
        var datos = 'txtIdTicket='+IdTicket+'&txtPrioridad=' + Prioridad + '&txtNivel=' + Nivel + '&txtEncargado='+ Encargado +'&TipoGuardar=' + tipoGuardar ;
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
            swal("Enviado", "Ticket asignado ", "success");
            location.reload();

          }else{
            swal("Error", "No se puede guardar intente otra vez", "error");

          }
        })
        .error(function(data) {
          swal("Error", "No se puede guardar, code: Ix000001", "error");
        });
      }
    });

}

function Seguimiento(){
  var Seguimiento;
  Seguimiento = document.getElementById('txtSegimiento').value;

  if (Seguimiento == ''||Seguimiento == ' ') {
    swal("Error", "Porfavor inserte un código válido", "error");
    document.getElementById("txtSegimiento").focus();
    return 0;
  }
  var tipoGuardar = "Seguimiento";
  var datos = 'txtSeguimiento=' + Seguimiento +'&TipoGuardar=' + tipoGuardar   ;
 //alert(datos);
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
      location.href ="?mwc=respuesta&Id=".concat(Seguimiento);
    }else{
      swal("Error", "Porfavor incerte un codigo valido ", "error");

    }
  })
  .error(function(data) {
    swal("Error", "Porfavor incerte un codigo valido, code: Ix000001", "error");
  });



}
