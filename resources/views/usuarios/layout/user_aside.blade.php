<aside class="aside box-light scrool_1 shadow-1">
    <div class="aside_header d-flex align-items-center justify-content-between">
        <div class="logo">
            <h1>Yordi</h1>
        </div>
        <div class="switch d-flex align-items-center">
            <button class="btn_icon" id="btn_close_aside"><i class="fa-sharp fa-light fa-xmark"></i></button>
        </div>
    </div>
    <div class="aside_body">
        <p class="txt-point">Hola: {{ Auth::user()->nombre }} {{ Auth::user()->apellidos }}</p>
        <p>Menú del usuario</p>
        <div class="lista_1">
            <div class="item_lista">
                <a href="{{ route('home') }}"
                    class="title_lista d-block{{ request()->is('user/home*') ? ' active_sect' : '' }}"><span><i
                            class="fa-solid fa-house"></i>Inicio</span></a>
            </div>
            <div class="item_lista">
                <div
                    class="title_lista{{ request()->is('user/create_store*') ? ' active_sect' : '' }} d-flex align-items-center justify-content-between">
                    <span><i class="fa-solid fa-gear"></i>Tienda</span> <i class="fa-light fa-angle-down"></i>
                </div>
                <div class="cont_lista ">
                    <ul class="lista_2">
                        <li class="item_2"><a href="{{ route('create_store') }}" class="link_2">Crear tienda</a>
                        </li>

                        <li class="item_2"><a href="{{ route('tienda') }}" class="link_2">Tienda 1</a></li>

                    </ul>
                </div>
            </div>
            <div class="item_lista">
                <div class="title_lista d-flex align-items-center justify-content-between"><span><i
                            class="fa-solid fa-gear"></i>Configuraciones</span> <i class="fa-light fa-angle-down"></i>
                </div>
                <div class="cont_lista">
                    <ul class="lista_2">
                        <li class="item_2"><a href="" class="link_2">Usuario</a></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</aside>
