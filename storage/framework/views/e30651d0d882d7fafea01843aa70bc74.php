

<?php $__env->startSection('content'); ?>

<div class="container">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">

            <h4 class="mb-0">
                🚪 Nouveau logement
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
                action="<?php echo e(route('logements.store')); ?>"
                method="POST">

                <?php echo csrf_field(); ?>

                <div class="row">

                    <div class="col-md-6">

                        <div class="mb-3">

                            <label class="form-label">
                                Numéro
                            </label>

                            <input
                                type="text"
                                name="numero"
                                class="form-control"
                                value="<?php echo e(old('numero')); ?>"
                                required>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="mb-3">

                            <label class="form-label">
                                Type
                            </label>

                            <input
                                type="text"
                                name="type"
                                class="form-control"
                                value="<?php echo e(old('type')); ?>"
                                placeholder="Appartement, Studio, Bureau..."
                                required>

                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6">

                        <div class="mb-3">

                            <label class="form-label">
                                Loyer mensuel
                            </label>

                            <input
                                type="number"
                                step="0.01"
                                name="loyer"
                                class="form-control"
                                value="<?php echo e(old('loyer')); ?>"
                                required>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="mb-3">

                            <label class="form-label">
                                Immeuble
                            </label>

                            <select
                                name="immeuble_id"
                                class="form-select"
                                required>

                                <option value="">
                                    -- Sélectionner un immeuble --
                                </option>

                                <?php $__currentLoopData = $immeubles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $immeuble): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <option
                                        value="<?php echo e($immeuble->id); ?>"
                                        <?php echo e(old('immeuble_id') == $immeuble->id ? 'selected' : ''); ?>>

                                        <?php echo e($immeuble->nom); ?>


                                    </option>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </select>

                        </div>

                    </div>

                </div>

                <div class="text-end">

                    <a
                        href="<?php echo e(route('logements.index')); ?>"
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
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\gestimmo-pro\resources\views\logements\create.blade.php ENDPATH**/ ?>