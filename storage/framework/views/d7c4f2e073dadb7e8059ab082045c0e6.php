

<?php $__env->startSection('content'); ?>

<div class="container">

    <div class="card shadow">

        <div class="card-header bg-warning">

            <h4 class="mb-0">
                ✏ Modifier le paiement
            </h4>

        </div>

        <div class="card-body">

            <form
                action="<?php echo e(route('paiements.update',$paiement)); ?>"
                method="POST">

                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div class="mb-3">

                    <label class="form-label">
                        Contrat
                    </label>

                    <select
                        name="contrat_id"
                        class="form-control">

                        <?php $__currentLoopData = $contrats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contrat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <option
                                value="<?php echo e($contrat->id); ?>"
                                <?php if(
                                    $paiement->contrat_id == $contrat->id
                                ): echo 'selected'; endif; ?>>

                                Contrat #<?php echo e($contrat->id); ?>


                            </option>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </select>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Date paiement
                    </label>

                    <input
                        type="date"
                        name="date_paiement"
                        value="<?php echo e($paiement->date_paiement); ?>"
                        class="form-control">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Montant
                    </label>

                    <input
                        type="number"
                        step="0.01"
                        name="montant"
                        value="<?php echo e($paiement->montant); ?>"
                        class="form-control">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Mode de paiement
                    </label>

                    <select
                        name="mode_paiement"
                        class="form-control">

                        <option value="Espèces"
                            <?php if($paiement->mode_paiement=='Espèces'): echo 'selected'; endif; ?>>
                            Espèces
                        </option>

                        <option value="Virement"
                            <?php if($paiement->mode_paiement=='Virement'): echo 'selected'; endif; ?>>
                            Virement
                        </option>

                        <option value="Chèque"
                            <?php if($paiement->mode_paiement=='Chèque'): echo 'selected'; endif; ?>>
                            Chèque
                        </option>

                        <option value="Carte bancaire"
                            <?php if($paiement->mode_paiement=='Carte bancaire'): echo 'selected'; endif; ?>>
                            Carte bancaire
                        </option>

                    </select>

                </div>

                <button
                    type="submit"
                    class="btn btn-primary">

                    Mettre à jour

                </button>

                <a
                    href="<?php echo e(route('paiements.show',$paiement)); ?>"
                    class="btn btn-secondary">

                    Retour

                </a>

            </form>

        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\gestimmo-pro\resources\views\paiements\edit.blade.php ENDPATH**/ ?>