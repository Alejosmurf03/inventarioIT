$(function () {
    //se carga el autocompleta 
    $("#txtTipo").autocomplete({
        source: '../../busquedas/material.php',
        select: function (event, ui) {
            $("#txtIdTipo").val(ui.item.id);
            $("#txtTipo").val(ui.item.value);
        }
    });
});
function Agregar() {
    $("#accion").val("Agregar");
    $("#txtIdTipo").val();
    $.ajax({
        url: '../../Controlador/ControllerMaterial.php',
        data: $("#frmMaterial").serialize(),
        dataType: 'json',
        type: 'post',
        success: function (resultado) {
            console.log(resultado);
            if (resultado.estado) {
                alert("Material Agregado correctamente");
                 location.reload();
                
            } else {
                $("mensaje").html("problemas al agregar");
            }
        }
    });
}

//metodo para listar en el campo base
function listarBase() {
    $(document).ready(function () {
        $.ajax({
            type: 'post',
            url: '../../Controlador/ControllerMaterial.php',
            dataType: 'json',
            data: 'accion=listaBase',
            success: function (response) {
                response.forEach(function (variable, valor) {
                    console.log(response);
                    var opcion = document.createElement("option");
                    opcion.value = variable.ID_base;
                    opcion.text = variable.nombre;
                    $("#cbBases").append(opcion);
                });
            },
            error: function (ex) {
                console.log(ex);
            }
        });
    });
}

//metodo para llamar y comprobar a un material que se va enviar a disposal
$(function () {
    $("#txtCodigoBarrasMa").change(function () {
        var parametros = {
            "accion": "ObtenerMaterial",
            "codigoBarras": $('#txtCodigoBarrasMa').val()

        };
        $.ajax({
            //llamado al controlador
            url: '../../Controlador/ControllerMaterial.php',
            type: 'post',
            data: parametros,
            dataType: 'json',
            success: function (resultado) {
                console.log(resultado);
                material = resultado.datos[0];
                if ((resultado.estado) && (material)) {
                    if (material.estado !== "Inactivo") {
                        $("#txtBases").val(material.base);
                        $("#txtSeriales").val(material.serialEquipo);
                        $("#txtTipos").val(material.nombreTipo);
                        $("#txtCostos").val(material.costo);
                        $("#txtFechas").val(material.fechaIngreso);
                    } else {
                        $('#txtCodigoBarrasMa').val("");
                        $("#txtBases").val("");
                        $("#txtSeriales").val("");
                        $("#txtTipos").val("");
                        $("#txtCostos").val("");
                        $("#txtFechas").val("");
                        alert("Este material ya se encuentra en Disposal.");
                    }
                } else {
                    $('#txtCodigoBarrasMa').val("");
                    $("#txtBases").val("");
                    $("#txtSeriales").val("");
                    $("#txtTipos").val("");
                    $("#txtCostos").val("");
                    $("#txtFechas").val("");
                    alert("Este material no existe");
                }

            },
            error: function (ex) {
                console.log(ex.responseText);
            }
        });
    });
});


//metodo para mostrar en la tabal de prestamo
$(function () {
    $("#txtCodigoBarra").change(function () {
        var parametros = {
            "accion": "ObtenerMaterial",
            "codigoBarras": $('#txtCodigoBarra').val()
        };
        $.ajax({
            //llamado al controlador
            url: '../../Controlador/ControllerMaterial.php',
            type: 'post',
            data: parametros,
            dataType: 'json',
            success: function (resultado) {
                console.log(resultado);
                material = resultado.datos[0];
                if ((resultado.estado) && (material)) {
                    if (material.estado === "Recibido" || material.estado === "Activo") {
                        $("#txtSeriales").val(material.serialEquipo);
                        $("#txtTipos").val(material.nombreTipo);
                        $("#txtEstados").val(material.estado);
                        $("#txtCaracteristicas").val(material.caracteristica);
                        
                    } else {
                        $("#txtSeriales").val("");
                        $("#txtTipos").val("");
                        $("#txtEstados").val("");
                        $("#txtCaracteristicas").val("");
                        $("#txtCodigoBarra").val("");
                        alert("Este material tiene un estado no disponible para prestamo.");
                    }
                } else {
                    $("#txtSeriales").val("");
                    $("#txtTipos").val("");
                    $("#txtEstados").val("");
                    $("#txtCaracteristicas").val("");
                    $("#txtCodigoBarra").val("");
                    alert("Este material no existe");
                }

            },
            error: function (ex) {
                console.log(ex.responseText);
            }
        });
    });
});


