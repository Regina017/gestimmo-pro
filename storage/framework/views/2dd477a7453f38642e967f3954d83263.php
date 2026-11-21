

<?php $__env->startSection('content'); ?>

<div class="container">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">

            <h4 class="mb-0">
                🏢 Nouveau propriétaire
            </h4>

        </div>

        <div class="card-body">

            <form action="<?php echo e(route('proprietaires.store')); ?>"
                  method="POST">

                <?php echo csrf_field(); ?>

                <div class="row">

                    <div class="col-md-6">

                        <div class="mb-3">

                            <label class="form-label">
                                Nom
                            </label>

                            <input type="text"
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

                            <input type="text"
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

                    <input type="text"
                           name="telephone"
                           class="form-control">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Email
                    </label>

                    <input type="email"
                           name="email"
                           class="form-control">

                </div>

                <button type="submit"
                        class="btn btn-success">

                    Enregistrer

                </button>

                <a href="<?php echo e(route('proprietaires.index')); ?>"
                   class="btn btn-secondary">

                    Retour

                </a>

            </form>

        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\gestimmo-pro\resources\views\proprietaires\create.blade.php ENDPATH**/ ?>