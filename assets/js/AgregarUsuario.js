function AddUsuario(){
  var user, apellidop, apellidom, pass, pass1, email, sexo, telefono, direccion, cp, estado, ciudad, tipoGuardar;
  user = document.getElementById('txtUsuario').value;
  apellidop = document.getElementById('txtApellidop').value;
  apellidom = document.getElementById('txtApellidom').value;
  pass = document.getElementById('txtPass').value;
  pass1 = document.getElementById('txtPass1').value;
  email = document.getElementById('txtEmail').value;
  sexo = document.getElementById('txtSexo').value;
  telefono = document.getElementById('txtTelefono').value;
  direccion = document.getElementById('txtDireccion').value;
  cp = document.getElementById('txtCP').value;
  estado = document.getElementById('txtEstado').value;
  ciudad = document.getElementById('txtCiudad').value;



  if (user == ''||user == ' ') {
    swal("Error", "Porfavor inserte nombre", "error");
    document.getElementById("txtUsuario").focus();
    return 0;
  }
  if (apellidop == ''||apellidop == ' ') {
    swal("Error", "Porfavor inserte apellido paterno", "error");
    document.getElementById("txtApellidop").focus();
    return 0;
  }
  if (apellidom == ''||apellidom == ' ') {
    swal("Error", "Porfavor inserte apellido materno", "error");
    document.getElementById("txtApellidom").focus();
    return 0;
  }
  if (pass == ''||pass == ' '||pass.length < 8) {
    swal("Error", "Porfavor inserte contraseña ", "error");
    document.getElementById("txtPass").focus();
    return 0;
  }
  if (pass1 == ''||pass1 == ' ') {
    swal("Error", "Porfavor inserte contraseña", "error");
    document.getElementById("txtPass1").focus();
    return 0;
  }
  if (email == ''||email == ' ') {
    swal("Error", "Porfavor inserte email", "error");
    document.getElementById("txtEmail").focus();
    return 0;
  }
  if (sexo == ''||sexo == ' ') {
    swal("Error", "Porfavor inserte sexo", "error");
    document.getElementById("txtSexo").focus();
    return 0;
  }
  if (direccion == ''||direccion == ' ') {
    swal("Error", "Porfavor inserte su direccion", "error");
    document.getElementById("txtSexo").focus();
    return 0;
  }
  if (cp == ''||cp == ' ') {
    swal("Error", "Porfavor inserte su codigo postal", "error");
    document.getElementById("txtSexo").focus();
    return 0;
  }
  if (estado == ''||estado == ' ') {
    swal("Error", "Porfavor inserte un estado", "error");
    document.getElementById("txtSexo").focus();
    return 0;
  }
  if (ciudad == ''||ciudad == ' ') {
    swal("Error", "Porfavor inserte una ciudad", "error");
    document.getElementById("txtSexo").focus();
    return 0;
  }


  if (telefono == ''||telefono == ' '||telefono.length < 10) {
    swal("Error", "Porfavor inserte telefono", "error");
    document.getElementById("txtTelefono").focus();
    return 0;
  }

  if (pass1 != pass) {
    swal("Error", "Las Contraseñas no coinsiden", "error");
    document.getElementById("txtPass1").focus();
    return 0;
  }

  if ( email.indexOf("@gmail.com") == -1 && email.indexOf("@live.com") == -1 && email.indexOf("@outlook.com") == -1 && email.indexOf("@hotmail.com") == -1) {
    swal("Error", "Porfavor inserte email valido", "error");
    document.getElementById("txtEmail").focus();
    return 0;
  }

var tipoGuardar = "AgregarU";
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
      var datos = 'txtUsuario=' + user + '&txtApellidop=' + apellidop + '&txtApellidom='+ apellidom + '&txtPass=' + pass +'&txtPass1='+ pass1 + '&txtEmail='+ email + '&txtSexo=' +sexo+'&txtTelefono='+telefono + '&txtDireccion='+direccion+'&txtCP='+cp+'&txtEstado='+estado+'&txtCiudad='+ciudad+'&TipoGuardar=' + tipoGuardar ;
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
          swal({
          title: "Verifica tu correo",
          type: "success",
          showCancelButton: true,
          confirmButtonColor: '#DD6B55',
          confirmButtonText: 'Aceptar',
        },
        function(isConfirm){
          if(isConfirm){
            location.href ="?mwc=index";
          }
        });


        }else{
          swal("Error", "Correo ya registrado", "error");

        }
      })
      .error(function(data) {
        swal("Error", "No se puede guardar, code: Ix000001", "error");
      });
    }
  });
}

