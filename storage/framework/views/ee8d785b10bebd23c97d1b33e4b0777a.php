



<?php $__env->startSection('title', 'Crear tienda'); ?>

<?php $__env->startSection('content'); ?>

<section class="section_setting">

    <div class="setting_sect box-light">
        <h2>Crear tienda</h2>

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
            </div><br>
            <p>Logo</p>
            <div  class="logo_store">
                <label for="input_logo">
                    <div class="prev_logo" id="img_store">
                        <img src="https://img.freepik.com/free-vector/hand-drawn-shop-local-logo-design_23-2149575766.jpg"
                            alt="" class="img_logo" id="preview_image">
                    </div>
                </label>
                <input type="file" id="input_logo" style="display: none;" accept="image/*"
                    onchange="previewImage(this)">
                <div id="updateButtons">
                    <div class="adtp">
                        <button >Crear tienda</button>
                        <a href="<?php echo e(route('home')); ?>">Cancelar</a>
                    </div>
                </div>
            </div>
        </form>
    </div>

</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('usuarios.layout.user_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Proyectos\qori\resources\views/usuarios/pages/create_store.blade.php ENDPATH**/ ?>