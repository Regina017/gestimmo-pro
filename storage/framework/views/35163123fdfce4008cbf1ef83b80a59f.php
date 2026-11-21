

<?php $__env->startSection('content'); ?>

<div class="container">

    <div class="card">

        <div class="card-header">
            Détails logement
        </div>

        <div class="card-body">

            <p><strong>Numéro :</strong> <?php echo e($logement->numero); ?></p>

            <p><strong>Type :</strong> <?php echo e($logement->type); ?></p>

            <p><strong>Loyer :</strong> <?php echo e($logement->loyer); ?></p>

            <p><strong>Statut :</strong> <?php echo e($logement->statut); ?></p>

        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\gestimmo-pro\resources\views\logements\show.blade.php ENDPATH**/ ?>