//metodo para mostarr en la tabla de mantenimiento
$(function () {
    $("#txtCodigoBarraMa").change(function () {
        var parametros = {
            "accion": "ObtenerMaterial",
            "codigoBarras": $('#txtCodigoBarraMa').val()
        };
        $.ajax({
            //llamado al controlador
            url: '../../Controlador/ControllerMaterial.php',
            type: 'post',
            data: parametros,
            dataType: 'json',
            success: function (resultado) {
                console.log(resultado);
                material = resultado.datos[0];
                if ((resultado.estado) && (material)) {
                    if (material.estado === "Recibido" || material.estado === "Activo" || material.estado === "Asignado" || material.estado === "Prestado") {
                        $("#txtSeriales").val(material.serialEquipo);
                        $("#txtTipos").val(material.nombreTipo);
                        $("#txtEstados").val(material.estado);
                        $("#txtCaracteristicas").val(material.caracteristica);
                    } else {
                        $("#txtSeriales").val("");
                        $("#txtTipos").val("");
                        $("#txtEstados").val("");
                        $("#txtCaracteristicas").val("");
                        alert("Este material se encuentra en mantenimiento.");
                    }
                } else {
                    $("#txtSeriales").val("");
                    $("#txtTipos").val("");
                    $("#txtEstados").val("");
                    $("#txtCaracteristicas").val("");
                    alert("Este material no existe");
                }

            },
            error: function (ex) {
                console.log(ex.responseText);
            }
        });
    });
});


//metodo para traer el material que esta prestado
$(function () {
    $("#txtCodigoBarra2").change(function () {
        var parametros = {
            "accion": "ObtenerMaterial",
            "codigoBarras": $('#txtCodigoBarra2').val()
        };
        $.ajax({
            //llamado al controlador
            url: '../../Controlador/ControllerMaterial.php',
            type: 'post',
            data: parametros,
            dataType: 'json',
            success: function (resultado) {
                console.log(resultado);
                material = resultado.datos[0];
                if ((resultado.estado) && (material)) {
                    if (material.estado === "Prestado") {
                        $("#txtSeriales").val(material.serialEquipo);
                        $("#txtTipos").val(material.nombreTipo);
                        $("#txtEstados").val(material.estado);
                        $("#txtCaracteristicas").val(material.caracteristica);
                    } else {
                        $("#txtSeriales").val("");
                        $("#txtTipos").val("");
                        $("#txtEstados").val("");

                        alert("Este material no esta en estado de prestamo.");
                    }
                } else {
                    $("#txtSeriales").val("");
                    $("#txtTipos").val("");
                    $("#txtEstados").val("");
                    alert("Este material no existe");
                }

            },
            error: function (ex) {
                console.log(ex.responseText);
            }
        });
    });
});

//metodo para validar que no se repita el codigo de barras
$(function () {
    $("#txtCodigoBarras").change(function () {
        var parametros = {
            "accion": "existeCodigoBarras",
            "codigoBarras": $('#txtCodigoBarras').val()
        };
        $.ajax({
            //llamado al controlador
            url: '../../Controlador/ControllerMaterial.php',
            type: 'post',
            data: parametros,
            dataType: 'json',
            success: function (resultado) {
                console.log(resultado);
                material = resultado.datos[0];
                if (material) {
                    $("#txtCodigoBarras").val("");
                    $("#lblCodigo").html("Este codigo de barras ya se encuentra registrado.");

                } else {
                    $("#lblCodigo").html("");
                }

            },
            error: function (ex) {
                console.log(ex.responseText);
            }
        });
    });
});


