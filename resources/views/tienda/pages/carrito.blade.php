@extends('tienda.layout.store')


@section('title', 'Nueva venta')

@section('content')

<section class="section_grid">
    <div class="grid_1">
        <div class="item_grid_1 box-light">
            <div class="icon_card card-3">
                <i class="fa-solid fa-bag-shopping"></i>
            </div>
            <div class="info_card">
                <p>Canasta</p>
                <span>1200</span>
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

    </div>
</section>

<section class="">
    <div class="header_search box-light">
        <h6>Buscar productos</h6>
        <form action="" class="search_store ">
            <select name="categoria" id="categoria">
                <option value="">Todo</option>
                <option value="">Ropa</option>
                <option value="">Zapatos</option>
            </select>
            <div class="intup d-flex align-items-center">
                <input type="text" placeholder="Buscar producto por código o nombre">
                <button type="button"><i class="fa-light fa-magnifying-glass"></i></button>
            </div>
        </form>
    </div>


    <div class="cont_grid">
        <div class="grid_2">
            <div class="item_grid_2 box-light">
                <div class="img_grid">
                    <img src="{{ asset('img/producto.jpg') }}" alt="">
                </div>
                <div class="info_prod">
                    <p class="txt-point">Nombre del producto</p>
                    <p>S/ <span>120</span></p>
                    <p>Stock <span>5</span></p>
                    <div class="add_prod">
                        <div class="cant d-flex align-items-center">
                            <button onclick="decrementarNumero(this)" ><i class="fa-light fa-minus"></i></button>
                            <input type="number" value="0" min="0" max="5">
                            <button onclick="incrementarNumero(this)"><i class="fa-light fa-plus"></i></button>
                        </div>
                        <button class="add_car" onclick="addcar(id)"><i class="fa-sharp fa-light fa-plus"></i></button>
                    </div>
                </div>
                
            </div>
            <div class="item_grid_2 box-light">
                <div class="img_grid">
                    <img src="{{ asset('img/producto.jpg') }}" alt="">
                </div>
                <div class="info_prod">
                    <p class="txt-point">Nombre del producto</p>
                    <p>S/ <span>120</span></p>
                    <p>Stock <span>5</span></p>
                    <div class="add_prod">
                        <div class="cant d-flex align-items-center">
                            <button onclick="decrementarNumero(this)" ><i class="fa-light fa-minus"></i></button>
                            <input type="number" value="0" min="0" max="5">
                            <button onclick="incrementarNumero(this)"><i class="fa-light fa-plus"></i></button>
                        </div>
                        <button class="add_car" onclick="addcar(id)"><i class="fa-sharp fa-light fa-plus"></i></button>
                    </div>
                </div>
                
            </div>
            <div class="item_grid_2 box-light">
                <div class="img_grid">
                    <img src="{{ asset('img/producto.jpg') }}" alt="">
                </div>
                <div class="info_prod">
                    <p class="txt-point">Nombre del producto</p>
                    <p>S/ <span>120</span></p>
                    <p>Stock <span>5</span></p>
                    <div class="add_prod">
                        <div class="cant d-flex align-items-center">
                            <button onclick="decrementarNumero(this)" ><i class="fa-light fa-minus"></i></button>
                            <input type="number" value="0" min="0" max="5">
                            <button onclick="incrementarNumero(this)"><i class="fa-light fa-plus"></i></button>
                        </div>
                        <button class="add_car" onclick="addcar(id)"><i class="fa-sharp fa-light fa-plus"></i></button>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    

</section>

<script>
    function incrementarNumero(button) {
        var input = button.parentElement.querySelector("input");
        input.stepUp(); // Aumenta el valor en 1
    }

    function decrementarNumero(button) {
        var input = button.parentElement.querySelector("input");
        input.stepDown(); // Disminuye el valor en 1
    }
</script>

@endsection