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
        <p>Menú del administrador</p>
        <div class="lista_1">
            <div class="item_lista">
                <a href="<?php echo e(route('administrador')); ?>"
                    class="title_lista<?php echo e(request()->is('admi/administrador*') ? ' active_sect' : ''); ?> d-block"><span><i
                            class="fa-solid fa-house"></i>Inicio</span></a>
            </div>
            <div class="item_lista">
                <div
                    class="title_lista d-flex align-items-center justify-content-between<?php echo e(request()->is('admi/usuarios*') || request()->is('admi/roles*') ? ' active_sect' : ''); ?>">
                    <span><i class="fa-solid fa-user"></i>Usuarios</span> <i class="fa-light fa-angle-down"></i>
                </div>
                <div class="cont_lista">
                    <ul class="lista_2">
                        <li class="item_2"><a href="<?php echo e(route('usuarios')); ?>" class="link_2">Usuarios</a></li>
                        <li class="item_2"><a href="<?php echo e(route('roles')); ?>" class="link_2">Roles</a></li>
                        <li class="item_2"><a href="<?php echo e(route('tiendas')); ?>" class="link_2">Tiendas</a></li>
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

        <p>Reportes</p>
        <div class="lista_1">
            <div class="item_lista">
                <a href="" class="title_lista d-block"><span><i
                            class="fa-solid fa-chart-tree-map"></i>Gráficos</span></a>
            </div>
        </div>
    </div>
</aside>
<?php /**PATH C:\xampp\htdocs\Proyectos\qori\resources\views/administrador/layout/admi_aside.blade.php ENDPATH**/ ?>