/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function() {
// Script para el activar y deseactivar el menu responsive

    $('#menu li a').on('click', function() {
        $('li a.activo').removeClass('activo');
        $(this).addClass('activo');
    });
    $(document).ready(function() {
        $('.menu-toggle').click(function() {
            $('nav').toggleClass('active');
        });
    });
    //Script que activa el panel de usuario activa y desactiva la class 
    $('.panelUsuario').hide();
    $('#btnActivarPanel').click(function() {
        $('.panelUsuario').slideToggle();
    });
    // Script de efecto de toggle osea efecto de tres barras cuando se presiona activa el menu responvise

    $('.toggle').click(function() {
        $('.toggle').toggleClass('activad');
    });
    
    
    $(".submenu").click(function(){
      $(this).children("ul").slideToggle();
      
    });
    
    $("ul").click(function(p){
        p.stopPropagation();
    });
});
