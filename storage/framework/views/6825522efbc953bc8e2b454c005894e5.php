

<?php $__env->startSection('content'); ?>

<div class="container">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">

            <h4 class="mb-0">
                💰 Nouveau paiement
            </h4>

        </div>

        <div class="card-body">

            <form
                action="<?php echo e(route('paiements.store')); ?>"
                method="POST">

                <?php echo csrf_field(); ?>

                <div class="mb-3">

                    <label class="form-label">
                        Contrat
                    </label>

                    <select
                        name="contrat_id"
                        class="form-control"
                        required>

                        <option value="">
                            Sélectionner
                        </option>

                        <?php $__currentLoopData = $contrats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contrat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <option
                                value="<?php echo e($contrat->id); ?>">

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
                        class="form-control"
                        required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Montant
                    </label>

                    <input
                        type="number"
                        step="0.01"
                        name="montant"
                        class="form-control"
                        required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Mode de paiement
                    </label>

                    <select
                        name="mode_paiement"
                        class="form-control"
                        required>

                        <option value="Espèces">
                            Espèces
                        </option>

                        <option value="Virement">
                            Virement
                        </option>

                        <option value="Chèque">
                            Chèque
                        </option>

                        <option value="Carte bancaire">
                            Carte bancaire
                        </option>

                    </select>

                </div>

                <button
                    type="submit"
                    class="btn btn-success">

                    Enregistrer

                </button>

                <a
                    href="<?php echo e(route('paiements.index')); ?>"
                    class="btn btn-secondary">

                    Annuler

                </a>

            </form>

        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\gestimmo-pro\resources\views\paiements\create.blade.php ENDPATH**/ ?>