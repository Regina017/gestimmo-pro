

<?php $__env->startSection('content'); ?>

<h1>Approbations</h1>

<table class="table table-bordered">

    <thead>

        <tr>

            <th>Module</th>
            <th>Action</th>
            <th>Utilisateur</th>
            <th>Statut</th>
            <th>Actions</th>

        </tr>

    </thead>

    <tbody>

    <?php $__currentLoopData = $approbations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $approbation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <tr>

            <td><?php echo e($approbation->module); ?></td>

            <td><?php echo e($approbation->action); ?></td>

            <td><?php echo e($approbation->utilisateur); ?></td>

            <td><?php echo e($approbation->statut); ?></td>

            <td>

                <a
                    href="<?php echo e(route('approbations.approve', $approbation->id)); ?>"
                    class="btn btn-success btn-sm">

                    Approuver

                </a>

                <a
                    href="<?php echo e(route('approbations.reject', $approbation->id)); ?>"
                    class="btn btn-danger btn-sm">

                    Refuser

                </a>

            </td>

        </tr>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </tbody>

</table>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\gestimmo-pro\resources\views\approbations\index.blade.php ENDPATH**/ ?>