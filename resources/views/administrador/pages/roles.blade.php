@extends('administrador.layout.admi_header')


@section('title', 'Roles')

@section('content')


    <section class="section_grid">
        <div class="grid_1">
            <div class="item_grid_1  box-light">
                <div class="icon_card card-1">
                    <i class="fa-solid fa-list"></i>
                </div>
                <div class="info_card">
                    <p>Roles</p>
                    <span id="totalRoles"></span>
                </div>
            </div>
            <div class="item_grid_1  box-light">
                <div class="icon_card card-3">
                    <i class="fa-sharp fa-solid fa-wifi"></i>
                </div>
                <div class="info_card">
                    <p>Activos</p>
                    <span id="totalRolesActivos"></span>
                </div>
            </div>

            <div class="item_grid_1  box-light">
                <div class="icon_card card-4">
                    <i class="fa-sharp fa-solid fa-wifi-slash"></i>
                </div>
                <div class="info_card">
                    <p>Inactivos</p>
                    <span id="totalRolesInactivos"></span>
                </div>
            </div>

        </div>
    </section>

    <section class="section_tables box-light">

        <div class="header_table d-flex align-items-center justify-content-between">
            <h3>Roles</h3>
            <a type="button" data-bs-toggle="modal" data-bs-target="#add_roles">
                <button class="add_new">
                    <i class="fa-light fa-plus"></i> Agregar nuevo
                </button>
            </a>
        </div>

        <div class="table-responsive">
            <table class="table" id="rolesDataTable">
                <thead>
                    <tr>
                        <th scope="col">Código</th>
                        <th scope="col">Título</th>
                        <th scope="col">Estado</th>
                        <th scope="col"> </th>
                    </tr>
                </thead>
            </table>
        </div>

    </section>

    <!-- The Modal -->
    <div class="modal" id="add_roles">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Agregar nuevo rol</h4>
                </div>
                <div class="modal-body form_add">

                    <form action="{{ route('roles.create') }}" class="form_all" id="crearRolForm">
                        @csrf

                        <span id="alert_form">

                        </span>

                        <div class="group_input">
                            <input type="text" placeholder="Nombre del rol" id="rol" name="rol">
                        </div>

                        <div class="group_input">
                            <select name="estado" id="estado">
                                <option value="">Seleccionar estado</option>
                                <option value="activo">Activo</option>
                                <option value="inactivo">Inactivo</option>
                            </select>
                        </div>

                        <div class="btn_sect_form d-flex align-items-center justify-content-between">
                            <button type="submit" id="btn_crear" class="add_new">Crear</button>
                            <a id="cancelar_btn" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</a>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>


    <!-- The Modal -->
    <div class="modal" id="edit_roles">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Editar rol</h4>
                </div>
                <div class="modal-body form_add">

                    <form method="POST" class="form_all" id="updateRoleForm">
                        @csrf
                        @method('PUT')

                        <span id="alert_form">

                        </span>
                        <div class="group_input">
                            <input type="text" placeholder="Id del rol" id="role_id" name="role_id" disabled>
                        </div>
                        <div class="group_input">
                            <input type="text" placeholder="Nombre del rol" id="rol_edit" name="rol_edit">
                        </div>

                        <div class="group_input">
                            <select name="estado_edit" id="estado_edit">
                                <option value="">Seleccionar estado</option>
                                <option value="activo">Activo</option>
                                <option value="inactivo">Inactivo</option>
                            </select>
                        </div>

                        <div class="btn_sect_form d-flex align-items-center justify-content-between">
                            <button type="submit" id="btn_edit" class="add_new">Actualizar</button>
                            <a id="cancelar_btn1" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</a>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>






    <script>
        $(document).ready(function() {
            rol_show();
            rol_count()
            rol_create();
            rol_update();
            cancelar_btn();
        });
    </script>



@endsection
