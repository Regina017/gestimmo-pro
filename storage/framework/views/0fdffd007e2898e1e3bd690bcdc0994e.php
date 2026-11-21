

<?php $__env->startSection('content'); ?>

<div class="container">

    <h1 class="mb-4">
        Gestion des biens
    </h1>

    <a href="<?php echo e(route('biens.create')); ?>"
       class="btn btn-success mb-3">
        Ajouter un bien
    </a>

    <table class="table table-bordered table-striped">

        <thead>

            <tr>

                <th>Référence</th>
                <th>Type</th>
                <th>Adresse</th>
                <th>Loyer</th>
                <th>Caution</th>
                <th>Statut</th>
                <th>Actions</th>

            </tr>

        </thead>

        <tbody>

            <?php $__empty_1 = true; $__currentLoopData = $biens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bien): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                <tr>

                    <td><?php echo e($bien->reference); ?></td>

                    <td><?php echo e($bien->type); ?></td>

                    <td><?php echo e($bien->adresse); ?></td>

                    <td><?php echo e($bien->loyer); ?></td>

                    <td><?php echo e($bien->caution); ?></td>

                    <td><?php echo e($bien->statut); ?></td>

                    <td>

                        <a href="<?php echo e(route('biens.edit', $bien)); ?>"
                           class="btn btn-warning btn-sm">
                            Modifier
                        </a>

                        <form method="POST"
                              action="<?php echo e(route('biens.destroy', $bien)); ?>"
                              style="display:inline;">

                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>

                            <button type="submit"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Supprimer ce bien ?')">

                                Supprimer

                            </button>

                        </form>

                    </td>

                </tr>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                <tr>

                    <td colspan="7" class="text-center">

                        Aucun bien enregistré

                    </td>

                </tr>

            <?php endif; ?>

        </tbody>

    </table>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\gestimmo-pro\resources\views\biens\index.blade.php ENDPATH**/ ?>