

<?php $__env->startSection('content'); ?>

<div class="container">

    <h2>Modifier contrat</h2>

    <form action="<?php echo e(route('contrats.update',$contrat)); ?>" method="POST">

        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="mb-3">

            <label>Loyer</label>

            <input
                type="number"
                step="0.01"
                name="loyer"
                value="<?php echo e($contrat->loyer); ?>"
                class="form-control">

        </div>

        <button class="btn btn-primary">
            Mettre à jour
        </button>

    </form>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\gestimmo-pro\resources\views\contrats\edit.blade.php ENDPATH**/ ?>