//metodo para validar que no se repita el serial
$(function () {
    $("#txtSerial").change(function () {
        var parametros = {
            "accion": "existeSerial",
            "serial": $('#txtSerial').val()
        };
        $.ajax({
            //llamado al controlador
            url: '../../Controlador/ControllerMaterial.php',
            type: 'post',
            data: parametros,
            dataType: 'json',
            success: function (resultado) {
                console.log(resultado);
                material = resultado.datos[0];
                if (material) {
                    $("#txtSerial").val("");
                    $("#lblSerial").html("Este serial ya se encuentra registrado.");

                } else {
                    $("#lblSerial").html("");
                }

            },
            error: function (ex) {
                console.log(ex.responseText);
            }
        });
    });
});

//metodo para agregar un material a prestamo
function agregarprestamo() {
    $("#accion").val("agregarprestamo");

    //$("#accion").val("AgregarP");
    $.ajax({
        url: '../../Controlador/ControllerMaterial.php',
        data: $('#frmPrestamo').serialize(),
        dataType: 'json',
        type: 'post',
        success: function (resultado) {
            console.log(resultado);
            if (resultado.estado) {
                alert("Material Prestado.");              
                $("#txtCodigoBarra").val("");
                $("#txtH").val("");
                $("#txtDescripcion").val("");
                $("#txtSeriales").val("");
                $("#txtTipos").val("");
                $("#txtEstados").val("");
                $("#txtCaracteristicas").val("");
            } else {
                $("mensaje").html("problemas al agregar");
            }
        }
    });
}

//metodo para agregar un material que ya no se encuentre en funcionamiento
function AgregarDisposal() {
    $("#accion").val("AgregarDisposal");
    $.ajax({
        url: '../../Controlador/ControllerMaterial.php',
        data: $("#frmDisposal").serialize(),
        dataType: 'json',
        type: 'post',
        success: function (resultado) {
            console.log(resultado);
            if (resultado.estado) {
                $("#mensaje").html("Material Agregado a Disposal");
                $("#txtObservacion").val("");
                $("#txtCodigosBarras").val("");
                $("#txtBases").val("");
                $("#txtSeriales").val("");
                $("#txtTipos").val("");
                $("#txtCostos").val("");
                $("#txtFechas").val("");
            } else {
                $("mensaje").html("problemas al agregar");
            }

        },
        error: function (ex) {
            console.log(ex.responseText);
        }
    });

}

//metodo para agregar nuevos tipos de materiales
function AgregarMaterial() {
    $("#accion").val("Agregar");
    $.ajax({
        url: '../../Controlador/ControllerTipoMaterial.php',
        data: $("#frmTipo").serialize(),
        dataType: 'json',
        type: 'post',
        success: function (resultado) {
            console.log(resultado);
            if (resultado.estado) {
                alert("Tipo material agregado");
                $("#txtTipo").val("");
            } else {
                $("mensaje").html("problemas al agregar");
            }
        }
    });
}

//metodo para agregar una nueva base
function AgregarBase() {
    $("#accion").val("Agregar");
    $.ajax({
        url: '../../Controlador/ControllerBase.php',
        data: $("#frmBase").serialize(),
        dataType: 'json',
        type: 'post',
        success: function (resultado) {
            console.log(resultado);
            if (resultado.estado) {
                alert("Base agregada");
                $("#txtBase").val("");
            } else {
                $("mensaje").html("problemas al agregar");
            }
        }
    });
}


