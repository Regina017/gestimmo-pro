

<?php $__env->startSection('content'); ?>

<div class="container">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">

            <h4 class="mb-0">

                ⚙ Paramètres Société

            </h4>

        </div>

        <div class="card-body">

            <?php if(session('success')): ?>

                <div class="alert alert-success">

                    <?php echo e(session('success')); ?>


                </div>

            <?php endif; ?>

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
                action="<?php echo e(route('societe.update')); ?>"
                method="POST"
                enctype="multipart/form-data">

                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div class="row">

                    <div class="col-md-6">

                        <div class="mb-3">

                            <label class="form-label">

                                Nom de la société

                            </label>

                            <input
                                type="text"
                                name="nom"
                                class="form-control"
                                value="<?php echo e(old('nom', $societe->nom)); ?>"
                                required>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="mb-3">

                            <label class="form-label">

                                Téléphone

                            </label>

                            <input
                                type="text"
                                name="telephone"
                                class="form-control"
                                value="<?php echo e(old('telephone', $societe->telephone)); ?>">

                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6">

                        <div class="mb-3">

                            <label class="form-label">

                                Email

                            </label>

                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                value="<?php echo e(old('email', $societe->email)); ?>">

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="mb-3">

                            <label class="form-label">

                                Ville

                            </label>

                            <input
                                type="text"
                                name="ville"
                                class="form-control"
                                value="<?php echo e(old('ville', $societe->ville)); ?>">

                        </div>

                    </div>

                </div>

                <div class="mb-3">

                    <label class="form-label">

                        Adresse

                    </label>

                    <textarea
                        name="adresse"
                        rows="3"
                        class="form-control"><?php echo e(old('adresse', $societe->adresse)); ?></textarea>

                </div>

                <div class="mb-3">

                    <label class="form-label">

                        Logo

                    </label>

                    <input
                        type="file"
                        name="logo"
                        class="form-control">

                </div>

                <?php if($societe->logo): ?>

                    <div class="mb-4">

                        <label class="form-label">

                            Logo actuel

                        </label>

                        <br>

                        <img
                            src="<?php echo e(asset('storage/'.$societe->logo)); ?>"
                            alt="Logo"
                            style="
                                max-width:200px;
                                border:1px solid #ddd;
                                padding:10px;
                                background:#fff;
                            ">

                    </div>

                <?php endif; ?>

                <div class="text-end">

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
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\gestimmo-pro\resources\views\societe\edit.blade.php ENDPATH**/ ?>