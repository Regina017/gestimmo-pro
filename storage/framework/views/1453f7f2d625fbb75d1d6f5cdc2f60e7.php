

<?php $__env->startSection('content'); ?>

<div class="container">

    <div class="card shadow border-0">

        <div class="card-header bg-warning">
            Modifier utilisateur
        </div>

        <div class="card-body">

            <form
                action="<?php echo e(route('users.update',$user)); ?>"
                method="POST">

                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Nom
                        </label>

                        <input
                            type="text"
                            name="name"
                            value="<?php echo e($user->name); ?>"
                            class="form-control"
                            required>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Identifiant
                        </label>

                        <input
                            type="text"
                            name="identifiant"
                            value="<?php echo e($user->identifiant); ?>"
                            class="form-control"
                            required>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Email
                        </label>

                        <input
                            type="email"
                            name="email"
                            value="<?php echo e($user->email); ?>"
                            class="form-control"
                            required>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Téléphone
                        </label>

                        <input
                            type="text"
                            name="telephone"
                            value="<?php echo e($user->telephone); ?>"
                            class="form-control">

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Nouveau mot de passe
                        </label>

                        <input
                            type="password"
                            name="password"
                            class="form-control">

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Confirmation
                        </label>

                        <input
                            type="password"
                            name="password_confirmation"
                            class="form-control">

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Rôle
                        </label>

                        <select
                            name="role"
                            class="form-select">

                            <option <?php echo e($user->role=='Administrateur' ? 'selected' : ''); ?>>
                                Administrateur
                            </option>

                            <option <?php echo e($user->role=='Utilisateur' ? 'selected' : ''); ?>>
                                Utilisateur
                            </option>

                            <option <?php echo e($user->role=='Consultation' ? 'selected' : ''); ?>>
                                Consultation
                            </option>

                        </select>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Statut
                        </label>

                        <select
                            name="statut"
                            class="form-select">

                            <option value="Actif"
                                <?php echo e($user->statut=='Actif' ? 'selected' : ''); ?>>
                                Actif
                            </option>

                            <option value="Bloqué"
                                <?php echo e($user->statut=='Bloqué' ? 'selected' : ''); ?>>
                                Bloqué
                            </option>

                        </select>

                    </div>

                </div>

                <button class="btn btn-primary">
                    Mettre à jour
                </button>

                <a href="<?php echo e(route('users.index')); ?>"
                   class="btn btn-secondary">
                    Retour
                </a>

            </form>

        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\gestimmo-pro\resources\views\users\edit.blade.php ENDPATH**/ ?>