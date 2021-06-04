const {
    isSet
} = require('lodash');

require('./bootstrap');
//VALIDAR POPUPS FORM
(function () {
    'use strict'
    var forms = document.querySelectorAll('.needs-validation')
    Array.prototype.slice.call(forms)
        .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
})()

$(document).ready(function () {
    //LOGIN
    //animacion block dni
    if (!$("input#dni_input_login").val() === "") {
        $(".dni_mov").animate({
            top: "9px"
        }, 500)
    }
    $("input#dni_input_login").on('click', function () {
        $(".dni_mov").animate({
            top: "9px"
        }, 500)
    });
    //animacion block password
    $("input#password_input_login").on('click', function () {
        $(".pass_mov").animate({
            top: "84px"
        }, 500)
    });
    //forgot password
    $(".forgot_password").on('click', function () {
        Swal.fire({
            title: 'Porfavor pongase en contacto con su cordinador/a para restaurar sus credenciales. Grácias.',
            showClass: {
                popup: 'animate__animated animate__backInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__backOutDown'
            }
        })
    });
    $(".forgot_password").on({
        mouseenter: function () {
            $(this).css("color", "#50B2CE");
        },
        mouseleave: function () {
            $(this).css("color", "#1F1F1F");
        }
    });
    //FILTRAR TRABAJADORAS
    //dni
    $(".buscar_dni").on("click", function () {
        var valor = $("#employee_search").val();
        if(valor.match(/^[XxTtYyZz]{1}[0-9]{7}[a-zA-Z]{1}$/) || valor.match(/^\d{8}[a-zA-Z]{1}$/)){
            $("tbody.info_filtrar").html("");
            $.ajax({
                url: "/trabajadoras/busqueda/dni",
                data: {
                    dni: valor
                },
                success: function (data) {
                    if(data.trabajadora == null){
                        $("#tabla_filtrar").css("display", "none");
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Este usuario no existe!',
                            footer: 'Asegúrate de tener el DNI correcto',
                            showClass: {
                              popup: 'animate__animated animate__fadeInDown'
                            },
                            hideClass: {
                              popup: 'animate__animated animate__fadeOutUp'
                            }
                          })
                    } else {
                        var trabajadora = data.trabajadora;
                        var usuarios = data.users;
                        var nombre = trabajadora[0].nombre;
                        var apellido = trabajadora[0].apellidos;
                        var email = trabajadora[0].email;
                        var telefono = trabajadora[0].telefono;
                        var zona = trabajadora[0].zona;
                        var id = trabajadora[0].id;
                        var rol = trabajadora[0].rol_id;
                        if (rol === 1) {
                            $("thead.tabla_trabajadoras tr").html(" <th>Nombre y apellido</th>" +
                                "<th>Teléfono</th>" +
                                "<th>Email</th>" +
                                "<th>Zona</th>" +
                                "<th colspan='2'>Opciones</th>");
                            $("tbody.info_filtrar").html("<td>" + nombre + " " + apellido + "</td>" +
                                "<td>" + telefono + "</td>" +
                                "<td>" + email + "</td>" +
                                "<td>" + zona + "</td>" +
                                "<td><a href='#' onclick='trabajadoras(" + id + ")' data-toggle='modal' data-target='#trabajadora' >Editar </a>|<span> </span><a href='/trabajadoras/eliminar/" + id + "'>Eliminar</a></td></tr>");
                        } else if (rol === 2) {
                            $("thead.tabla_trabajadoras tr").html(" <th>Nombre y apellido</th>" +
                                "<th>Teléfono</th>" +
                                "<th>Email</th>" +
                                "<th>Zona</th>" +
                                "<th>Usuarios</th>" +
                                "<th colspan='2'>Opciones</th>");
                            $("tbody.info_filtrar").html("<td>" + nombre + " " + apellido + "</td>" +
                                "<td>" + telefono + "</td>" +
                                "<td>" + email + "</td>" +
                                "<td>" + zona + "</td>" +
                                " <td class='usuarios_trabajadora'></td>" +
                                "<td><a href='#' onclick='trabajadoras(" + id + ")' data-toggle='modal' data-target='#trabajadora' >Editar </a>|<span> </span><a href='/trabajadoras/eliminar/" + id + "'>Eliminar</a></td></tr>");
                            if (usuarios.length === 0 && rol === 2) {
                                $("td.usuarios_trabajadora").append("<p>No tiene usuarios asignados</p>");
                            } else {
                                for (var i = 0; i < usuarios.length; i++) {
                                    $("td.usuarios_trabajadora").append("<p><a href='/usuario/" + id + "'>" + usuarios[i].nombre + " " + usuarios[i].apellidos + "</a></p>");
                                }
                            }
                        } else {

                            $("thead.tabla_trabajadoras tr").html(" <th>Nombre y apellido</th>" +
                                "<th>Teléfono</th>" +
                                "<th>Email</th>" +
                                "<th colspan='2'>Opciones</th>");
                            $("tbody.info_filtrar").html("<td>" + nombre + " " + apellido + "</td>" +
                                "<td>" + telefono + "</td>" +
                                "<td>" + email + "</td>" +
                                " <td class='usuarios_trabajadora'></td>" +
                                "<td><a href='#' onclick='trabajadoras(" + id + ")' data-toggle='modal' data-target='#trabajadora'>Editar </a>|<span> </span><a href='/trabajadoras/eliminar/" + id + "'>Eliminar</a></td></tr>");
                        }
                        $("#tabla_filtrar").css("display", "block");
                    }
                }
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'DNI o NIE incorrecto!',
                footer: 'Asegúrate de introducir un formato correcto',
                showClass: {
                  popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                  popup: 'animate__animated animate__fadeOutUp'
                }
              })
        }

    });

    //zona
    $("#select_roles").change(function () {
        var valor = $("#select_roles option:selected").val();
        $("tbody.info_filtrar").html("");
        $.ajax({
            url: "/trabajadoras/busqueda/rol",
            data: {
                id: valor
            },
            success: function (data) {
                var trabajadora = data.trabajadora;
                for (var a = 0; a < trabajadora.length; a++) {
                    var nombre = trabajadora[a].nombre;
                    var apellido = trabajadora[a].apellidos;
                    var email = trabajadora[a].email;
                    var telefono = trabajadora[a].telefono;
                    var zona = trabajadora[a].zona;
                    var code = trabajadora[a].id;
                    var rol = trabajadora[a].rol_id;

                    if (rol === 1) {
                        $("thead.tabla_trabajadoras tr").html(" <th>Nombre y apellido</th>" +
                            "<th>Teléfono</th>" +
                            "<th>Email</th>" +
                            "<th>Zona</th>" +
                            "<th colspan='2'>Opciones</th>");
                        $("tbody.info_filtrar").append("<tr><td>" + nombre + " " + apellido + "</td>" +
                            "<td>" + telefono + "</td>" +
                            "<td>" + email + "</td>" +
                            "<td>" + zona + "</td>" +
                            "<td><a href='#' onclick='trabajadoras(" + code + ")' data-toggle='modal' data-target='#trabajadora' >Editar </a>|<span> </span><a href='/trabajadoras/eliminar/" + code + "'>Eliminar</a></td></tr>");

                    } else if (rol === 2) {
                        $("thead.tabla_trabajadoras tr").html(" <th>Nombre y apellido</th>" +
                            "<th>Teléfono</th>" +
                            "<th>Email</th>" +
                            "<th>Zona</th>" +
                            "<th>Usuarios</th>" +
                            "<th colspan='2'>Opciones</th>");
                        $("tbody.info_filtrar").append("<tr><td>" + nombre + " " + apellido + "</td>" +
                            "<td>" + telefono + "</td>" +
                            "<td>" + email + "</td>" +
                            "<td>" + zona + "</td>" +
                            "<td><a href='#' onclick='usuarios(" + code + ")' data-toggle='modal' data-target='#usuario' >ver</a><td>" +
                            "<td><a href='#' onclick='trabajadoras(" + code + ")' data-toggle='modal' data-target='#trabajadora' >Editar </a>|<span> </span><a href='/trabajadoras/eliminar/" + code + "'>Eliminar</a></td></tr>");

                    } else {
                        $("thead.tabla_trabajadoras tr").html(" <th>Nombre y apellido</th>" +
                            "<th>Teléfono</th>" +
                            "<th>Email</th>" +
                            "<th colspan='2'>Opciones</th>");
                        $("tbody.info_filtrar").append("<tr><td>" + nombre + " " + apellido + "</td>" +
                            "<td>" + telefono + "</td>" +
                            "<td>" + email + "</td>" +
                            "<td><a href='#' onclick='trabajadoras(" + code + ")' data-toggle='modal' data-target='#trabajadora' >Editar </a>|<span> </span><a href='/trabajadoras/eliminar/" + code + "'>Eliminar</a></td></tr>");
                    }

                    $("#tabla_filtrar").css("display", "block");

                }
            }
        });
    });

    //validar dni
    $(".validarDniNie").on("change", function(){
        var code = $(this).val();
        if(code.match(/^[XxTtYyZz]{1}[0-9]{7}[a-zA-Z]{1}$/) || code.match(/^\d{8}[a-zA-Z]{1}$/)){
            $(".errorDniNie").css("display", "none")
        }else {
            $(".errorDniNie").css("display", "block")
        }
    })

    $(".changePassword").on("click", function () {
        $(".changePassword").css("display", "none")
        $(".password").css("display", "flex")
    })
    $(".cancelPwd").on("click", function () {
        $(".changePassword").css("display", "flex")
        $(".password").css("display", "none")
    })


    //USUARIOS
    //Modificar usuario

    $("#update").on("click", function () {
        $(".edit-text").css("display", "flex")
        $(".edit-input").css("display", "flex")
        $(".first-text").css("display", "none")
        $(".content-text").css("display", "none")
        $(".edit-margin").css("margin-top", "20px")
        $(".edit-btn").css("display", "flex")
    });
    $("#cancel").on("click", function () {
        $(".edit-text").css("display", "none")
        $(".edit-input").css("display", "none")
        $(".first-text").css("display", "flex")
        $(".content-text").css("display", "flex")
        $(".edit-margin").css("margin-top", "0")
        $(".edit-btn").css("display", "none")
    })
    //Baja de usuario
    $("#bajaUsuario").on("click", function (event) {
        event.preventDefault();
        const url = $(this).attr('href');

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: '¿Seguro que quieres eliminarlo?',
            text: "Si lo haces no lo se podrá revertir!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Si, borra!',
            cancelButtonText: 'No, cancela!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelado',
                    'Tu usuari@ está a salvo :)',
                    'error'
                )
            }
        })
    })
    //busqueda de usuario por dni
    $("#search_user").on("click", function(){
        var code = $("#dni_search").val();
        if(code.match(/^\d{8}[a-zA-Z]{1}$/) || code.match(/^[XxTtYyZz]{1}[0-9]{7}[a-zA-Z]{1}$/)){
            $.ajax({
                url: "/usuarios/busqueda/dni",
                data: {
                    dni: code
                },
                success: function (data) {
                    showUser(data);
                }
            })
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'DNI o NIE incorrecto!',
                footer: 'Asegúrate de introducir un formato correcto',
                showClass: {
                  popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                  popup: 'animate__animated animate__fadeOutUp'
                }
              })
        }

    })

    $("#search_user_name").on("click", function(){
        var nombre = $("#name_search").val();
        var apellidos = $("#subname_search").val();
        $.ajax({
            url: "/usuarios/busqueda/nombre",
            data: {
                nombre: nombre,
                apellidos: apellidos
            },
            success: function (data) {
                   showUser(data);
            }
        })
    })


    //ver un evolutivo
    $(".verEvol").on("click",function () {
        var id = $(this).data("idevol");
        $.ajax({
            url: "/evolutivos/id",
            data: {
                id: id
            },
            success: function (data) {
                $("#evolutivoContent").html(
                    "<div class='modal-header'>" +
                        "<div class='row all-content'>" +
                             "<div class='col-12 justify-content-end d-flex'>"+
                                "<button type='button' class='close' data-dismiss='modal'><img class='close-cross' src='/img/icons/X.png'></button>"+
                            "</div>" +
                            "<div class='col-12 text-center'>"+
                                "<h4>Evolutiva del " + data[0].fecha_creacion + "</h4>" +
                            "</div>"+
                        "</div>"+
                    "</div>" +
                    "<div class='row modal-body'>" +
                        "<div class='col-12'>"+
                            "<h4 class='text-center'>Nota</h4>" +
                        "</div>" +
                        "<div class='col-12'>"+
                            "<textarea class='text-secondary bg-transparent border-0' rows='4' readonly>" + data[0].descripcion + "</textarea>" +
                        "</div>" +
                    "</div>");
            }
        })
    });
    //ver un nota
    $(".verNota").click(function () {
        var id = $(this).data("idnota");
        $.ajax({
            url: "/notas/id",
            data: {
                id: id
            },
            success: function (data) {
                $("#notaContent").html(
                    "<div class='modal-header'>" +
                        "<div class='row all-content'>" +
                             "<div class='col-12 justify-content-end d-flex'>"+
                                "<button type='button' class='close' data-dismiss='modal'><img class='close-cross' src='/img/icons/X.png'></button>"+
                            "</div>" +
                            "<div class='col-12 text-center'>"+
                                "<h4>" + data[0].fecha + "</h4>" +
                            "</div>"+
                        "</div>"+
                    "</div>" +
                    "<div class='row modal-body'>" +
                        "<div class='col-12'>"+
                            "<h4 class='text-center'>Nota</h4>" +
                        "</div>" +
                        "<div class='col-12'>"+
                            "<textarea class='text-secondary bg-transparent border-0' rows='4' readonly>" + data[0].nota + "</textarea>" +
                        "</div>" +
                    "</div>");
            }
        })
    });
    //leer notificacion
    $(".leerNotificacion").on("click", function () {
        var id = $(this).data("noti");
        var prioridad;
        $.ajax({
            url: "/notificaciones/ver/",
            data: {
                notification: id
            },
            success: function (data) {
                for (let i = 0; i < data.length; i++) {
                    if (data[i].estado == 0) {
                        $.ajax({
                            url: "/notificaciones/estado/",
                            data: {
                                notification: id
                            },
                            success: function (data) {

                            }
                        });
                    }
                    if (data[i].prioridad == 0) {
                        prioridad = "Media";
                    } else {
                        prioridad = "Alta";
                    }
                    $("#priority").text(prioridad)
                    $("#creator").text(data[i].nombre + " " + data[i].apellidos)
                    $("#date").text(data[i].fecha)
                    $("#affair").text(data[i].asunto)
                    $("#message").text(data[i].detalle)
                }
            }
        });
    })

    $("#modify").on("click", function(){
        $("#user_name").prop("disabled", false)
        $("#user_name").prop("disabled", false)
        $("#user_dni").prop("disabled", false)
        $("#user_direction").prop("disabled", false)
        $("#user_telf").prop("disabled", false)
        $("#user_contact").prop("disabled", false)
        $("#user_hours").prop("disabled", false)
        $("#user_detail").prop("disabled", false)
        $("#user_chores").prop("disabled", false)
        $(".changes").css("display", "block")
    })

});
//HEADERs
//datetime

