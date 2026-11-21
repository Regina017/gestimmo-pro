

<?php $__env->startSection('content'); ?>

<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>🚪 Gestion des logements</h2>

        <a
            href="<?php echo e(route('logements.create')); ?>"
            class="btn btn-primary">

            Nouveau logement

        </a>

    </div>

    <?php if(session('success')): ?>

        <div class="alert alert-success">

            <?php echo e(session('success')); ?>


        </div>

    <?php endif; ?>

    <div class="card shadow">

        <div class="card-body">

            <table class="table table-bordered table-striped">

                <thead class="table-dark">

                    <tr>

                        <th>ID</th>
                        <th>Immeuble</th>
                        <th>Numéro</th>
                        <th>Type</th>
                        <th>Loyer</th>
                        <th>Statut</th>
                        <th width="250">Actions</th>

                    </tr>

                </thead>

                <tbody>

                    <?php $__empty_1 = true; $__currentLoopData = $logements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $logement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                        <tr>

                            <td>
                                <?php echo e($logement->id); ?>

                            </td>

                            <td>
                                <?php echo e($logement->immeuble->nom ?? 'Aucun immeuble'); ?>

                            </td>

                            <td>
                                <?php echo e($logement->numero); ?>

                            </td>

                            <td>
                                <?php echo e($logement->type); ?>

                            </td>

                            <td>
                                <?php echo e(number_format($logement->loyer, 2, ',', ' ')); ?> $
                            </td>

                            <td>

                                <?php if(($logement->statut ?? '') === 'Occupé'): ?>

                                    <span class="badge bg-success">

                                        Occupé

                                    </span>

                                <?php else: ?>

                                    <span class="badge bg-warning text-dark">

                                        Vacant

                                    </span>

                                <?php endif; ?>

                            </td>

                            <td>

                                <a
                                    href="<?php echo e(route('logements.show', $logement)); ?>"
                                    class="btn btn-info btn-sm">

                                    Voir

                                </a>

                                <a
                                    href="<?php echo e(route('logements.edit', $logement)); ?>"
                                    class="btn btn-warning btn-sm">

                                    Modifier

                                </a>

                                <form
                                    action="<?php echo e(route('logements.destroy', $logement)); ?>"
                                    method="POST"
                                    class="d-inline">

                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>

                                    <button
                                        type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Supprimer ce logement ?')">

                                        Supprimer

                                    </button>

                                </form>

                            </td>

                        </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                        <tr>

                            <td
                                colspan="7"
                                class="text-center text-muted">

                                Aucun logement enregistré

                            </td>

                        </tr>

                    <?php endif; ?>

                </tbody>

            </table>

            <div class="mt-3">

                <?php echo e($logements->links()); ?>


            </div>

        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\gestimmo-pro\resources\views\logements\index.blade.php ENDPATH**/ ?>