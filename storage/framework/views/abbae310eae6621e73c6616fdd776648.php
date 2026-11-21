

<?php $__env->startSection('content'); ?>

<div class="container">

    <h2>Nouvel immeuble</h2>

    <form action="<?php echo e(route('immeubles.store')); ?>" method="POST">

        <?php echo csrf_field(); ?>

        <div class="mb-3">
            <label>Propriétaire</label>

            <select
                name="proprietaire_id"
                class="form-control">

                <?php $__currentLoopData = $proprietaires; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proprietaire): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <option value="<?php echo e($proprietaire->id); ?>">
                        <?php echo e($proprietaire->nom); ?>

                        <?php echo e($proprietaire->prenom); ?>

                    </option>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </select>
        </div>

        <div class="mb-3">
            <label>Nom</label>
            <input type="text"
                   name="nom"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Adresse</label>
            <input type="text"
                   name="adresse"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Ville</label>
            <input type="text"
                   name="ville"
                   class="form-control">
        </div>

        <button class="btn btn-success">
            Enregistrer
        </button>

    </form>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\gestimmo-pro\resources\views\immeubles\create.blade.php ENDPATH**/ ?>