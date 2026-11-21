

<?php $__env->startSection('content'); ?>

<div class="container-fluid">

    <div class="card shadow-sm border-0 mb-4">

        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <h2 class="fw-bold mb-0">

                        <i class="fas fa-money-bill-wave text-success"></i>

                        Gestion des Paiements

                    </h2>

                    <small class="text-muted">

                        Encaissements et suivi des loyers

                    </small>

                </div>

                <div>

                    <a href="<?php echo e(route('export.paiements')); ?>"
                       class="btn btn-success">

                        <i class="fas fa-file-excel"></i>

                        Export Excel

                    </a>

                    <a href="<?php echo e(route('paiements.create')); ?>"
                       class="btn btn-primary">

                        <i class="fas fa-plus"></i>

                        Nouveau paiement

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

                    <th>Contrat</th>

                    <th>Date</th>

                    <th>Montant</th>

                    <th>Mode</th>

                    <th width="420">
                        Actions
                    </th>

                </tr>

                </thead>

                <tbody>

                <?php $__empty_1 = true; $__currentLoopData = $paiements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paiement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                    <tr>

                        <td>
                            <?php echo e($paiement->id); ?>

                        </td>

                        <td>
                            <?php echo e($paiement->contrat_id); ?>

                        </td>

                        <td>
                            <?php echo e($paiement->date_paiement); ?>

                        </td>

                        <td class="fw-bold text-success">

                            <?php echo e(number_format($paiement->montant,2)); ?>


                        </td>

                        <td>

                            <span class="badge bg-primary">

                                <?php echo e($paiement->mode_paiement); ?>


                            </span>

                        </td>

                        <td>

                            <a href="<?php echo e(route('paiements.show',$paiement)); ?>"
                               class="btn btn-info btn-sm">

                                <i class="fas fa-eye"></i>

                            </a>

                            <a href="<?php echo e(route('paiements.edit',$paiement)); ?>"
                               class="btn btn-warning btn-sm">

                                <i class="fas fa-pen"></i>

                            </a>

                            <a href="<?php echo e(route('paiements.recu',$paiement)); ?>"
                               class="btn btn-danger btn-sm">

                                <i class="fas fa-file-pdf"></i>

                                Reçu

                            </a>

                            <a href="<?php echo e(route('paiements.quittance',$paiement)); ?>"
                               class="btn btn-success btn-sm">

                                <i class="fas fa-file-pdf"></i>

                                Quittance

                            </a>

                            <form action="<?php echo e(route('paiements.destroy',$paiement)); ?>"
                                  method="POST"
                                  class="d-inline">

                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>

                                <button
                                    class="btn btn-outline-danger btn-sm"
                                    onclick="return confirm('Supprimer ce paiement ?')">

                                    <i class="fas fa-trash"></i>

                                </button>

                            </form>

                        </td>

                    </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                    <tr>

                        <td colspan="6"
                            class="text-center">

                            Aucun paiement enregistré

                        </td>

                    </tr>

                <?php endif; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\gestimmo-pro\resources\views\paiements\index.blade.php ENDPATH**/ ?>