@extends('tienda.layout.store')


@section('title', 'Tienda')

@section('content')

    <section class="section_grid">
        <div class="grid_1">
            <div class="item_grid_1 box-light">
                <div class="icon_card card-2">
                    <i class="fa-sharp fa-solid fa-cash-register"></i>
                </div>
                <div class="info_card">
                    <p>Caja</p>
                    <span>S/. 1200</span>
                </div>
            </div>
            <div class="item_grid_1  box-light">
                <div class="icon_card card-1">
                    <i class="fa-solid fa-grid-2"></i>
                </div>
                <div class="info_card">
                    <p>Productos</p>
                    <span>1212</span>
                </div>
            </div>
            <div class="item_grid_1  box-light">
                <div class="icon_card card-4">
                    <i class="fa-solid fa-list"></i>
                </div>
                <div class="info_card">
                    <p>Categorías</p>
                    <span>1212</span>
                </div>
            </div>
            <div class="item_grid_1 box-light">
                <div class="icon_card card-2">
                    <i class="fa-sharp fa-solid fa-user"></i>
                </div>
                <div class="info_card">
                    <p>Usuarios</p>
                    <span>1200</span>
                </div>
            </div>
            <div class="item_grid_1 box-light">
                <div class="icon_card card-3">
                    <i class="fa-solid fa-users"></i>
                </div>
                <div class="info_card">
                    <p>Clientes</p>
                    <span>1212</span>
                </div>
            </div>

        </div>
    </section>

    <section class="section_tables box-light">
        <div class="header_table d-flex align-items-center justify-content-between">
            <h3>Ventas de hoy (<span>1</span>)</h3>
            <a href="">
                <button class="add_new">
                    <i class="fa-light fa-plus"></i> Nueva venta
                </button>
            </a>
        </div>

        <div class="table-responsive">
            <table class="table" id="table">
                <thead>
                    <tr>
                        <th scope="col">Cod</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Productos</th>
                        <th scope="col">Total</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Estado</th>
                        <th scope="col"> </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="">
                        <td scope="row">Cliente</td>
                        <td>R1C2</td>
                        <td>R1C3</td>
                        <td>R1C2</td>
                        <td>R1C3</td>
                        <td>R1C2</td>
                        <td>R1C3</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </section>

@endsection
