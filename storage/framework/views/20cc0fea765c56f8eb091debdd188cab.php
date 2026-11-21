

<?php $__env->startSection('content'); ?>

<div class="container">

    <div class="card shadow">

        <div class="card-header bg-warning">

            <h4 class="mb-0">

                ✏️ Modifier logement

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
                action="<?php echo e(route('logements.update',$logement)); ?>"
                method="POST">

                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div class="row">

                    <div class="col-md-6">

                        <div class="mb-3">

                            <label class="form-label">

                                Numéro

                            </label>

                            <input
                                type="text"
                                name="numero"
                                value="<?php echo e(old('numero',$logement->numero)); ?>"
                                class="form-control"
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
                                value="<?php echo e(old('type',$logement->type)); ?>"
                                class="form-control"
                                required>

                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6">

                        <div class="mb-3">

                            <label class="form-label">

                                Loyer

                            </label>

                            <input
                                type="number"
                                step="0.01"
                                name="loyer"
                                value="<?php echo e(old('loyer',$logement->loyer)); ?>"
                                class="form-control"
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

                                    -- Sélectionner --

                                </option>

                                <?php $__currentLoopData = $immeubles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $immeuble): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <option
                                        value="<?php echo e($immeuble->id); ?>"
                                        <?php echo e($logement->immeuble_id == $immeuble->id ? 'selected' : ''); ?>>

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

                        💾 Mettre à jour

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\gestimmo-pro\resources\views\logements\edit.blade.php ENDPATH**/ ?>