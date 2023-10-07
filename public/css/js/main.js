
$(document).ready(function () {
    // Agregar un controlador de clic a los elementos title_lista
    $(".title_lista").click(function () {
        // Encuentra el elemento cont_lista asociado y lo muestra u oculta
        $(this).next(".cont_lista").slideToggle();
    });



    $('#btn_user_action').click(function (event) {
        event.stopPropagation();
        $('.menu_user').slideToggle();
        // Evita que el clic se propague al documento
    });

    // Cerrar el menú al hacer clic en cualquier parte de la pantalla, excepto en #btn_user_action o .menu_user
    $(document).click(function (event) {
        if (!$(event.target).closest('#btn_user_action').length && !$(event.target).closest('.menu_user').length) {
            $('.menu_user').slideUp();
        }
    });


    $('#btn_asidebar').click(function (event) {
        event.stopPropagation(); // Evita que el clic se propague al documento
        $('body').toggleClass('aside_show');
    });

    $('#btn_close_aside').click(function () {
        $('body').removeClass('aside_show');
    })



});




/* ------------------------------- datatables ------------------------------- */
$(document).ready(function () {
    $('#table').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        },
    });
});




/* --------------------------- IMAGEN PREV CONFIG --------------------------- */
var originalImageSrc = document.getElementById('preview_image').src;

function previewImage(input) {
    var previewImage = document.getElementById('preview_image');
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            previewImage.src = e.target.result;
        };
        reader.readAsDataURL(input.files[0]);
        document.getElementById('updateButtons').style.display = 'block';
    }
}

function updateImage() {
    document.getElementById('preview_image').src = originalImageSrc;
    document.getElementById('input_logo').value = '';
    document.getElementById('updateButtons').style.display = 'none';
}

function cancelUpdate() {
    document.getElementById('preview_image').src = originalImageSrc;
    document.getElementById('input_logo').value = '';
    document.getElementById('updateButtons').style.display = 'none';
}






/* ----------------------------- LIMPIAR CAMPOS ----------------------------- */

function vaciarCampos(){
    $(".form_all")[0].reset();
    $('#preview_image').attr('src', 'https://img.freepik.com/free-vector/hand-drawn-shop-local-logo-design_23-2149575766.jpg');
}


/* -------------------------------- MENSAJES -------------------------------- */
function mostrarAlerta(mensaje, tipo) {
    $("#alert_form").html(`<div class="alert alert-${tipo}">${mensaje}</div>`);
}

function swal(title, text, icon) {
    Swal.fire({
        title: title,
        text: text,
        icon: icon,
        confirmButtonText: "Ok"
    });
}


function cerrarModal(modalSelector) {
    $(modalSelector).modal("hide");
}






/* ---------------------------- ROLES DE USUARIO ---------------------------- */

function cancelar_btn(){
    $("#cancelar_btn, #cancelar_btn1").click(function() {
        vaciarCampos();
        
    });
}

function rol_show() {
    $('#rolesDataTable').DataTable({
        
        "processing": true,
        "responsive": true,
        "serverSide": false,
        "ajax": {
            "url": '/get-all-roles',
            "dataSrc": "roles",
        },
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        },
        "columns": [{
                "data": "id"
            },
            {
                "data": "nombre"
            },
            {
                "data": "estado",
                "render": function(data, type, full, meta) {
                    if (data === "activo") {
                        return '<i class="fas fa-check text-success"></i>';
                    } else if (data === "inactivo") {
                        return '<i class="fas fa-ban text-danger"></i>';
                    } else {
                        return '';
                    }
                }
            },
            {
                "data": null,
                "render": function(data, type, full, meta) {
                    var isAdmin = (full.nombre === "administrador" || full.nombre === "usuario");
            
                    if (isAdmin) {
                        //return '<button class="btn btn-danger" onclick="deleteRol(' + data.id + ')">Eliminar</button>'
                        return '<button class="add_new"><i class="fa-light fa-display-slash"></i></button>'
                    } else {
                        
                        return '<button type="button" data-bs-toggle="modal" data-bs-target="#edit_roles" onclick="editarRol(' + data.id + ')" class="btn btn-primary"><i class="fa-regular fa-pen-to-square"></i></button>' +
                            '<button class="btn btn-danger" onclick="deleteRol(' + data.id + ')"><i class="fa-light fa-trash"></i></button>';
                    }
                }
            }
            
        ],
        "createdRow": function(row, data, dataIndex) {
            $(row).attr("data-id", data.id);
        },
        "order": [[0, "desc"]]
    });
}

