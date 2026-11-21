

<?php $__env->startSection('content'); ?>

<div class="container">

    <h2>Détails Immeuble</h2>

    <div class="card">

        <div class="card-body">

            <p><strong>Nom :</strong> <?php echo e($immeuble->nom); ?></p>

            <p><strong>Adresse :</strong> <?php echo e($immeuble->adresse); ?></p>

            <p><strong>Ville :</strong> <?php echo e($immeuble->ville); ?></p>

            <p><strong>Description :</strong> <?php echo e($immeuble->description); ?></p>

        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\gestimmo-pro\resources\views\immeubles\show.blade.php ENDPATH**/ ?>