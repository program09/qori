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
        <p class="txt-point">Menú de la tienda</p>
        <div class="lista_1">
            <div class="item_lista">
                <a href="<?php echo e(route('home')); ?>" class="title_lista d-block"><span><i class="fa-solid fa-home"></i>Inicio</span></a>
            </div>
            <div class="item_lista">
                <a href="<?php echo e(route('tienda')); ?>" class="title_lista d-block<?php echo e(request()->is('tienda/home*') ? ' active_sect' : ''); ?>"><span><i class="fa-solid fa-store"></i>Tienda</span></a>
            </div>
            <div class="item_lista">
                <div class="title_lista d-flex align-items-center justify-content-between<?php echo e(request()->is('tienda/productos*') || request()->is('tienda/categorias*') ? ' active_sect' : ''); ?>"><span><i
                            class="fa-solid fa-layer-group"></i>Almacén</span> 
                            <i class="fa-light fa-angle-down"></i>
                </div>
                <div class="cont_lista">
                    <ul class="lista_2">
                        <li class="item_2"><a href="<?php echo e(route('productos')); ?>" class="link_2">Productos</a></li>
                        <li class="item_2"><a href="<?php echo e(route('categorias')); ?>" class="link_2">Categorías</a></li>
                    </ul>
                </div>
            </div>
            <div class="item_lista">
                <div class="title_lista d-flex align-items-center justify-content-between<?php echo e(request()->is('tienda/ventas*') || request()->is('tienda/carrito*') ? ' active_sect' : ''); ?>"><span>
                    <i class="fa-solid fa-cart-shopping"></i>Ventas</span> <i class="fa-light fa-angle-down"></i></div>
                <div class="cont_lista">
                    <ul class="lista_2">
                        <li class="item_2"><a href="<?php echo e(route('carrito')); ?>" class="link_2">Nueva venta</a></li>
                        <li class="item_2"><a href="<?php echo e(route('ventas')); ?>" class="link_2">Ventas</a></li>
                    </ul>
                </div>
            </div>
            <div class="item_lista">
                <div class="title_lista d-flex align-items-center justify-content-between<?php echo e(request()->is('tienda/clientes*') ? ' active_sect' : ''); ?>"><span><i
                            class="fa-solid fa-user"></i>Usuarios</span> <i class="fa-light fa-angle-down"></i>
                </div>
                <div class="cont_lista">
                    <ul class="lista_2">
                        <li class="item_2"><a href="<?php echo e(route('clientes')); ?>" class="link_2">Clientes</a></li>
                    </ul>
                </div>
            </div>
            <div class="item_lista">
                <div class="title_lista d-flex align-items-center justify-content-between<?php echo e(request()->is('tienda/settings*') ? ' active_sect' : ''); ?>"><span><i
                            class="fa-solid fa-gear"></i>Configuraciones</span> <i
                        class="fa-light fa-angle-down"></i></div>
                <div class="cont_lista">
                    <ul class="lista_2">
                        <li class="item_2"><a href="<?php echo e(route('settings')); ?>" class="link_2">Generales</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <p>Reportes</p>
        <div class="lista_1">
            <div class="item_lista">
                <div class="title_lista"><span><i class="fa-solid fa-chart-tree-map"></i>Gráficos</span></div>
            </div>
        </div>
    </div>
</aside><?php /**PATH C:\xampp\htdocs\Proyectos\qori\resources\views/tienda/layout/store_aside.blade.php ENDPATH**/ ?>