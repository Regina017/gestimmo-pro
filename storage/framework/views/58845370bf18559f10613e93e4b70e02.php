

<?php $__env->startSection('content'); ?>

<div class="container-fluid">

    <div class="card shadow-sm border-0 mb-4">

        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <h2 class="fw-bold mb-0">

                        <i class="fas fa-receipt text-danger"></i>

                        Gestion des Dépenses

                    </h2>

                    <small class="text-muted">

                        Suivi des dépenses de l'entreprise

                    </small>

                </div>

                <div>

                    <a href="<?php echo e(route('export.depenses')); ?>"
                       class="btn btn-success">

                        <i class="fas fa-file-excel"></i>

                        Export Excel

                    </a>

                    <a href="<?php echo e(route('depenses.create')); ?>"
                       class="btn btn-primary">

                        <i class="fas fa-plus"></i>

                        Nouvelle dépense

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

                    <th>Date</th>

                    <th>Catégorie</th>

                    <th>Libellé</th>

                    <th>Montant</th>

                </tr>

                </thead>

                <tbody>

                <?php $__empty_1 = true; $__currentLoopData = $depenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $depense): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                    <tr>

                        <td>
                            <?php echo e($depense->date_depense); ?>

                        </td>

                        <td>
                            <span class="badge bg-info">
                                <?php echo e($depense->categorie); ?>

                            </span>
                        </td>

                        <td>
                            <?php echo e($depense->libelle); ?>

                        </td>

                        <td class="fw-bold text-danger">

                            <?php echo e(number_format($depense->montant,2)); ?>


                        </td>

                    </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                    <tr>

                        <td colspan="4" class="text-center">

                            Aucune dépense enregistrée

                        </td>

                    </tr>

                <?php endif; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\gestimmo-pro\resources\views\depenses\index.blade.php ENDPATH**/ ?>