function rol_create(){
    $("#crearRolForm").submit(function(event) {
        event.preventDefault();
        var form = $(this);

        var rolValue = $("#rol").val().trim();
        var estadoValue = $("#estado").val();

        if (rolValue === '' || estadoValue === '') {
            mostrarAlerta('Los campos no pueden estar vacíos', 'danger');
            return;
        }

        $.ajax({
            type: "POST",
            url: form.attr("action"),
            data: form.serialize(),
            success: function(response) {

                console.log(response);
                vaciarCampos();
                cerrarModal('#add_roles');
                swal('Agregado', 'Agregado con exito', 'success');
                //cargar toda la tabla $('#rolesDataTable').DataTable().ajax.reload();
                $('#rolesDataTable').DataTable().ajax.reload();
                //agregarUltimoDatoATabla(response.nuevoRol);

                rol_count()
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                swal('Error', 'No agregado', 'error');
            }
        });
    });
}

function rol_update(){
    $('#updateRoleForm').on('submit', function(e) {
        e.preventDefault();

        // Get the role ID from the hidden input
        var roleId = $('#role_id').val();

        $.ajax({
            type: 'POST',
            url: '/roles/update/' + roleId, // Or use route('roles.update', ['id' => $id])
            data: $(this).serialize(),
            success: function(response) {
                $('#edit_roles').modal('hide');
                console.log(response.editRol);
                $('#rolesDataTable').DataTable().ajax.reload();
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
            }
        });
    });
}

