

@extends('tienda.layout.store')


@section('title', 'Configuraciones')

@section('content')

<section class="section_setting">

    <div class="setting_sect box-light">
        <h2>Generales</h2>

        <form action="">
            <div class="group_input">
                <label for="" id="nombre">Razón social <span>*</span></label>
                <input type="text" id="nombre" placeholder="Razón social (Obligatorio)" required>
            </div>
            <div class="group_input">
                <label for="" id="direccion">Dirección</label>
                <input type="text" id="direccion" placeholder="Dirección (Opcional)">
            </div>
            <div class="group_input">
                <label for="" id="celular">Celular *</label>
                <input type="text" id="celular" placeholder="Celular (Obligatorio)" required>
            </div>
            <div class="group_input">
                <label for="" id="celular">RUC</label>
                <input type="text" id="celular" placeholder="RUC (Opcional)">
            </div>
        </form>
    </div>

    <div class="setting_sect box-light">
        <h3>Logo</h3>

        <form action="" class="logo_store">
            <label for="input_logo">
                <div class="prev_logo" id="img_store">
                    <img src="https://img.freepik.com/free-vector/hand-drawn-shop-local-logo-design_23-2149575766.jpg"
                        alt="" class="img_logo" id="preview_image">
                </div>
            </label>
            <input type="file" id="input_logo" style="display: none;" accept="image/*"
                onchange="previewImage(this)">
            <div id="updateButtons" style="display: none;">
                <div class="adtp">
                    <button onclick="updateImage()">Subir</button>
                    <a onclick="cancelUpdate()">Cancelar</a>
                </div>
            </div>
        </form>
    </div>

</section>



@endsection