function Clocesecion(){
  $.ajax({
    type:"POST",
    url:"view/ajax/close.php",
    data:datos,
    success:function(data){
      // //alert()data);
    }
  })
}

function EditU(){
  var email, sexo, telefono, direccion, cp, estado, ciudad, empreza, telefonoe, puesto, tipoGuardar;

  email = document.getElementById('txtEmail').value;
  telefono = document.getElementById('txtTelefono').value;
  direccion = document.getElementById('txtDireccion').value;
  cp = document.getElementById('txtCP').value;
  estado = document.getElementById('txtEstado').value;
  ciudad = document.getElementById('txtCiudad').value;
  empreza = document.getElementById('txtEmpreza').value;
  telefonoe = document.getElementById('txtTelefonoE').value;
  puesto = document.getElementById('txtPuesto').value;


  if (email == ''||email == ' ') {
    swal("Error", "Porfavor inserte email", "error");
    document.getElementById("txtEmail").focus();
    return 0;
  }

  if (direccion == ''||direccion == ' ') {
    swal("Error", "Porfavor inserte su direccion", "error");
    document.getElementById("txtDireccion").focus();
    return 0;
  }
  if (cp == ''||cp == ' ') {
    swal("Error", "Porfavor inserte su codigo postal", "error");
    document.getElementById("txtCP").focus();
    return 0;
  }
  if (estado == ''||estado == ' ') {
    swal("Error", "Porfavor inserte un estado", "error");
    document.getElementById("txtEstado").focus();
    return 0;
  }
  if (ciudad == ''||ciudad == ' ') {
    swal("Error", "Porfavor inserte una ciudad", "error");
    document.getElementById("txtCiudad").focus();
    return 0;
  }


  if (telefono == ''||telefono == ' '||telefono.length < 10) {
    swal("Error", "Porfavor inserte telefono", "error");
    document.getElementById("txtTelefono").focus();
    return 0;
  }


  if ( email.indexOf("@gmail.com") == -1 && email.indexOf("@live.com") == -1 && email.indexOf("@outlook.com") == -1 && email.indexOf("@hotmail.com") == -1) {
    swal("Error", "Porfavor inserte email valido", "error");
    document.getElementById("txtEmail").focus();
    return 0;
  }

var tipoGuardar = "AgregarE";
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
      var datos = 'txtEmail='+ email +'&txtTelefono='+telefono + '&txtDireccion='+direccion+'&txtCP='+cp+'&txtEstado='+estado+'&txtCiudad='+ciudad+'&txtEmpreza='+empreza+'&txtTelefonoE='+telefonoe+'&txtPuesto='+puesto+'&TipoGuardar=' + tipoGuardar ;
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
          swal("Guardado", "Registrado correctamennte", "success");
          location.reload();

        }else{
          swal("Error", "No se pueden insertar sus datos o el correo ya esta registro con otro Usuario", "error");
        }
      })
      .error(function(data) {
        swal("Error", "No se puede guardar, code: Ix000001", "error");
      });
    }
  });
}

function hideA(){
  document.getElementById('WindowB').style.display = 'block';
  document.getElementById('WindowA').style.display = 'none';
}

function hideB(){
  document.getElementById('WindowA').style.display = 'block';
  document.getElementById('WindowB').style.display = 'none';
}

function EditarP(){
  var  passA, pass1, pass2;
  passA = document.getElementById('txtPassA').value;
  pass1 = document.getElementById('txtPass1').value;
  pass2 = document.getElementById('txtPass2').value;

  if (passA == ''||passA.length < 8) {
    swal("Error", "Porfavor inserte contraseña", "error");
    document.getElementById("txtPassA").focus();
    return 0;
  }
  if (pass1 == ''||pass1.length < 8) {
    swal("Error", "Porfavor inserte contraseña ", "error");
    document.getElementById("txtPass1").focus();
    return 0;
  }
  if (pass2 == ''||pass2.length < 8) {
    swal("Error", "Porfavor inserte contraseña", "error");
    document.getElementById("txtPass2").focus();
    return 0;
  }
  if (pass1 != pass2) {
    swal("Error", "Las contraseñas no coinsiden", "error");
    document.getElementById("txtPass1").focus();
    return 0;
  }

  var tipoGuardar = "AgregarP";
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
        var datos = 'txtPassA='+ passA + '&txtPass1='+ pass1 +'&txtPass2='+ pass2 +'&TipoGuardar=' + tipoGuardar ;
       // //alert()datos);
        $.ajax({
          type:"POST",
          url:"view/ajax/insertar.php",
          data:datos,
          success:function(data){
            // //alert()data);
          }
        })
        .done(function(data) {
          if(data != 0){
            swal("Guardado", "Se acualizo correctamennte", "success");
            window.location.href('?mwc=home');
          }else{
            swal("Error", "Hubo un error en el Cambio intente de nuevo", "error");
          }
        })
        .error(function(data) {
          swal("Error", "No se puede guardar, code: Ix000001", "error");
        });
      }
    });




}