//metodo para retornar un material que estaba prestado 
$(function() {
    $("#retornar").click(function () {
        var parametros = {
            "accion": "retornar",
            "descripcionEntrega": $('#txtDescripcionEntrega').val(),
            "codigoBarras": $('#txtCodigoBarra2').val()
        };

        $.ajax({
            url: '../../Controlador/ControllerMaterial.php',
            type: 'post',
            data: parametros,
            dataType: 'json',
            success: function (resultado) {
                console.log(resultado);
                if (resultado.estado) {
                    $("#txtCodigoBarra2").val("");
                    $("#txtSeriales").val("");
                    $("#txtTipos").val("");
                    $("#txtEstados").val("");
                    alert("Material entregado a IT.");
                } else {
                    $("mensaje").html("problemas al agregar");
                }
            }
        });
    });
});

//metodo para ingresar un material a mantenimiento
function Mantenimiento() {
    $("#accion").val("Mantenimiento");
    $.ajax({
        url: '../../Controlador/ControllerMaterial.php',
        data: $("#frmMantenimiento").serialize(),
        dataType: 'json',
        type: 'post',
        success: function (resultado) {
            console.log(resultado);
            if (resultado.estado) {
                alert("Material agregado a mantenimiento.");
                $("#txtTicket").val("");
                $("#txtMantenimiento").val("");
                $("#txtSeriales").val("");
                $("#txtTipos").val("");
                $("#txtEstados").val("");
                $("#txtCaracteristicas").val("");
            } else {
                $("mensaje").html("problemas al agregar");
                $("#txtTicket").val("");
                $("#txtMantenimiento").val("");
                $("#txtSeriales").val("");
                $("#txtTipos").val("");
                $("#txtEstados").val("");
                $("#txtCaracteristicas").val("");
            }

        },
        error: function (ex) {
            console.log(ex.responseText);
        }
    });
}


//metodo para entregar un computador que estaba en mantenimeinto a un usuario
function entregarUsuario() {
    var data = {
        "accion": "EntregarUsuario",
        "codigoBarras": $('#txtCodigoBarraEntre').val(),
        "observacionEntrega": $('#txtEntrega').val()
    };
    $.ajax({
        //llamado al controlador
        url: '../../Controlador/ControllerMaterial.php',
        type: 'post',
        data: data,
        dataType: 'json',
        success: function (resultado) {
            console.log(resultado);
           if(resultado.estado){
               alert("material entregado.");
                location.reload();
           }else{
            
                
            
        }
        },
        error: function (ex) {
            console.log(ex.responseText);
        }
    });
}


//metodo para obtener el material que se encontraba en  mantenimiento
$(function () {
    $("#txtCodigoBarraEntre").change(function () {
        var parametros = {
            "accion": "ObtenerMaterialMantenimiento",
            "codigoBarras": $('#txtCodigoBarraEntre').val()

        };
        $.ajax({
            //llamado al controlador
            url: '../../Controlador/ControllerMaterial.php',
            type: 'post',
            data: parametros,
            dataType: 'json',
            success: function (resultado) {
                console.log(resultado);
                material = resultado.datos[0];
                if ((resultado.estado) && (material)) {
                    if (material.estado === "Mantenimiento") {
                        $("#txtSeriales").val(material.serialEquipo);
                        $("#txtTipos").val(material.nombreTipo);
                        $("#txtTickets").val(material.numeroTicket);
                        $("#txtCaracteristicas").val(material.caracteristica);
                        $("#txtObserPresta").val(material.observacionFallo);
                    } else {
                        $("#txtSeriales").val("");
                        $("#txtTipos").val("");
                        $("#txtTickets").val("");
                        $("#txtCaracteristicas").val("");
                        $("#txtObserPresta").val("");
                        alert("Este material no se encontraba en mantenimiento.");
                    }
                } else {
                    $("#txtSeriales").val("");
                    $("#txtTipos").val("");
                    $("#txtTickets").val("");
                    $("#txtCaracteristicas").val("");
                    $("#txtObserPresta").val("");
                    alert("Este material no existe");
                }

            },
            error: function (ex) {
                console.log(ex.responseText);
            }
        });
    });
});

