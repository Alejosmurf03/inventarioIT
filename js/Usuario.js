
function Agregar(){
    $("#accion").val("Agregar");
   $.ajax({
       url: '../../Controlador/ControllerUsuario.php',
       data: $("#frmUsuario").serialize(),
       dataType:'json',
       type: 'post',
       success: function (resultado) {
           console.log(resultado);
           if(resultado.estado){
               alert("Usuario Agregado correctamente.");
               $("#txtH").val("");
               $("#txtPassword").val("");
               $("#txtNombre").val("");
               $("#cbRol").val("");
               $("#cbBases").val("");
           }else{
               $("mensaje").html("problemas al agregar");
           }
       }
   }); 
}

//metodo para listar en el campo base
function listarBase(){
$(document).ready(function (){
$.ajax({
  type: 'post',
  url: '../../Controlador/ControllerUsuario.php',
  dataType: 'json',
  data: 'accion=listaBase',
  success: function(response){        
    response.forEach(function(variable, valor){
      console.log(response);
      var opcion = document.createElement("option");
      opcion.value = variable.ID_base;
      opcion.text =variable.nombre;
      $("#cbBases").append(opcion);
    });
  },
  error: function(ex){
    console.log(ex);
  }
});
});
}

//metodo para listar en el campo rol
function listarRol(){
    $(document).ready(function (){
    $.ajax({
      type: 'post',
      url: '../../Controlador/ControllerUsuario.php',
      dataType: 'json',
      data: 'accion=listaRol',
      success: function(response){        
        response.forEach(function(variable2, valor){
          console.log(response);
          var opcion = document.createElement("option");
          opcion.value = variable2.ID_rol;
          opcion.text =variable2.nombre;
          $("#cbRol").append(opcion);
        });
      },
      error: function(ex){
        console.log(ex);
      }
    });
    });
    }

//metodo para listar todos los usuarios al admin, excepto el mismo
function listar(){
    $("#accion").val("Listar");
    $.ajax({
        //llamado al controlador
        url: '../../Controlador/ControllerUsuario.php',        
        type: 'post',
        data: $("#accion"),
        dataType:'json',
        success: function (resultado) {
            console.log(resultado);
            usuario = resultado.datos;
            $.each(usuario, function (i, usuarios) {
                $("#hUsuarios").html(usuarios.Husuario);
                $("#nombreUsuario").html(usuarios.nombreUsuario);
                $("#rolUsuario").html(usuarios.rolusuario);
                $("#baseUsuario").html(usuarios.baseUsuario);
                $("#botones").html("<a href='ActualizarUsuario.php?idUsuario="+usuarios.idUsuario+"'><button type='button' class='btn btn-info''>Actualizar</button></a>  <button type='button' class='btn btn-danger' onclick='deshabilitarUsuario("+usuarios.idUsuario+")'>Deshabilitar</button>");                
                $("#tabla1 tbody").append($("#fila").clone(true));
            });
            $("#tabla1 tbody tr").first().remove();    
            $("#tabla1");
        },
        error: function(ex){
          console.log(ex.responseText);
        }
    });
}



//metodo para obtener el usuario
function obtenerUsuario(){
  const params = new URLSearchParams(location.search);
  var data = {
    "accion" : "ObtenerUsuario",  
    "idUsuario" : params.get("idUsuario")
  };
  $.ajax({
      //llamado al controlador
      url: '../../Controlador/ControllerUsuario.php',        
      type: 'post',
      data: data,
      dataType:'json',
      success: function (resultado) {
          usuario = resultado.datos[0];
          console.log(usuario);   
          if(resultado.estado) {           
              $("#txtNombres").val(usuario.nombreUsuario);            
              $("#cbRol").val(usuario.idRol);
              $("#cbBases").val(usuario.idBase);
          }
      },
      error: function(ex){
        console.log(ex.responseText);
      }
  });
}

//deshabilitar usuario
function deshabilitarUsuario(idUsuario){

  var data = {
    "accion" : "Inactivar",
    "idUsuario" : idUsuario
  };

 $.ajax({
    url: '../../Controlador/ControllerUsuario.php',
     data: data,
     dataType:'json',
     type: 'post',
     success: function (resultado) {
         console.log(resultado);
         if(resultado.estado){
           alert("Se deshabilito la persona.");
           location.href ="../../Vista/administrador/ListaUsuarios.php";
        
         }else{
             $("mensaje").html("problemas al agregar");
         }
     }
 }); 
}

//metodo papara comprobar que sea la clave antigua de la persona que la quiere cambiar
$(function () {
    $("#txtClaveanterio").change(function (){
    
        var parametros = {
            "accion" : "ObtenerClave",           
            "hUsuario": $('#hDelUsuario').html(),
            "clave": $('#txtClaveanterio').val()
        };
        $.ajax({           
            url: '../../Controlador/ControllerUsuario.php',
            data: parametros,
            dataType: 'json',
            type: 'post',
            success: function (resultado) {
                console.log(resultado);              
                usuario = resultado.datos[0];
                if (usuario) {                  
                    $("#lblClave").html("");
                } else {
                    $("#txtClaveanterio").val("");
                    $("#lblClave").html("Esa no es tu clave. Vuelve a ingresarla.");
                }
            },
            error: function (result) {
                console.log(result);
            }

        });
    });
 });
    
 

//metodo para que el admin pueda cambiar el nombre, rol y base de un usuario
function ActualizarUsuario(){
    const params = new URLSearchParams(location.search);
    var parametros ={
      "accion" : "Actualizar",
      "nombre": $("#txtNombres").val(),
      "idBase": $("#cbBases").val(),
      "idRol": $("#cbRol").val(),
      "idUsuario" : params.get("idUsuario")
    };
 $.ajax({
     
     url: '../../Controlador/ControllerUsuario.php',
     data: parametros,
     dataType:'json',
     type: 'post',
     success: function (resultado) {
         console.log(resultado);
         if(resultado.estado){
            alert("usuario actualizado.");
            location.reload();

            
         }else{
             $("mensaje").html("problemas al actualizar");
         }
     }
    });
};

//metodo para actualizar la clave 
$(function(){
  $("#ActualizarClave").click(function(){
    var parametros={
        "accion" : "ActualizarClave",
        "clave": $("#txtClavenueva").val(),
        "hUsuario": $("#hDelUsuario").html()
        
    };
       $.ajax({          
            url: '../../Controlador/ControllerUsuario.php',
           data: parametros,
           dataType:'json',
           type: 'post',
           success: function (resultado) {
               console.log(resultado);
               if(resultado.estado){
                   alert("Clave actualizada");
                   $("#txtClaveanterio").val("");
                   $("#txtClavenueva").val("");
               }else{
                   $("mensaje").html("problemas al actualizar");
               }
           }
       }); 
    });
});


//metodo para validar que no se repita el usuario cuando lo registren
$(function () {
    $("#txtH").change(function () {
        var parametros = {
            "accion": "existeUsuario",
            "hUsuario": $('#txtH').val()
        };
        $.ajax({
            //llamado al controlador           
            url: '../../Controlador/ControllerUsuario.php',
            type: 'post',
            data: parametros,
            dataType: 'json',
            success: function (resultado) {
                console.log(resultado);
                usuario = resultado.datos[0];
                if (usuario) {                    
                    $("#txtH").val("");
                    $("#lblH").html("Esta persona ya se encuentra registrada.");
                   
                } else {
                     $("#lblH").html("");
                }
               
            },
            error: function (ex) {
                console.log(ex.responseText);
            }
        });
    });
});



