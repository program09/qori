


<?php $__env->startSection('title', 'Tiendas'); ?>

<?php $__env->startSection('content'); ?>
    <section class="section_grid">
        <div class="grid_1">
            <div class="item_grid_1  box-light">
                <div class="icon_card card-1">
                    <i class="fa-solid fa-grid-2"></i>
                </div>
                <div class="info_card">
                    <p>Tiendas</p>
                    <span>1212</span>
                </div>
            </div>
            <div class="item_grid_1  box-light">
                <div class="icon_card card-3">
                    <i class="fa-sharp fa-solid fa-wifi"></i>
                </div>
                <div class="info_card">
                    <p>Activos</p>
                    <span>1212</span>
                </div>
            </div>
            <div class="item_grid_1  box-light">
                <div class="icon_card card-4">
                    <i class="fa-sharp fa-solid fa-wifi-slash"></i>
                </div>
                <div class="info_card">
                    <p>Inactivos</p>
                    <span>1212</span>
                </div>
            </div>

        </div>
    </section>

    <section class="section_tables box-light">
        <div class="header_table d-flex align-items-center justify-content-between">
            <h3>Tiendas</h3>
            <a type="button" data-bs-toggle="modal" data-bs-target="#add_tienda">
                <button class="add_new">
                    <i class="fa-light fa-plus"></i> Agregar nuevo
                </button>
            </a>
        </div>

        <div class="table-responsive">
            <table class="table" id="tiendaDataTable">
                <thead>
                    <tr>
                        <th scope="col">Cod</th>
                        <th scope="col">Logo</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Dirección</th>
                        <th scope="col">Celular</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Estado</th>
                        <th scope="col"> </th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>

    </section>


    <div class="modal" id="add_tienda">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Agregar nuevo rol</h4>
                </div>
                <div class="modal-body form_add">

                    <form action="<?php echo e(route('tienda.create')); ?>" class="form_all" method="POST"
                        enctype="multipart/form-data" id="formCrear">
                        <?php echo csrf_field(); ?>

                        <div id="mensaje"></div>


                        <p>Buscar si no recuerda el id (Opcional)</p>
                        <div class="group_input">
                            <input type="text" placeholder="Comprobar usuario id, código, nombre, apellidos" id="s_usuario"
                                name="s_usuario" autocomplete="off">
                            <div id="resultado_busqueda">
                                <ul id="lista_usuarios"></ul>
                            </div>
                        </div>

                        <br>
                        <p>Luego de comprobar el usuario, coloca el id</p>

                        <div class="group_input">
                            <input type="text" placeholder="Id del usuario" id="usuario" name="usuario" required>
                        </div>



                        <div class="group_input">
                            <input type="text" placeholder="Nombre del tienda" id="tienda" name="tienda" required>
                        </div>

                        <div class="group_input">
                            <input type="text" placeholder="Dirección" id="direccion" name="direccion">
                        </div>

                        <div class="group_input">
                            <input type="text" placeholder="Celular" id="celular" name="celular">
                        </div>

                        <div class="group_input">
                            <select name="estado" id="estado" required>
                                <option value="">Seleccionar estado</option>
                                <option value="activo">Activo</option>
                                <option value="inactivo">Inactivo</option>
                            </select>
                        </div>
                        <hr>
                        <div class="logo_add">
                            <p>Logo</p>
                            <div class="logo_store">
                                <label for="input_logo">
                                    <div class="prev_logo" id="img_store">
                                        <img src="https://img.freepik.com/free-vector/hand-drawn-shop-local-logo-design_23-2149575766.jpg"
                                            alt="" class="img_logo" id="preview_image">
                                    </div>
                                </label>
                                <input type="file" id="input_logo" name="input_logo" style="display: none;"
                                    accept="image/*" onchange="previewImage(this)">
                            </div>
                        </div>

                        <div class="btn_sect_form d-flex align-items-center justify-content-between">
                            <button type="submit" id="enviarFormulario" class="add_new">Crear</button>
                            <a id="cancelar_btn" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</a>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>



    <script>
        $(document).ready(function() {
            

            $(document).on('click', function(event) {
                if (! $('#s_usuario').is(event.target) && !$('#resultado_busqueda').is(event.target) &&
                    $('#resultado_busqueda').has(event.target).length === 0) {
                    $('#resultado_busqueda').hide();
                }else{
                    $('#resultado_busqueda').show();
                }
            });

            var listaUsuarios = $('#lista_usuarios');

            $('#s_usuario').on('keyup', function() {
                var idUsuario = $(this).val();
                $('#nombre_usuario').text('');

                if (idUsuario === '') {
                    listaUsuarios.empty();
                    $('#resultado_busqueda').hide();


                } else {
                    $.ajax({
                        type: 'GET',
                        url: '<?php echo e(route('buscar.usuario')); ?>',
                        data: {
                            id_usuario: idUsuario
                        },
                        success: function(response) {
                            listaUsuarios.empty();

                            if (response.usuarios && response.usuarios.length > 0) {
                                // Si se encontraron usuarios, muestra los detalles de cada usuario
                                $.each(response.usuarios, function(index, usuario) {
                                    var usuarioItem = $('<li>').text('Id: ' + usuario
                                        .id +
                                        ' / cod: ' + usuario.cod_user + ' / ' +
                                        usuario.nombre + ' ' + usuario.apellidos);
                                    listaUsuarios.append(usuarioItem);
                                });
                                $('#resultado_busqueda').show();

                                console.log('Usuarios encontrados:', response.usuarios);
                            } else {
                                // Si no se encontraron usuarios o response.usuarios es undefined, muestra "Usuario no encontrado"
                                var mensaje = $('<li>').text('Usuario no encontrado');
                                listaUsuarios.append(mensaje);
                                console.log('Usuario no encontrado');
                            }
                        },
                        error: function(response) {
                            $('#nombre_usuario').text('Usuario no encontrado');
                            console.log(response);
                        }
                    });
                }
            });
        });
    </script>






    <script>
        $(document).ready(function() {
            cancelar_btn();
            tienda_show();
            tienda_create();
        });
    </script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('administrador.layout.admi_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Proyectos\qori\resources\views/administrador/pages/tiendas.blade.php ENDPATH**/ ?>