//metodo para traer los datos en envio para registrar con el grfs en la tabla envio temporal
$(function () {
    $("#txtCodigoBarraEnvio").change(function () {
        var parametros = {
            "accion": "ObtenerMaterial",
            "codigoBarras": $('#txtCodigoBarraEnvio').val()

        };
        $.ajax({
            //llamado al controlador
            url: '../../Controlador/ControllerMaterial.php',
            type: 'post',
            data: parametros,
            dataType: 'json',
            success: function (resultado) {
                console.log(resultado);
                material = resultado.datos[0];
                if ((resultado.estado) && (material)) {
                    if (material.estado !== "Enviado") {
                        $("#txtSerial").val(material.serialEquipo);
                        $("#txtTipo").val(material.nombreTipo);
                    } else {
                        $('#txtCodigoBarraEnvio').val("");
                        $("#txtSerial").val("");
                        $("#txtTipo").val("");
                        alert("Este material ya se encuentra en envio");
                    }
                } else {
                    $('#txtCodigoBarraEnvio').val("");
                    $("#txtSerial").val("");
                    $("#txtTipo").val("");
                    alert("Este material no existe");
                }

            },
            error: function (ex) {
                console.log(ex.responseText);
            }
        });
    });
});



//metodo para agregar en la tabla envio temporal
function EnvioTemporal() {
    var data = {
        "accion": "AgregarEnvioTem",
        "codigoMate": $('#txtCodigoBarraEnvio').val(),
        "grfs": $('#txtGRFS').val()
    };
    $.ajax({
        //llamado al controlador
        url: '../../Controlador/ControllerMaterial.php',
        type: 'post',
        data: data,
        dataType: 'json',
        success: function (resultado) {
            console.log(resultado);
            if (resultado.estado) {
                $('#txtCodigoBarraEnvio').val("");
                $('#txtSerial').val("");
                $('#txtTipo').val("");
                $("#txtGRFS").val("");

            }
        },
        error: function (ex) {
            console.log(ex.responseText);
        }
    });
}

//metodo para mostrar en la lista de envio los materiales que van hacer enviados
function listarMaterialesEnvio() {
    $("#accion").val("listaMaterialesEnvio");
    $.ajax({
        //llamado al controlador
        url: '../../Controlador/ControllerMaterial.php',
        type: 'post',
        data: $("#accion"),
        dataType: 'json',
        success: function (resultado) {
            console.log(resultado);
            material = resultado.datos;
            $.each(material, function (i, materiales) {
                $("#idTemp").val(materiales.idTemp);
                $("#codigo").html(materiales.codigoMaterial);
                $("#serial").html(materiales.serialEquipo);
                $("#tipo").html(materiales.nombreTipo);
                $("#caracteristicaMate").html(materiales.caracteristica);
                $("#gRFS").html(materiales.gRFS);
                $("#tabla1 tbody").append($("#fila").clone(true));
            });
            $("#tabla1 tbody tr").first().remove();
            $("#tabla1");
        },
        error: function (ex) {
            console.log(ex.responseText);
        }
    });
}

//metodo para agregar el envio y los detalles de que material se va enviar
function AgregarEnvio() {
    $("#accion").val("AgregarEnvio");
    if ($("#tabla1 tbody tr:eq(0) td:eq(0)").text() !== ""){
        $.ajax({
            url: '../../Controlador/ControllerMaterial.php',
            data: $("#frmEnvio").serialize(),
            dataType: 'json',
            type: 'post',
            success: function (resultado) {
                console.log(resultado);

                if (resultado.estado) {
                    alert("Envio Realizado.");
                    location.reload();
                } else {
                    $("mensaje").html("problemas al agregar");
                }
            }
        });
    }else{  
        alert("Debes ingresar minimo un material para enviar.");
    }
}



