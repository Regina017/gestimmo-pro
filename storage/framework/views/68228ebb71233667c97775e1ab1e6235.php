

<?php $__env->startSection('content'); ?>

<div class="container">

    <h1>Modifier un bien</h1>

    <form method="POST"
          action="<?php echo e(route('biens.update', $bien)); ?>">

        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="mb-3">
            <label>Référence</label>
            <input type="text"
                   name="reference"
                   value="<?php echo e($bien->reference); ?>"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Type</label>
            <input type="text"
                   name="type"
                   value="<?php echo e($bien->type); ?>"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Adresse</label>
            <input type="text"
                   name="adresse"
                   value="<?php echo e($bien->adresse); ?>"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Loyer</label>
            <input type="number"
                   name="loyer"
                   value="<?php echo e($bien->loyer); ?>"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Caution</label>
            <input type="number"
                   name="caution"
                   value="<?php echo e($bien->caution); ?>"
                   class="form-control">
        </div>

        <button class="btn btn-primary">
            Mettre à jour
        </button>

    </form>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\gestimmo-pro\resources\views\biens\edit.blade.php ENDPATH**/ ?>