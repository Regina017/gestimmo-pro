

<?php $__env->startSection('content'); ?>

<div class="container">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">

            <h4 class="mb-0">
                👤 Nouveau locataire
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
                action="<?php echo e(route('locataires.store')); ?>"
                method="POST">

                <?php echo csrf_field(); ?>

                <div class="row">

                    <div class="col-md-6">

                        <div class="mb-3">

                            <label class="form-label">
                                Nom
                            </label>

                            <input
                                type="text"
                                name="nom"
                                class="form-control"
                                required>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="mb-3">

                            <label class="form-label">
                                Prénom
                            </label>

                            <input
                                type="text"
                                name="prenom"
                                class="form-control"
                                required>

                        </div>

                    </div>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Téléphone
                    </label>

                    <input
                        type="text"
                        name="telephone"
                        class="form-control">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        class="form-control">

                </div>

                <button
                    type="submit"
                    class="btn btn-success">

                    💾 Enregistrer

                </button>

            </form>

        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\gestimmo-pro\resources\views\locataires\create.blade.php ENDPATH**/ ?>