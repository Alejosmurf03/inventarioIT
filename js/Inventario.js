
function listarActivos(){
    $("#accion").val("ListarActivos");
    $.ajax({
        //llamado al controlador
        url: '../../Controlador/ControllerInventario.php',        
        type: 'post',
        data: $("#accion"),
        dataType:'json',
        success: function (resultado) {
            console.log(resultado);
            material = resultado.datos;
            $.each(material, function (i, materiales) {
                $("#codigo").html(materiales.codigoBarras);
                $("#serial").html(materiales.serial);
                $("#tipoElemento").html(materiales.nombreTipo);
                $("#fechaIngreso").html(materiales.fecha);
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


function listarInactivos(){
    $("#accion").val("ListarInactivos");
    $.ajax({
        //llamado al controlador
        url: '../../Controlador/ControllerInventario.php',        
        type: 'post',
        data: $("#accion"),
        dataType:'json',
        success: function (resultado) {
            console.log(resultado);
            material = resultado.datos;
            $.each(material, function (i, materiales) {
                $("#codigo").html(materiales.codigoBarras);
                $("#serial").html(materiales.serial);
                $("#tipoElemento").html(materiales.nombreTipo);
                $("#fechaDisposal").html(materiales.fechaDisposal);
                $("#observacionDisposal").html(materiales.observacion);
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

//metodo para listar en usuairo los materiales prestados
function listarPrestados(){
    $("#accion").val("ListarPrestados");
    $.ajax({
        //llamado al controlador
        url: '../../Controlador/ControllerInventario.php',        
        type: 'post',
        data: $("#accion"),
        dataType:'json',
        success: function (resultado) {
            console.log(resultado);
            material = resultado.datos;
            $.each(material, function (i, materiales) {
                $("#codigo").html(materiales.codigoBarras);
                $("#serial").html(materiales.serial);
                $("#tipoElemento").html(materiales.nombreTipo);
                $("#fechaPrestamo").html(materiales.fechaPrestamo);
                $("#fechaEntrega").html(materiales.fechaEntrega);
                $("#hPrestado").html(materiales.hPresta);
                $("#observacionPrestamo").html(materiales.observacionPres);
                $("#observacionEntrega").html(materiales.observacionEntre);
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



//metodo para listar en usuairo los materiales prestados
function listarEnviados(){
    $("#accion").val("ListarEnviados");
    $.ajax({
        //llamado al controlador
        url: '../../Controlador/ControllerInventario.php',        
        type: 'post',
        data: $("#accion"),
        dataType:'json',
        success: function (resultado) {
            console.log(resultado);
            material = resultado.datos;
            $.each(material, function (i, materiales) {
                $("#codigo").html(materiales.codigo);
                $("#serial").html(materiales.serial);
                $("#tipoElemento").html(materiales.tipoMaterial);
                $("#caracteristica").html(materiales.caracteristica);
                $("#numeroGuia").html(materiales.numeroGuia);
                $("#gRFS").html(materiales.grfs);
                $("#fechaEnvio").html(materiales.fechaEnvio);
                $("#fechaRecibido").html(materiales.fechaRecibido);
                $("#estado").html(materiales.estadoMaterial);
                $("#baseEnvio").html(materiales.baseEnvia);
                $("#observacionEnvio").html(materiales.observacionEnvio);
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




//metodo para listar en usuairo los materiales que estan en mantenimiento
function listarMantenimiento(){
    $("#accion").val("ListarMantenimiento");
    $.ajax({
        //llamado al controlador
        url: '../../Controlador/ControllerInventario.php',        
        type: 'post',
        data: $("#accion"),
        dataType:'json',
        success: function (resultado) {
            console.log(resultado);
            material = resultado.datos;
            $.each(material, function (i, materiales) {
                $("#codigo").html(materiales.codigo);
                $("#serial").html(materiales.serial);
                $("#tipoElemento").html(materiales.nombreTipo);
                $("#caracte").html(materiales.caracteristica);
                $("#numTicket").html(materiales.ticket);
                $("#fechaIngreso").html(materiales.fechaIng);
                $("#obFallo").html(materiales.obsFallo);
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


//metodo para listar en usuairo los materiales que estan en mantenimiento
function listarEnvioBase(){
    $("#accion").val("ListarEnvioBase");
    $.ajax({
        //llamado al controlador
        url: '../../Controlador/ControllerInventario.php',        
        type: 'post',
        data: $("#accion"),
        dataType:'json',
        success: function (resultado) {
            console.log(resultado);
            material = resultado.datos;
            $.each(material, function (i, materiales) {
                $("#codigo").html(materiales.codigo);
                $("#serial").html(materiales.serial);
                $("#tipoElemento").html(materiales.nombreTipo);
                $("#caracte").html(materiales.caracteristica);
                $("#grfs").html(materiales.grfs);
                $("#numeroGuia").html(materiales.numeroGuia);
                $("#fechaEnvio").html(materiales.fechaEnvio);
                $("#observacionEnvio").html(materiales.observacionEnvio);
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

//metodo para listar toda la informacion de cantidad y demas para los admin
function listarTodos(){
    $("#accion").val("ListarTodos");
    $.ajax({
        //llamado al controlador
        url: '../../Controlador/ControllerInventario.php',        
        type: 'post',
        data: $("#accion"),
        dataType:'json',
        success: function (resultado) {
            console.log(resultado);
            material = resultado.datos;
            $.each(material, function (i, materiales) {
                $("#tipo").html(materiales.nombre);
                $("#base").html(materiales.nombreBase);
                $("#estado").html(materiales.estado);
                $("#cantidad").html(materiales.cantidadTipo);
                var imagen = "<a href='modificarMaterial.php?idBase="+materiales.idBase+"&idTipo="+materiales.idTipo+"&estado="+materiales.estado+"'><img src='../img/lupa.png'></a>";
                $("#revisar").html(imagen);
                $("#tabla1 tbody").append($("#fila")  .clone(true));
            });
            $("#tabla1 tbody tr").first().remove();    
            $("#tabla1");
        },
        error: function(ex){
          console.log(ex.responseText);
        }
    });
}


function listarPorBase(){
   var parametros ={
      "accion" : "ListarPorBase",
      "bases": $('#txtBase').val()
    
  };
    $.ajax({
        //llamado al controlador
        url: '../../Controlador/ControllerInventario.php',        
        type: 'post',
        data: parametros,
        dataType:'json',
        success: function (resultado) {
            console.log(resultado);
            material = resultado.datos;
                $.each(material, function (i, materiales) {
                    $("#tipo").html(materiales.nombre);
                    $("#estado").html(materiales.estado);
                    $("#cantidad").html(materiales.cantidadTipo);
                     var imagen = "<a href='modificarMaterial.php?idBase="+materiales.idBase+"&idTipo="+materiales.idTipo+"&estado="+materiales.estado+"'><img src='../img/lupa.png'></a>";
                    $("#revisar").html(imagen);
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

//lista especifica de la informacion d eun material
function listaEspecifica(){   
   const params = new URLSearchParams(location.search);
   var parametros ={
      "accion" : "ListarEspecifica",
      "idTipo": params.get("idTipo"),
      "idBase": params.get("idBase"),
      "estado": params.get("estado")
  };
    $.ajax({
        //llamado al controlador
        url: '../../Controlador/ControllerInventario.php',        
        type: 'post',
        data: parametros,
        dataType:'json',
        success: function (resultado) {
            console.log(resultado);
            material = resultado.datos;
                $.each(material, function (i, materiales) {
                    $("#codigo").html(materiales.codigoBarras);
                    $("#tipo").html(materiales.nombreTipo);
                    $("#serial").html(materiales.serialEquipo);
                    $("#costo").html(materiales.costo);
                    $("#caracteris").html(materiales.caracteristi);
                     var imagen = "<a href='../../Vista/administrador/actualizarMaterial.php?idMaterial="+materiales.idMaterial+"'><img src='../img/editar.png'></a>";
                    $("#revisar").html(imagen);
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


//metodo para listar los materiales que han sido entregados a un usuario
function listarMaterialesEntregados(){
    $("#accion").val("ListarEntregados");
    $.ajax({
        //llamado al controlador
        url: '../../Controlador/ControllerInventario.php',        
        type: 'post',
        data: $("#accion"),
        dataType:'json',
        success: function (resultado) {
            console.log(resultado);
            material = resultado.datos;
            $.each(material, function (i, materiales) {
                $("#codigo").html(materiales.codigoBarras);
                $("#serial").html(materiales.serial);
                $("#TipoElemento").html(materiales.tipoMaterial);
                $("#gRFS").html(materiales.grfsMaterial);
                $("#fechaEntrega").html(materiales.fechaEntrega);
                $("#hUsuarioRecibe").html(materiales.hUsuarioEntre);
                $("#observacionEntrega").html(materiales.observacionEntre);
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