//metodo para mostrar la informacion de un envio a la base (es una misma funcion con la de abajo)
$(function () {
    $("#txtNumeroGuiaApr").change(function () {
        var parametros = {
            "accion": "listaRecibirEnvio",
            "numeroGuia": $('#txtNumeroGuiaApr').val(),
            "Idbase": $('#idBase').val()
        };
        $.ajax({
            //llamado al controlador
            url: '../../Controlador/ControllerMaterial.php',
            type: 'post',
            data: parametros,
            dataType: 'json',
            success: function (resultado) {
                console.log(resultado);
                material = resultado.datos[0];
                if ((resultado.estado) && (material)) {
                    $("#txtFechaEnvio").val(material.fechaEnvio);
                    $("#txtBase").val(material.nombreBase);
                    $("#txtObservacionEnvio").val(material.observacionEnvio);

                } else {
                    $("#txtNumeroGuiaApr").val("");
                    alert("No existe ningun envio con este numero de guia o ya se han entregado todos los materiales.");
                }

            },
            error: function (ex) {
                console.log(ex.responseText);
            }
        });
    });
});

//metodo para la lista de materiales enviados en la base (es una misma funcion con la de arriba)
$(function () {
    $("#txtNumeroGuiaApr").change(function () {
        var parametros = {
            "accion": "listaRecibirEnvio",
            "numeroGuia": $('#txtNumeroGuiaApr').val(),
            "Idbase": $('#idBase').val()
        };
        $.ajax({
            //llamado al controlador
            url: '../../Controlador/ControllerMaterial.php',
            type: 'post',
            data: parametros,
            dataType: 'json',
            success: function (resultado) {
                console.log(resultado);
                material = resultado.datos;
                $.each(material, function (i, materiales) {
                    $("#codigo").html(materiales.codigoMaterial);
                    $("#serial").html(materiales.serial);
                    $("#tipo").html(materiales.tipoMaterial);
                    $("#caracteristica").html(materiales.caracteristicas);
                    $("#grfs").html(materiales.grfs);
                    $("#aprobacion").html("<button type='button' class='btn btn-info' onclick='materialRecibido(" + materiales.idMaterial + ", this)'>Recibir</button>");
                    $("#tabla1 tbody").append($("#fila").clone(true));

                });
                $("#tabla1 tbody tr").first().remove();
                $("#tabla1");
            },
            error: function (ex) {
                console.log(ex.responseText);
            }
        });
    });
});

//metodo para aprobar que un material se ha recibido
function materialRecibido(idMaterial, boton) {
    var data = {
        "accion": "RecibirMaterial",
        "idMateri": idMaterial
    };

    $.ajax({
        url: '../../Controlador/ControllerMaterial.php',
        data: data,
        dataType: 'json',
        type: 'post',
        success: function (resultado) {
            console.log(resultado);
            if (resultado.estado) {
                alert("El material se ha recibido.");
                boton.parentElement.innerHTML = "<button type='button' class='btn btn-danger' disabled='disabled'>Recibido</button>";
            } else {
                $("mensaje").html("problemas");
            }
        }
    });
}


//metodo para completar recibido de envio de materiales
function completarRecibido() {
    var data = {
        "accion": "RecibirEnvio",
        "numeroGuia": $('#txtNumeroGuiaApr').val()
    };

    $.ajax({
        url: '../../Controlador/ControllerMaterial.php',
        data: data,
        dataType: 'json',
        type: 'post',
        success: function (resultado) {
            console.log(resultado);
           
            if (resultado.estado) {
                alert("Envio Recibido.");
                location.reload();


            } else {
                alert("Debes primero ingresar el campo de numero Guia, para comprobar si hay un envio");
            }
        }
    });
}



//metodo para obtener el material para actualizarlo
function obtenerMaterial() {
    const params = new URLSearchParams(location.search);
    var data = {
        "accion": "ObtenerMaterialActualizar",
        "idMateriales": params.get("idMaterial")
    };
    $.ajax({
        //llamado al controlador
        url: '../../Controlador/ControllerMaterial.php',
        type: 'post',
        data: data,
        dataType: 'json',
        success: function (resultado) {
            material = resultado.datos[0];
            console.log(material);
            if (resultado.estado) {
                $("#txtCodigo").val(material.codigoMaterial);
                $("#txtTipo").val(material.nombreTipo);
                $("#txtIdTipo").val(material.idTipo);
                $("#txtCosto").val(material.Costo);
                $("#txtCaract").val(material.caracteristica);
                
            }
        },
        error: function (ex) {
            console.log(ex.responseText);
        }
    });
}


