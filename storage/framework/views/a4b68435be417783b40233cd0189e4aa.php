

<?php $__env->startSection('content'); ?>

<h1>Réinitialiser le mot de passe</h1>

<form method="POST"
      action="<?php echo e(route('users.password.update', $user->id)); ?>">

    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>

    <div class="mb-3">

        <label>Nouveau mot de passe</label>

        <input
            type="password"
            name="password"
            class="form-control"
            minlength="8"
            required>

    </div>

    <button
        type="submit"
        class="btn btn-primary">

        Enregistrer

    </button>

</form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\gestimmo-pro\resources\views\users\password.blade.php ENDPATH**/ ?>