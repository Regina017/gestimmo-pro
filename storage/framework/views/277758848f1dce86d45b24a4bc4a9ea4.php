

<?php $__env->startSection('content'); ?>

<h1>
Nouvelle occupation
</h1>

<form method="POST"
      action="<?php echo e(route('occupations.store')); ?>">

    <?php echo csrf_field(); ?>

    <div class="mb-3">

        <label>Bien</label>

        <select
            name="bien_id"
            class="form-control">

            <?php $__currentLoopData = $biens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bien): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <option
                    value="<?php echo e($bien->id); ?>">

                    <?php echo e($bien->reference); ?>


                </option>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </select>

    </div>

    <div class="mb-3">

        <label>Locataire</label>

        <select
            name="locataire_id"
            class="form-control">

            <?php $__currentLoopData = $locataires; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locataire): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <option
                    value="<?php echo e($locataire->id); ?>">

                    <?php echo e($locataire->nom); ?>


                </option>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </select>

    </div>

    <div class="mb-3">

        <label>Date entrée</label>

        <input
            type="date"
            name="date_entree"
            class="form-control">

    </div>

    <button
        class="btn btn-primary">

        Enregistrer

    </button>

</form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\gestimmo-pro\resources\views\occupations\create.blade.php ENDPATH**/ ?>