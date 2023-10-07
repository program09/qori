


<?php $__env->startSection('title', 'Administrador'); ?>

<?php $__env->startSection('content'); ?>
    <section class="section_grid">
        <div class="grid_1">
            <div class="item_grid_1 box-light">
                <div class="icon_card card-2">
                    <i class="fa-sharp fa-solid fa-user"></i>
                </div>
                <div class="info_card">
                    <p>Usuarios</p>
                    <span id="totalUsers"></span>
                </div>
            </div>
            <div class="item_grid_1 box-light">
                <div class="icon_card card-3">
                    <i class="fa-solid fa-wifi"></i>
                </div>
                <div class="info_card">
                    <p>Activos</p>
                    <span id="totalUsersActivos"></span>
                </div>
            </div>
            <div class="item_grid_1 box-light">
                <div class="icon_card card-4">
                    <i class="fa-solid fa-wifi-slash"></i>
                </div>
                <div class="info_card">
                    <p>No activos</p>
                    <span id="totalUsersInactivos"></span>
                </div>
            </div>

        </div>
    </section>

    <script>
        $(document).ready(function() {
            user_count();
        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('administrador.layout.admi_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Proyectos\qori\resources\views/administrador/pages/inicio.blade.php ENDPATH**/ ?>