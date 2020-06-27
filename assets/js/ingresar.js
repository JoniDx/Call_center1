function enviarDatos(){
	var user, pass, tipoGuardar;
	      user = document.getElementById('user').value;
	      pass = document.getElementById('pass').value;
				// user1 = document.getElementById('user1').value;

				tipoGuardar = "Login";
	      if(user != '' && pass != ''){

				var datos = 'user=' + user + '&pass=' + pass + '&TipoGuardar=' + tipoGuardar;

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
					if(data = 1){

						parent.location.href='?mwc=home';

					}
				}else{
					swal({
					title: "Su cuenta no a sido verificada o ingreso mal sus datos",
					type: "error",
					showCancelButton: true,
					confirmButtonColor: '#DD6B55',
					confirmButtonText: 'Aceptar',
				},
				);

					// alert("No se puede ingresar, revise sus datos");
				}
			})
			.error(function(data) {
				alert("No se puede ingresar, code: Ix000001");
			});

	      } else {
					alert("Revise sus datos");
	      }
}

function Recuperar(){
	var email, tipoGuardar;
	email = document.getElementById('email').value;

	tipoGuardar = "Recuperar";

	if(email != '' ){

	var datos = 'email=' + email + '&TipoGuardar=' + tipoGuardar;
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
	if(data = 1){
		swal("Exito","Revise su correo", "success");
	}
	}else{
	swal({
	title: "Verifique su correo",
	type: "error",
	showCancelButton: true,
	confirmButtonColor: '#DD6B55',
	confirmButtonText: 'Aceptar',
},
);

	// alert("No se puede ingresar, revise sus datos");
}
})
.error(function(data) {
swal("ERROR","No se pudo actualizar, code: Ix000001", "error");
});

} else {
	swal("ERROR","No se pudo actualizar o no esta registrado", "error");
}

}

function Restablecer(){
	var  code,pass1, pass2;
	code = document.getElementById('txtCode').value;
	pass1 = document.getElementById('txtPass1').value;
	pass2 = document.getElementById('txtPass2').value;

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

	  var tipoGuardar = "AgregarP2";
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
	        var datos = 'txtPass1='+ pass1 +'&txtPass2='+ pass2 + '&txtCode='+ code +'&TipoGuardar=' + tipoGuardar ;
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
							location.href ="?mwc=index";
	          }else{
	            swal("Error", "Hubo un error en el cambio intente de nuevo", "error");
	          }
	        })
	        .error(function(data) {
	          swal("Error", "No se puede guardar, code: Ix000001", "error");
	        });
	      }
	    });




}