function AcutualizarUsuario(){
  var nombre, apaterno, amaterno, email, telefono, sexo, permiso, idmiembro, nivel, prioridad;
  nombre = document.getElementById('txtNombre').value;
  apaterno = document.getElementById('txtAPaterno').value;
  amaterno = document.getElementById('txtAMaterno').value;
  email = document.getElementById('txtEmail').value;
  telefono = document.getElementById('txtTelefono').value;
  sexo = document.getElementById('txtSexo').value;
  permiso = document.getElementById("txtPermiso").value;
  idmiembro = document.getElementById("IdMiembro").value;
  nivel = document.getElementById("txtNivel").value;
  prioridad = document.getElementById("txtNivel").value;


  if(nombre == ''||nombre == ' '){
    swal("Error", "Porfavor modifique su nombre su nombre", "error");
    document.getElementById("txtNombre").focus();
    return 0;
  }
  if(apaterno == ''||apaterno == ' '){
      swal("Error", "Porfavor modifique su apellido paterno", "error");
      document.getElementById("txtAPaterno").focus();
      return 0;
  }
  if(amaterno == ''||amaterno == ' '){
      swal("Error", "Porfavor modifique su apellido materno", "error");
      document.getElementById("txtAMaterno").focus();
      return 0;
  }
   if(email == ''||email == ' '){
      swal("Error", "Porfavor modifique su correo", "error");
      document.getElementById("txtEmail").focus();
      return 0;
  }
   if(telefono == ''||telefono == ' '||telefono.length < 10){
      swal("Error", "Porfavor modifique su número de teléfono", "error");
      document.getElementById("txtTelefono").focus();
      return 0;
  }
   if(sexo == ''||sexo == ' '){
      swal("Error", "Porfavor modifique su sexo", "error");
      document.getElementById("txtSexo").focus();
      return 0;
  }

  if(permiso == ''||permiso == ' ' || permiso > '3' || permiso < '0'){
     swal("Error", "Porfavor modifique su permiso", "error");
     document.getElementById("txtPermiso").focus();
     return 0;
 }

 if((nivel == ''||nivel == ' ') && permiso == '2' ){
    swal("Error", "Porfavor modifique su nivel", "error");
    document.getElementById("txtNivel").focus();
    return 0;
}


  if ( email.indexOf("@gmail.com") == -1 && email.indexOf("@live.com") == -1 && email.indexOf("@outlook.com") == -1 && email.indexOf("@hotmail.com") == -1) {
    swal("Error", "Porfavor inserte email valido", "error");
    document.getElementById("txtEmail").focus();
    return 0;
  }

  var tipoGuardar = "ActualizarM";
    swal({
    title: "\u00BFLos datos son correctos?",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: '#DD6B55',
    confirmButtonText: 'Aceptar',
    cancelButtonText: "Cancelar",
  },
  function (isConfirm) {
    if (isConfirm) {


      var datos = 'txtNombre=' + nombre + '&txtAPaterno=' + apaterno + '&IdMiembro=' + idmiembro + '&txtAMaterno=' + amaterno + '&txtEmail=' + email + '&txtTelefono=' + telefono + '&txtSexo=' + sexo + '&txtPermiso=' + permiso + '&txtNivel='+ nivel + '&TipoGuardar=' + tipoGuardar;
      //alert()datos);

      $.ajax({
        type:"POST",
        url:"view/ajax/insertar.php",
        data:datos,
        success:function(data){
         //alert()data);
        }
      })
      .done(function(data) {
        if(data != 0){
          var str = data;
          location.reload();
        }else{
          swal("Error", "No se pueden actualizar sus datos", "error");

        }
      })
      .error(function(data) {
        swal("Error", "No se puede guardar, code: Ix000001", "error");
      });
    }
  });

}

function date(){
  var id = document.getElementById('txtDate').value;
  var date = '?mwc=lstticketG&Id='.concat(id).concat("&Est=1");
  parent.location.href=date;
}

function dateA(){
  var id = document.getElementById('txtDate').value;
  var date = '?mwc=lstticketA&Id='.concat(id).concat("&Est=1");
  parent.location.href=date;
}
