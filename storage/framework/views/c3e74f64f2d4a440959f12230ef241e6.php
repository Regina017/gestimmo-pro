

<?php $__env->startSection('content'); ?>

<div class="container">

    <div class="card shadow">

        <div class="card-header bg-warning">

            <h4 class="mb-0">
                ✏ Modifier propriétaire
            </h4>

        </div>

        <div class="card-body">

            <form action="<?php echo e(route('proprietaires.update',$proprietaire)); ?>"
                  method="POST">

                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div class="row">

                    <div class="col-md-6">

                        <div class="mb-3">

                            <label>Nom</label>

                            <input type="text"
                                   name="nom"
                                   class="form-control"
                                   value="<?php echo e($proprietaire->nom); ?>"
                                   required>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="mb-3">

                            <label>Prénom</label>

                            <input type="text"
                                   name="prenom"
                                   class="form-control"
                                   value="<?php echo e($proprietaire->prenom); ?>"
                                   required>

                        </div>

                    </div>

                </div>

                <div class="mb-3">

                    <label>Téléphone</label>

                    <input type="text"
                           name="telephone"
                           class="form-control"
                           value="<?php echo e($proprietaire->telephone); ?>">

                </div>

                <div class="mb-3">

                    <label>Email</label>

                    <input type="email"
                           name="email"
                           class="form-control"
                           value="<?php echo e($proprietaire->email); ?>">

                </div>

                <button class="btn btn-success">

                    Mettre à jour

                </button>

            </form>

        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\gestimmo-pro\resources\views\proprietaires\edit.blade.php ENDPATH**/ ?>