function rol_count() {
    $.ajax({
        url: '/count-all-roles',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            $('#totalRoles').text(data.total_roles);
            $('#totalRolesActivos').text(data.total_roles_activos);
            $('#totalRolesInactivos').text(data.total_roles_inactivos);
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}

function editarRol(id) {
    // Realiza una solicitud AJAX o consulta a la base de datos para obtener los datos del rol
    $('#rol_id').text('');
    $('#rol_edit').val('');
    $('#estado_edit').val('');

    $.ajax({
        url: '/roles/edit/' + id, // Reemplaza '/obtener-datos-de-rol/' con la URL de tu ruta en Laravel
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            // Llena los campos del formulario con los datos del rol obtenidos

            $('#role_id').val(data.id);
            $('#rol_edit').val(data.nombre);
            $('#estado_edit').val(data.estado);

            // Abre el modal de edición
            $('#edit_roles').modal('show'); // Reemplaza 'editarModal' con el ID de tu modal de edición
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}

function deleteRol(id) {
    // Utiliza Swal.fire para mostrar el modal de confirmación
    Swal.fire({
        title: '¿Estás seguro de eliminar el rol: ' + id + '?',
        text: 'Esta acción no se puede deshacer.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            // El usuario confirmó la eliminación, realiza la solicitud AJAX
            $.ajax({
                type: 'DELETE',
                url: '/roles/delete/' + id,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }, // Reemplaza con la URL correcta para la eliminación
                success: function(response) {
                    $('#rolesDataTable').DataTable().ajax.reload();
                    /*
                    if (response.success) {
                        
                        var dataTable = $('#rolesDataTable').DataTable();
                        var row = dataTable.rows('[data-id="' + id + '"]');

                        swal('Eliminado', 'Dato ' + id + ' eliminado', 'success');

                        if (row.length > 0) {
                            row.remove().draw();
                        } else {
                            console.log('No se encontró la fila con data-id:', id);
                        }
                    } else {
                        swal('ERROR', 'Dato ' + id + ' no eliminado', 'error');
                    }*/
                },
                error: function(xhr, status, error) {



                    var errorMessage = xhr.responseJSON
                        .message; // Obtener el mensaje de error desde la respuesta JSON

                    if (errorMessage.indexOf('clave foranea') !== -1) {
                        // Si el mensaje de error contiene la cadena "clave foranea", mostrar una alerta específica
                        swal('ERROR', 'Existen datos relacionados en otra tabla', 'error');
                    } else {
                        // De lo contrario, mostrar una alerta genérica de error
                        console.error(xhr.responseText);
                        swal('ERROR', 'Dato ' + id + ' no eliminado', 'error');
                    }


                }
            });
        }
    });
}

function agregarUltimoDatoATabla(data) {
    var estadoHtml = '';

    if (data.estado === "activo") {
        estadoHtml = '<i class="fas fa-check text-success"></i>';
    } else if (data.estado === "inactivo") {
        estadoHtml = '<i class="fas fa-ban text-danger"></i>';
    }

    var newRowHtml = '<tr data-id="'+data.id+'">' +
        '<td>' + data.id + '</td>' +
        '<td>' + data.nombre + '</td>' +
        '<td>' + estadoHtml + '</td>' +
        '<td><button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#edit_roles" onclick="editarRol(' +
        data.id + ')"><i class="fa-regular fa-pen-to-square"></i></button> <button class="btn btn-danger" onclick="deleteRol(' + data.id +
        ')"><i class="fa-light fa-trash"></i></button></td>' +
        '</tr>';

    $('#rolesDataTable tbody').prepend(newRowHtml);
}


/* -------------------------------- USAURIOS -------------------------------- */


function user_show(){
    $('#userDataTable').DataTable({
        "processing": true,
        "serverSide": false, // Cambia a true si usas paginación y ordenación del lado del servidor
        "ajax": {
            "url": '/get-all-users', // Cambia esto a la URL de tu controlador que devuelve los datos de los usuarios
            "dataSrc": "users",
        },
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        },
        "columns": [

            {
                "data": "cod_user"
            },
            {
                "data": "foto"
            },
            {
                "data": "nombre"
            },
            {
                "data": "apellidos"
            },
            {
                "data": "role.nombre"
            },
            {
                "data": "celular"
            },
            {
                "data": "direccion"
            },
            {
                "data": "email"
            },
            {
                "data": "estado",
                "render": function(data, type, full, meta) {
                    return data ? 'Activo' : 'Inactivo';
                }
            },
            {
                "data": null, // Utilizamos null ya que no se basa en ningún campo de datos
                "render": function(data, type, full, meta) {
                    return '<button class="btn btn-primary">Editar</button>' +
                        '<button class="btn btn-danger">Desabilitar</button>';
                }
            }


        ]
    });
}
function user_count() {
    $.ajax({
        url: '/count-all-users',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            $('#totalUsers').text(data.total_users);
            $('#totalUsersActivos').text(data.total_users_activos);
            $('#totalUsersInactivos').text(data.total_users_inactivos);
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}




function tienda_show() {
    $('#tiendaDataTable').DataTable({
        "processing": true,
        "serverSide": false,
        "ajax": {
            "url": '/get-all-tiendas', // Cambia la URL a tu ruta de Laravel
            "dataSrc": "tiendas",
        },
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        },
        "columns": [
            {
                "data": "id"
            },
            {
                "data": "logo",
                "render": function (data, type, full, meta) {
                    var imagePath = '/logos/' + data;
                    return '<img class="img_lista_a" src="' + imagePath + '" alt="Logo">';
                }
            },
            {
                "data": "nombre"
            },
            {
                "data": "direccion"
            },
            {
                "data": "celular"
            },
            {
                "data": "user.cod_user"
            },
            {
                "data": "estado",
                "render": function (data, type, full, meta) {
                    return data ? 'Activo' : 'Inactivo';
                }
            },
            {
                "data": null,
                "render": function (data, type, full, meta) {
                    return '<button class="btn btn-primary">Editar</button>' +
                        '<button class="btn btn-danger">Desabilitar</button>';
                }
            }
        ]
    });
}

function tienda_create(){
    $('#formCrear').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: '/tiendas/create',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) {
                cerrarModal('#add_tienda');
                $('#nombre_usuario').text('');
                $('#s_usuario').val() === ''
                vaciarCampos();
                console.log(response);
                swal('Agregado', 'Agregado con exito', 'success');
                $('#tiendaDataTable').DataTable().ajax.reload();
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                swal('Error', 'No agregado', 'error');
            }
        });
    });
}













