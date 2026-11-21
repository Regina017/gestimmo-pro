

<?php $__env->startSection('content'); ?>

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2 class="fw-bold">
            Gestion des utilisateurs
        </h2>

        <a href="<?php echo e(route('users.create')); ?>"
           class="btn btn-primary">
            + Nouvel utilisateur
        </a>

    </div>

    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <?php if(session('error')): ?>
        <div class="alert alert-danger">
            <?php echo e(session('error')); ?>

        </div>
    <?php endif; ?>

    <div class="card shadow border-0">

        <div class="card-body table-responsive">

            <table class="table table-hover align-middle">

                <thead class="table-dark">

                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Identifiant</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Rôle</th>
                    <th>Statut</th>
                    <th width="280">Actions</th>
                </tr>

                </thead>

                <tbody>

                <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                    <tr>

                        <td><?php echo e($user->id); ?></td>

                        <td><?php echo e($user->name); ?></td>

                        <td><?php echo e($user->identifiant); ?></td>

                        <td><?php echo e($user->email); ?></td>

                        <td><?php echo e($user->telephone); ?></td>

                        <td>

                            <?php if($user->role == 'Administrateur'): ?>
                                <span class="badge bg-danger">
                                    Administrateur
                                </span>
                            <?php elseif($user->role == 'Utilisateur'): ?>
                                <span class="badge bg-primary">
                                    Utilisateur
                                </span>
                            <?php else: ?>
                                <span class="badge bg-secondary">
                                    Consultation
                                </span>
                            <?php endif; ?>

                        </td>

                        <td>

                            <?php if($user->statut == 'Actif'): ?>
                                <span class="badge bg-success">
                                    Actif
                                </span>
                            <?php else: ?>
                                <span class="badge bg-danger">
                                    Bloqué
                                </span>
                            <?php endif; ?>

                        </td>

                        <td>

                            <a href="<?php echo e(route('users.edit',$user)); ?>"
                               class="btn btn-warning btn-sm">
                                Modifier
                            </a>

                            <?php if($user->statut == 'Actif'): ?>

                                <form
                                    action="<?php echo e(route('users.bloquer',$user)); ?>"
                                    method="POST"
                                    class="d-inline">

                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PUT'); ?>

                                    <button class="btn btn-secondary btn-sm">
                                        Bloquer
                                    </button>

                                </form>

                            <?php else: ?>

                                <form
                                    action="<?php echo e(route('users.debloquer',$user)); ?>"
                                    method="POST"
                                    class="d-inline">

                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PUT'); ?>

                                    <button class="btn btn-success btn-sm">
                                        Débloquer
                                    </button>

                                </form>

                            <?php endif; ?>

                            <form
                                action="<?php echo e(route('users.destroy',$user)); ?>"
                                method="POST"
                                class="d-inline">

                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>

                                <button
                                    onclick="return confirm('Supprimer cet utilisateur ?')"
                                    class="btn btn-danger btn-sm">

                                    Supprimer

                                </button>

                            </form>

                        </td>

                    </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                    <tr>
                        <td colspan="8" class="text-center">
                            Aucun utilisateur trouvé.
                        </td>
                    </tr>

                <?php endif; ?>

                </tbody>

            </table>

            <?php echo e($users->links()); ?>


        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\gestimmo-pro\resources\views\users\index.blade.php ENDPATH**/ ?>