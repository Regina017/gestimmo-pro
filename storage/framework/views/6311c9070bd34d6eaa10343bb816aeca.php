

<?php $__env->startSection('content'); ?>

<h1 class="mb-4">

    🔎 Recherche globale

</h1>

<form
    action="<?php echo e(route('recherche.index')); ?>"
    method="GET"
>

    <div class="input-group mb-4">

        <input
            type="text"
            name="mot"
            class="form-control"
            placeholder="Nom, référence, adresse, téléphone..."
            value="<?php echo e($mot); ?>"
        >

        <button
            type="submit"
            class="btn btn-primary"
        >

            Rechercher

        </button>

    </div>

</form>

<?php if($mot): ?>

    <div class="card mb-4">

        <div class="card-header">

            🏠 Biens

        </div>

        <div class="card-body">

            <?php $__empty_1 = true; $__currentLoopData = $biens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bien): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                <div>

                    <?php echo e($bien->reference); ?>

                    -
                    <?php echo e($bien->adresse); ?>


                </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                <div>

                    Aucun bien trouvé

                </div>

            <?php endif; ?>

        </div>

    </div>

    <div class="card mb-4">

        <div class="card-header">

            👤 Locataires

        </div>

        <div class="card-body">

            <?php $__empty_1 = true; $__currentLoopData = $locataires; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locataire): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                <div>

                    <?php echo e($locataire->prenom); ?>

                    <?php echo e($locataire->nom); ?>


                    -

                    <?php echo e($locataire->telephone); ?>


                </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                <div>

                    Aucun locataire trouvé

                </div>

            <?php endif; ?>

        </div>

    </div>

    <div class="card mb-4">

        <div class="card-header">

            💰 Paiements

        </div>

        <div class="card-body">

            <?php $__empty_1 = true; $__currentLoopData = $paiements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paiement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                <div>

                    <?php echo e($paiement->date_paiement); ?>

                    -

                    <?php echo e(number_format($paiement->montant, 2)); ?> $

                </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                <div>

                    Aucun paiement trouvé

                </div>

            <?php endif; ?>

        </div>

    </div>

    <div class="card mb-4">

        <div class="card-header">

            💸 Dépenses

        </div>

        <div class="card-body">

            <?php $__empty_1 = true; $__currentLoopData = $depenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $depense): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                <div>

                    <?php echo e($depense->libelle); ?>


                    -

                    <?php echo e(number_format($depense->montant, 2)); ?> $

                </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                <div>

                    Aucune dépense trouvée

                </div>

            <?php endif; ?>

        </div>

    </div>

<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\gestimmo-pro\resources\views\recherche\index.blade.php ENDPATH**/ ?>