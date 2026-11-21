

<?php $__env->startSection('content'); ?>

<div class="container-fluid">

    <div class="card shadow-sm border-0 mb-4">

        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <h2 class="fw-bold mb-0">

                        <i class="fas fa-file-signature text-primary"></i>

                        Gestion des Contrats

                    </h2>

                    <small class="text-muted">

                        Gestion des baux et contrats de location

                    </small>

                </div>

                <div>

                    <a href="<?php echo e(route('export.contrats')); ?>"
                       class="btn btn-success">

                        <i class="fas fa-file-excel"></i>

                        Export Excel

                    </a>

                    <a href="<?php echo e(route('contrats.create')); ?>"
                       class="btn btn-primary">

                        <i class="fas fa-plus"></i>

                        Nouveau contrat

                    </a>

                </div>

            </div>

        </div>

    </div>

    <?php if(session('success')): ?>

        <div class="alert alert-success alert-dismissible fade show">

            <?php echo e(session('success')); ?>


            <button
                class="btn-close"
                data-bs-dismiss="alert">
            </button>

        </div>

    <?php endif; ?>

    <div class="card shadow border-0">

        <div class="card-body table-responsive">

            <table class="table table-hover align-middle">

                <thead class="table-dark">

                <tr>

                    <th>ID</th>

                    <th>Date début</th>

                    <th>Date fin</th>

                    <th>Loyer</th>

                    <th>Statut</th>

                    <th width="300">
                        Actions
                    </th>

                </tr>

                </thead>

                <tbody>

                <?php $__empty_1 = true; $__currentLoopData = $contrats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contrat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                    <tr>

                        <td>
                            <?php echo e($contrat->id); ?>

                        </td>

                        <td>
                            <?php echo e($contrat->date_debut); ?>

                        </td>

                        <td>
                            <?php echo e($contrat->date_fin); ?>

                        </td>

                        <td class="fw-bold text-success">

                            <?php echo e(number_format($contrat->loyer, 2)); ?>


                        </td>

                        <td>

                            <?php if($contrat->statut == 'Actif'): ?>

                                <span class="badge bg-success">

                                    Actif

                                </span>

                            <?php else: ?>

                                <span class="badge bg-secondary">

                                    <?php echo e($contrat->statut); ?>


                                </span>

                            <?php endif; ?>

                        </td>

                        <td>

                            <a href="<?php echo e(route('contrats.show',$contrat)); ?>"
                               class="btn btn-info btn-sm">

                                <i class="fas fa-eye"></i>

                            </a>

                            <a href="<?php echo e(route('contrats.edit',$contrat)); ?>"
                               class="btn btn-warning btn-sm">

                                <i class="fas fa-pen"></i>

                            </a>

                            <a href="<?php echo e(route('contrats.pdf',$contrat)); ?>"
                               class="btn btn-secondary btn-sm">

                                <i class="fas fa-file-pdf"></i>

                            </a>

                            <form action="<?php echo e(route('contrats.destroy',$contrat)); ?>"
                                  method="POST"
                                  class="d-inline">

                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>

                                <button
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Supprimer ce contrat ?')">

                                    <i class="fas fa-trash"></i>

                                </button>

                            </form>

                        </td>

                    </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                    <tr>

                        <td colspan="6"
                            class="text-center">

                            Aucun contrat enregistré

                        </td>

                    </tr>

                <?php endif; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\gestimmo-pro\resources\views\contrats\index.blade.php ENDPATH**/ ?>