//metodo para que el admin pueda cambiar informacion del material
function ActualizarMaterial(){
    const params = new URLSearchParams(location.search);
    var parametros ={
      "accion" : "ActualizarMaterial",
      "codigo": $("#txtCodigo").val(),
      "idTipo": $("#txtIdTipo").val(),
      "costo": $("#txtCosto").val(),
      "caracteristicas": $("#txtCaract").val(),
      "idMateriales" : params.get("idMaterial")
    };
 $.ajax({
     
     url: '../../Controlador/ControllerMaterial.php',
     data: parametros,
     dataType:'json',
     type: 'post',
     success: function (resultado) {
         console.log(resultado);
         
         if(resultado.estado){
            alert("Material actualizado.");
            location.reload();

            
         }else{
             alert("Debe completar los campos.");
         }
     }
    });
};


//metodo para agregar un material que s eva entregar que no ha sido enviado 
function AgregarEntregaMaterialRQ() {
    $("#accion").val("AgregarEntregaMaterialRQ");
    $.ajax({
        url: '../../Controlador/ControllerMaterial.php',
        data: $("#frmEntregaRQ").serialize(),
        dataType: 'json',
        type: 'post',
        success: function (resultado) {
            console.log(resultado);
            if (resultado.estado) {
                alert("Entrega Realizada Correctamente.");
                location.reload();
            } else {
                $("mensaje").html("problemas al agregar");
            }
        }
    });
}


//metodo para registrar en la tabla temporal al infomacion del material que se va entregar que no ha sido enviado
function EntregaTemporal() {
    var data = {
        "accion": "AgregarEntregaTem",
        "codigoMate": $('#txtCodigoBarraEntrega').val(),
        "grfs": $('#txtGRFS').val()
    };
    $.ajax({
        //llamado al controlador
        url: '../../Controlador/ControllerMaterial.php',
        type: 'post',
        data: data,
        dataType: 'json',
        success: function (resultado) {
            console.log(resultado);
            if (resultado.estado) {
                $('#txtCodigoBarraEntrega').val("");
                $('#txtSeriales').val("");
                $('#txtTipos').val("");
                $("#txtGRFS").val("");

            }
        },
        error: function (ex) {
            console.log(ex.responseText);
        }
    });
}


//metodo para obtener el material que va registrar que no ha sido enviado que esta en la base y que se va entregar
$(function () {
    $("#txtCodigoBarraEntrega").change(function () {
        var parametros = {
            "accion": "ObtenerMaterial",
            "codigoBarras": $('#txtCodigoBarraEntrega').val()
        };
        $.ajax({
            //llamado al controlador
            url: '../../Controlador/ControllerMaterial.php',
            type: 'post',
            data: parametros,
            dataType: 'json',
            success: function (resultado) {
                console.log(resultado);
                material = resultado.datos[0];
                if ((resultado.estado) && (material)) {
                    if (material.estado === "Base" || material.estado === "Activo" || material.estado === "Recibido") {
                        $("#txtSeriales").val(material.serialEquipo);
                        $("#txtTipos").val(material.nombreTipo);
                        $("#txtEstados").val(material.estado);
                        $("#txtCaracteristicas").val(material.caracteristica);
                    } else {
                        $("#txtSeriales").val("");
                        $("#txtTipos").val("");
                        $("#txtEstados").val("");
                        $("#txtCaracteristicas").val("");
                        alert("Este material se encuentra en un estado no disponible para entrega.");
                    }
                } else {
                    $("#txtSeriales").val("");
                    $("#txtTipos").val("");
                    $("#txtEstados").val("");
                    $("#txtCaracteristicas").val(material.caracteristica);
                    alert("Este material no existe");
                }

            },
            error: function (ex) {
                console.log(ex.responseText);
            }
        });
    });
});


