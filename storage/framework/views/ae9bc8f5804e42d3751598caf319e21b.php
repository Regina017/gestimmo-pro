

<?php $__env->startSection('content'); ?>

<div class="container">

    <div class="d-flex justify-content-between mb-3">
        <h2>Propriétaires</h2>

        <a href="<?php echo e(route('proprietaires.create')); ?>"
           class="btn btn-primary">
            Nouveau propriétaire
        </a>
    </div>

    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Téléphone</th>
                <th>Email</th>
                <th width="220">Actions</th>
            </tr>
        </thead>

        <tbody>

        <?php $__empty_1 = true; $__currentLoopData = $proprietaires; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proprietaire): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

            <tr>
                <td><?php echo e($proprietaire->id); ?></td>
                <td><?php echo e($proprietaire->nom); ?></td>
                <td><?php echo e($proprietaire->prenom); ?></td>
                <td><?php echo e($proprietaire->telephone); ?></td>
                <td><?php echo e($proprietaire->email); ?></td>

                <td>

                    <a href="<?php echo e(route('proprietaires.show',$proprietaire)); ?>"
                       class="btn btn-info btn-sm">
                        Voir
                    </a>

                    <a href="<?php echo e(route('proprietaires.edit',$proprietaire)); ?>"
                       class="btn btn-warning btn-sm">
                        Modifier
                    </a>

                    <form
                        action="<?php echo e(route('proprietaires.destroy',$proprietaire)); ?>"
                        method="POST"
                        class="d-inline">

                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>

                        <button
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('Supprimer ?')">

                            Supprimer

                        </button>

                    </form>

                </td>

            </tr>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

            <tr>
                <td colspan="6" class="text-center">
                    Aucun propriétaire trouvé
                </td>
            </tr>

        <?php endif; ?>

        </tbody>

    </table>

    <?php echo e($proprietaires->links()); ?>


</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\gestimmo-pro\resources\views\proprietaires\index.blade.php ENDPATH**/ ?>