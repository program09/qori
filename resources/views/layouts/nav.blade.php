





<header class="header d-flex align-items-center justify-content-between shadow-1">
    <button id="btn_asidebar" class="btn_icon">
        <i class="fa-light fa-bars-staggered"></i>
        
    </button>
    <div class="user_header">
        <button id="btn_user_action" class="btn_img">
            <div class="user_img">
                <img src="https://img.freepik.com/foto-gratis/retrato-hermoso-mujer-joven-posicion-pared-gris_231208-10760.jpg"
                    alt="">
            </div>
            <div class="menu_user shadow-1">
                <ul class="lista_3">
                    <li class="item_3"><a href="" class="link_3" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();"><i
                                class="fa-light fa-right-from-bracket"></i>Cerrar sesión</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>

                    <li>


                    </li>
                </ul>
            </div>
        </button>

    </div>
</header>

