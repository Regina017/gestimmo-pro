

<?php $__env->startSection('content'); ?>

<div class="container-fluid">

    <div class="card shadow-sm border-0 mb-4">

        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center">

                <div>
                    <h2 class="fw-bold mb-0">
                        <i class="fas fa-users text-primary"></i>
                        Gestion des Locataires
                    </h2>

                    <small class="text-muted">
                        Liste complète des locataires enregistrés
                    </small>
                </div>

                <div>

                    <a href="<?php echo e(route('export.locataires')); ?>"
                       class="btn btn-success">

                        <i class="fas fa-file-excel"></i>

                        Export Excel

                    </a>

                    <a href="<?php echo e(route('locataires.create')); ?>"
                       class="btn btn-primary">

                        <i class="fas fa-plus"></i>

                        Nouveau locataire

                    </a>

                </div>

            </div>

        </div>

    </div>

    <div class="card shadow border-0">

        <div class="card-body table-responsive">

            <table class="table table-hover align-middle">

                <thead class="table-dark">

                <tr>

                    <th>ID</th>

                    <th>Nom</th>

                    <th>Téléphone</th>

                    <th>Email</th>

                </tr>

                </thead>

                <tbody>

                <?php $__empty_1 = true; $__currentLoopData = $locataires; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locataire): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                    <tr>

                        <td>
                            <?php echo e($locataire->id); ?>

                        </td>

                        <td>
                            <?php echo e($locataire->nom); ?>

                        </td>

                        <td>
                            <?php echo e($locataire->telephone); ?>

                        </td>

                        <td>
                            <?php echo e($locataire->email); ?>

                        </td>

                    </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                    <tr>

                        <td colspan="4" class="text-center">

                            Aucun locataire enregistré

                        </td>

                    </tr>

                <?php endif; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\gestimmo-pro\resources\views\locataires\index.blade.php ENDPATH**/ ?>