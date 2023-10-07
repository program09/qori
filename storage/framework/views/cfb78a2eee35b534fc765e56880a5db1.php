<?php echo $__env->make('layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('administrador.layout.admi_aside', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<div class="conten_main">

    <?php echo $__env->make('layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <main class="main">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="fa-solid fa-house"></i></a></li>
            <li class="breadcrumb-item active"><?php echo $__env->yieldContent('title'); ?></li>
        </ul>

        <?php echo $__env->yieldContent('content'); ?>

    </main>

</div>


<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\Proyectos\qori\resources\views/administrador/layout/admi_header.blade.php ENDPATH**/ ?>