@extends('administrador.layout.admi_header')


@section('title', 'Usuarios')

@section('content')
    <section class="section_grid">
        <div class="grid_1">

            <div class="item_grid_1  box-light">
                <div class="icon_card card-1">
                    <i class="fa-solid fa-grid-2"></i>
                </div>
                <div class="info_card">
                    <p>Usuarios</p>
                    <span id="totalUsers"></span>
                </div>
            </div>

            <div class="item_grid_1  box-light">
                <div class="icon_card card-3">
                    <i class="fa-sharp fa-solid fa-wifi"></i>
                </div>
                <div class="info_card">
                    <p>Activos</p>
                    <span id="totalUsersActivos">1212</span>
                </div>
            </div>
            <div class="item_grid_1  box-light">
                <div class="icon_card card-4">
                    <i class="fa-sharp fa-solid fa-wifi-slash"></i>
                </div>
                <div class="info_card">
                    <p>Inactivos</p>
                    <span id="totalUsersInactivos">1212</span>
                </div>
            </div>

        </div>
    </section>

    <section class="section_tables box-light">
        <div class="header_table d-flex align-items-center justify-content-between">
            <h3>Usuarios</h3>
            <a href="">
                <button class="add_new">
                    <i class="fa-light fa-plus"></i> Agregar nuevo
                </button>
            </a>
        </div>
        


        <div class="table-responsive">
            <table class="table" id="userDataTable">
                <thead>
                    <tr>
                        <th scope="col">Cod</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Rol</th>
                        <th scope="col">Celular</th>
                        <th scope="col">Dirección</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Contraseña</th>
                        <th scope="col">Estado</th>
                        <th scope="col"> </th>
                    </tr>
                </thead>
                <tbody id="userList">

                </tbody>
            </table>
        </div>

    </section>





    <script>
        $(document).ready(function() {
            user_count();
            user_show();
        });
    </script>



@endsection
