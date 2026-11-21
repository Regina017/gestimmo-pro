

<?php $__env->startSection('content'); ?>

<div class="container">

    <h1>Ajouter un bien</h1>

    <form method="POST" action="<?php echo e(route('biens.store')); ?>">

        <?php echo csrf_field(); ?>

        <div class="mb-3">
            <label>Référence</label>
            <input type="text"
                   name="reference"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Type</label>
            <input type="text"
                   name="type"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Adresse</label>
            <input type="text"
                   name="adresse"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Loyer</label>
            <input type="number"
                   name="loyer"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Caution</label>
            <input type="number"
                   name="caution"
                   class="form-control">
        </div>

        <button class="btn btn-success">
            Enregistrer
        </button>

    </form>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\gestimmo-pro\resources\views\biens\create.blade.php ENDPATH**/ ?>