

<?php $__env->startSection('content'); ?>

<div class="container">

    <h2>Modifier immeuble</h2>

    <form action="<?php echo e(route('immeubles.update',$immeuble)); ?>" method="POST">

        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="mb-3">
            <label>Nom</label>
            <input type="text"
                   name="nom"
                   value="<?php echo e($immeuble->nom); ?>"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Adresse</label>
            <input type="text"
                   name="adresse"
                   value="<?php echo e($immeuble->adresse); ?>"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Ville</label>
            <input type="text"
                   name="ville"
                   value="<?php echo e($immeuble->ville); ?>"
                   class="form-control">
        </div>

        <button class="btn btn-primary">
            Mettre à jour
        </button>

    </form>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\gestimmo-pro\resources\views\immeubles\edit.blade.php ENDPATH**/ ?>