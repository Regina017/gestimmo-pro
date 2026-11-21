

<?php $__env->startSection('content'); ?>

<h1>
Gestion des occupations
</h1>

<a href="<?php echo e(route('occupations.create')); ?>"
   class="btn btn-success mb-3">

    Nouvelle occupation

</a>

<table class="table table-bordered">

    <thead>

        <tr>

            <th>Bien</th>
            <th>Locataire</th>
            <th>Date entrée</th>
            <th>Statut</th>

        </tr>

    </thead>

    <tbody>

        <?php $__empty_1 = true; $__currentLoopData = $occupations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $occupation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

            <tr>

                <td>
                    <?php echo e($occupation->bien->reference); ?>

                </td>

                <td>
                    <?php echo e($occupation->locataire->nom); ?>

                </td>

                <td>
                    <?php echo e($occupation->date_entree); ?>

                </td>

                <td>
                    <?php echo e($occupation->statut); ?>

                </td>

            </tr>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

            <tr>

                <td colspan="4">

                    Aucune occupation

                </td>

            </tr>

        <?php endif; ?>

    </tbody>

</table>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\gestimmo-pro\resources\views\occupations\index.blade.php ENDPATH**/ ?>