function datetime() {
    var datetime = new Date();
    var day = datetime.getDate();
    var month = (datetime.getMonth() + 1);
    var year = datetime.getFullYear();
    var h = datetime.getHours();
    var m = datetime.getMinutes();
    var s = datetime.getSeconds();
    if (h < 10) {
        h = "0" + h;
    }
    if (m < 10) {
        m = "0" + m;
    }
    if (s < 10) {
        s = "0" + s;
    }

    $(".date").html(day + "/" + month + "/" + year + "-" + h + ":" + m + "H");

}
setInterval(datetime, 1000);

function showUser(data){
    if(data.length == 0){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Este usuario no existe!',
            footer: 'Asegúrate de tener el DNI correcto',
            showClass: {
              popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
              popup: 'animate__animated animate__fadeOutUp'
            }
          })
    } else {
        $(".user_info").css("display", "block")
        $("#user_name").text(data[0].nombre+" "+data[0].apellidos)
        $("#user_dni").text(data[0].dni)
        $("#user_direction").text(data[0].direccion)
        $("#user_telf").text(data[0].telefono)
        $("#user_contact").text(data[0].persona_contacto)
        $("#user_hours").text(data[0].horas_asignadas)
        $("#user_created_at").text(data[0].created_at)
        $("#user_detail").text(data[0].detalle)
        $("#user_chores").text(data[0].tareas)
    }
}
$("#cross").on("click", function () {
    $(".user_info").css("display", "none")
});


