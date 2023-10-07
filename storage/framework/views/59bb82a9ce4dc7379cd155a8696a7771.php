



<?php $__env->startSection('title', 'Categorías'); ?>

<?php $__env->startSection('content'); ?>



<section class="section_grid">
    <div class="grid_1">
        <div class="item_grid_1  box-light">
            <div class="icon_card card-1">
                <i class="fa-solid fa-list"></i>
            </div>
            <div class="info_card">
                <p>Categorías</p>
                <span>1212</span>
            </div>
        </div>

        <div class="item_grid_1  box-light">
            <div class="icon_card card-3">
                <i class="fa-sharp fa-solid fa-wifi"></i>
            </div>
            <div class="info_card">
                <p>Activos</p>
                <span>1212</span>
            </div>
        </div>

        <div class="item_grid_1  box-light">
            <div class="icon_card card-4">
                <i class="fa-sharp fa-solid fa-wifi-slash"></i>
            </div>
            <div class="info_card">
                <p>Inactivos</p>
                <span>1212</span>
            </div>
        </div>

    </div>
</section>

<section class="section_tables box-light">
    <div class="header_table d-flex align-items-center justify-content-between">
        <h3>Categorías</h3>
        <a href="">
            <button class="add_new">
                <i class="fa-light fa-plus"></i> Agregar nuevo
            </button>
        </a>
    </div>

    <div class="table-responsive">
        <table class="table" id="table">
            <thead>
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr class="">
                    <td scope="row">Cliente</td>
                    <td>R1C2</td>
                    <td>R1C3</td>
                    <td>R1C2</td>
                </tr>
            </tbody>
        </table>
    </div>

</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('tienda.layout.store', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Proyectos\qori\resources\views/tienda/pages/categorias.blade.php ENDPATH**/ ?>