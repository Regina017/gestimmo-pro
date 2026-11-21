

<?php $__env->startSection('content'); ?>

<div class="container">

    <div class="card shadow">

        <div class="card-header">

            🏢 Détails du propriétaire

        </div>

        <div class="card-body">

            <p>

                <strong>Nom :</strong>

                <?php echo e($proprietaire->nom); ?>


                <?php echo e($proprietaire->prenom); ?>


            </p>

            <p>

                <strong>Téléphone :</strong>

                <?php echo e($proprietaire->telephone); ?>


            </p>

            <p>

                <strong>Email :</strong>

                <?php echo e($proprietaire->email); ?>


            </p>

            <a href="<?php echo e(route('proprietaires.index')); ?>"
               class="btn btn-primary">

                Retour

            </a>

        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\gestimmo-pro\resources\views\proprietaires\show.blade.php ENDPATH**/ ?>