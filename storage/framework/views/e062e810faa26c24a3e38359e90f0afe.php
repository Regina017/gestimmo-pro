

<?php $__env->startSection('content'); ?>

<div class="container">

    <div class="card">

        <div class="card-header">

            Détails du contrat

        </div>

        <div class="card-body">

            <p>
                <strong>Locataire :</strong>

                <?php echo e($contrat->locataire->nom ?? ''); ?>

                <?php echo e($contrat->locataire->prenom ?? ''); ?>

            </p>

            <p>
                <strong>Logement :</strong>

                <?php echo e($contrat->logement->numero ?? ''); ?>

            </p>

            <p>
                <strong>Date début :</strong>

                <?php echo e($contrat->date_debut); ?>

            </p>

            <p>
                <strong>Date fin :</strong>

                <?php echo e($contrat->date_fin); ?>

            </p>

            <p>
                <strong>Loyer :</strong>

                <?php echo e(number_format($contrat->loyer,2)); ?> $
            </p>

            <p>
                <strong>Caution :</strong>

                <?php echo e(number_format($contrat->caution,2)); ?> $
            </p>

            <p>
                <strong>Statut :</strong>

                <?php echo e($contrat->statut); ?>

            </p>

            <hr>

            <a
                href="<?php echo e(route('contrats.pdf',$contrat)); ?>"
                class="btn btn-danger">

                📄 Télécharger le PDF

            </a>

            <a
                href="<?php echo e(route('contrats.index')); ?>"
                class="btn btn-secondary">

                Retour

            </a>

        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\gestimmo-pro\resources\views\contrats\show.blade.php ENDPATH**/ ?>