//metodo para listar los materiales que s evan registrando para entregar
function listarMaterialesEntrega() {
    $("#accion").val("listarMaterialesEntrega");
    $.ajax({
        //llamado al controlador
        url: '../../Controlador/ControllerMaterial.php',
        type: 'post',
        data: $("#accion"),
        dataType: 'json',
        success: function (resultado) {
            console.log(resultado);
            material = resultado.datos;
            $.each(material, function (i, materiales) {
                $("#idTemp").val(materiales.idTemp);
                $("#codigo").html(materiales.codigoMaterial);
                $("#serial").html(materiales.serialEquipo);
                $("#tipo").html(materiales.nombreTipo);
                $("#caracteristicaMate").html(materiales.caracteristica);
                $("#gRFS").html(materiales.gRFS);
                $("#tabla1 tbody").append($("#fila").clone(true));
            });
            $("#tabla1 tbody tr").first().remove();
            $("#tabla1");
        },
        error: function (ex) {
            console.log(ex.responseText);
        }
    });
}


//metodo para que aparezca que materiale sse enviaron con ese grfs
$(function () {
    $("#txtGRFSRQ").change(function () {
        var parametros = {
            "accion": "listarMaterialesEntregaRQ",
            "numeroGrfs": $('#txtGRFSRQ').val(),
        };
        $.ajax({
            //llamado al controlador
            url: '../../Controlador/ControllerMaterial.php',
            type: 'post',
            data: parametros,
            dataType: 'json',
            success: function (resultado) {
                console.log(resultado);
                material = resultado.datos;
                $.each(material, function (i, materiales) {
                    $("#codigobr").html(materiales.codigobr);
                    $("#serialeq").html(materiales.serialeq);
                    $("#tipoel").html(materiales.tipoel);
                    $("#enviado").html(materiales.enviado);
                    $("#caracteristicama").html(materiales.caracteristicama);
                    $("#entregarmaterial").html("<button type='button' class='btn btn-info' onclick='EntregarMaterialesRQ(" + materiales.idMaterial + ", this)'>Entregar</button>");
                    $("#tabla1 tbody").append($("#fila").clone(true));

                });
                $("#tabla1 tbody tr").first().remove();
                $("#tabla1");
            },
            error: function (ex) {
                console.log(ex.responseText);
            }
        });
    });
});

//metod para cuando le presionen a los botones d ela lista de entrega en los materiales,
// cambie el estado del material a entrgado y cambie el diseno del boton
function EntregarMaterialesRQ(idMaterial, boton) {
    var data = {
        "accion": "EntregarMaterialesRQ",
        "idMateri": idMaterial
    };
    $.ajax({
        url: '../../Controlador/ControllerMaterial.php',
        data: data,
        dataType: 'json',
        type: 'post',
        success: function (resultado) {
            console.log(resultado);
            if (resultado.estado) {
                alert("El material se ha Entregado.");
                boton.parentElement.innerHTML = "<button type='button' class='btn btn-danger' disabled='disabled'>Entregado</button>";
            } else {
                $("mensaje").html("problemas");
            }
        }
    });
}

//metod para regitrar que todos los materiale ss ehan entregado con exito
function MaterialesEntregados() {
    var parametros = {
        "accion": "MaterialesEntregados",
        "numeroGrfs": $('#txtGRFSRQ').val(),
        "unaEntrega": $('#frmEntregaConRQ').serialize()
    };
    $.ajax({
        url: '../../Controlador/ControllerMaterial.php',
        data: parametros,
        dataType: 'json',
        type: 'post',
        success: function (resultado) {
            console.log(resultado);
            if (resultado.estado) {
                alert("Entrega Realizada.");
                location.reload();
            } else {
                $("mensaje").html("problemas");
            }
        }
    });
}


