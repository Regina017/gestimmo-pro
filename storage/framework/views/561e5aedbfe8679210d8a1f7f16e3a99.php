

<?php $__env->startSection('content'); ?>

<div class="container">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">

            <h4 class="mb-0">

                📄 Nouveau contrat

            </h4>

        </div>

        <div class="card-body">

            <?php if($errors->any()): ?>

                <div class="alert alert-danger">

                    <ul class="mb-0">

                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <li><?php echo e($error); ?></li>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </ul>

                </div>

            <?php endif; ?>

            <form
                action="<?php echo e(route('contrats.store')); ?>"
                method="POST">

                <?php echo csrf_field(); ?>

                <div class="row">

                    <div class="col-md-6">

                        <div class="mb-3">

                            <label class="form-label">

                                Locataire

                            </label>

                            <select
                                name="locataire_id"
                                class="form-select"
                                required>

                                <option value="">
                                    -- Sélectionner --
                                </option>

                                <?php $__currentLoopData = $locataires; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locataire): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <option
                                        value="<?php echo e($locataire->id); ?>">

                                        <?php echo e($locataire->nom); ?>

                                        <?php echo e($locataire->prenom); ?>


                                    </option>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </select>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="mb-3">

                            <label class="form-label">

                                Logement

                            </label>

                            <select
                                name="logement_id"
                                class="form-select"
                                required>

                                <option value="">
                                    -- Sélectionner --
                                </option>

                                <?php $__currentLoopData = $logements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $logement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <option
                                        value="<?php echo e($logement->id); ?>">

                                        <?php echo e($logement->numero); ?>

                                        -
                                        <?php echo e($logement->type); ?>


                                    </option>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </select>

                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6">

                        <div class="mb-3">

                            <label class="form-label">

                                Date début

                            </label>

                            <input
                                type="date"
                                name="date_debut"
                                class="form-control"
                                required>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="mb-3">

                            <label class="form-label">

                                Date fin

                            </label>

                            <input
                                type="date"
                                name="date_fin"
                                class="form-control"
                                required>

                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-4">

                        <div class="mb-3">

                            <label class="form-label">

                                Loyer

                            </label>

                            <input
                                type="number"
                                step="0.01"
                                name="loyer"
                                class="form-control"
                                required>

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="mb-3">

                            <label class="form-label">

                                Caution

                            </label>

                            <input
                                type="number"
                                step="0.01"
                                name="caution"
                                class="form-control"
                                value="0"
                                required>

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="mb-3">

                            <label class="form-label">

                                Statut

                            </label>

                            <select
                                name="statut"
                                class="form-select">

                                <option value="Actif">
                                    Actif
                                </option>

                                <option value="Terminé">
                                    Terminé
                                </option>

                                <option value="Suspendu">
                                    Suspendu
                                </option>

                            </select>

                        </div>

                    </div>

                </div>

                <div class="text-end">

                    <a
                        href="<?php echo e(route('contrats.index')); ?>"
                        class="btn btn-secondary">

                        Retour

                    </a>

                    <button
                        type="submit"
                        class="btn btn-success">

                        💾 Enregistrer

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\gestimmo-pro\resources\views\contrats\create.blade.php ENDPATH**/ ?>