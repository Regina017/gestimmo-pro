

<?php $__env->startSection('content'); ?>

<div class="container">

    <div class="row">

        <div class="col-md-8 mx-auto">

            <div class="card shadow">

                <div class="card-header bg-primary text-white">

                    <h4 class="mb-0">
                        💰 Détails du paiement
                    </h4>

                </div>

                <div class="card-body">

                    <table class="table table-bordered">

                        <tr>
                            <th width="35%">
                                ID
                            </th>

                            <td>
                                <?php echo e($paiement->id); ?>

                            </td>
                        </tr>

                        <tr>
                            <th>
                                Contrat
                            </th>

                            <td>
                                <?php echo e($paiement->contrat_id); ?>

                            </td>
                        </tr>

                        <tr>
                            <th>
                                Date de paiement
                            </th>

                            <td>
                                <?php echo e($paiement->date_paiement); ?>

                            </td>
                        </tr>

                        <tr>
                            <th>
                                Montant
                            </th>

                            <td>
                                <?php echo e(number_format($paiement->montant, 2)); ?> $
                            </td>
                        </tr>

                        <tr>
                            <th>
                                Mode de paiement
                            </th>

                            <td>
                                <?php echo e($paiement->mode_paiement); ?>

                            </td>
                        </tr>

                    </table>

                    <div class="mt-4">

                        <a
                            href="<?php echo e(route('paiements.recu', $paiement)); ?>"
                            class="btn btn-danger">

                            📄 Reçu PDF

                        </a>

                        <a
                            href="<?php echo e(route('paiements.quittance', $paiement)); ?>"
                            class="btn btn-success">

                            📑 Quittance PDF

                        </a>

                        <a
                            href="<?php echo e(route('paiements.edit', $paiement)); ?>"
                            class="btn btn-warning">

                            Modifier

                        </a>

                        <a
                            href="<?php echo e(route('paiements.index')); ?>"
                            class="btn btn-secondary">

                            Retour

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\gestimmo-pro\resources\views\paiements\show.blade.php ENDPATH**/ ?>