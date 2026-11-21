

<?php $__env->startSection('content'); ?>

<h1 class="mb-4">

    📅 Échéancier des loyers

</h1>

<div class="card">

    <div class="card-body">

        <table class="table table-bordered table-striped">

            <thead>

                <tr>

                    <th>Locataire</th>

                    <th>Bien</th>

                    <th>Loyer</th>

                    <th>Date fin</th>

                    <th>Statut</th>

                </tr>

            </thead>

            <tbody>

                <?php $__empty_1 = true; $__currentLoopData = $occupations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $occupation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                    <tr>

                        <td>

                            <?php echo e($occupation->locataire->prenom ?? ''); ?>

                            <?php echo e($occupation->locataire->nom ?? ''); ?>


                        </td>

                        <td>

                            <?php echo e($occupation->bien->reference ?? ''); ?>

                            -
                            <?php echo e($occupation->bien->type ?? ''); ?>


                        </td>

                        <td>

                            <?php echo e(number_format($occupation->bien->loyer ?? 0, 2)); ?> $

                        </td>

                        <td>

                            <?php echo e($occupation->date_sortie ?? 'Indéterminée'); ?>


                        </td>

                        <td>

                            <?php if(
                                $occupation->date_sortie &&
                                strtotime($occupation->date_sortie) < time()
                            ): ?>

                                <span class="badge bg-danger">

                                    🔴 En retard

                                </span>

                            <?php elseif(
                                $occupation->date_sortie &&
                                strtotime($occupation->date_sortie) <= strtotime('+30 days')
                            ): ?>

                                <span class="badge bg-warning text-dark">

                                    🟠 Expire bientôt

                                </span>

                            <?php else: ?>

                                <span class="badge bg-success">

                                    ✅ Actif

                                </span>

                            <?php endif; ?>

                        </td>

                    </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                    <tr>

                        <td colspan="5">

                            Aucun enregistrement trouvé

                        </td>

                    </tr>

                <?php endif; ?>

            </tbody>

        </table>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\gestimmo-pro\resources\views\echeancier\index.blade.php ENDPATH**/ ?>