

<?php $__env->startSection('content'); ?>

<div class="container">

    <div class="d-flex justify-content-between mb-3">
        <h2>Immeubles</h2>

        <a href="<?php echo e(route('immeubles.create')); ?>" class="btn btn-primary">
            Nouvel immeuble
        </a>
    </div>

    <table class="table table-bordered">

        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Adresse</th>
                <th>Ville</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>

        <?php $__currentLoopData = $immeubles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $immeuble): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <tr>
                <td><?php echo e($immeuble->id); ?></td>
                <td><?php echo e($immeuble->nom); ?></td>
                <td><?php echo e($immeuble->adresse); ?></td>
                <td><?php echo e($immeuble->ville); ?></td>

                <td>

                    <a href="<?php echo e(route('immeubles.show',$immeuble)); ?>" class="btn btn-info btn-sm">
                        Voir
                    </a>

                    <a href="<?php echo e(route('immeubles.edit',$immeuble)); ?>" class="btn btn-warning btn-sm">
                        Modifier
                    </a>

                    <form action="<?php echo e(route('immeubles.destroy',$immeuble)); ?>"
                          method="POST"
                          class="d-inline">

                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>

                        <button class="btn btn-danger btn-sm">
                            Supprimer
                        </button>

                    </form>

                </td>

            </tr>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>

    </table>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\gestimmo-pro\resources\views\immeubles\index.blade.php ENDPATH**/ ?>