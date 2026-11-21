

@secti*n('content')

<div class="containe*">

    <h2 class="mb-4">

       *🔴 Loyers impayés

    </h2>

    *div class="card shadow">

        *div class="card-body">

          * <table class="table table-bordere*">

                <thead>

     *              <tr>

              *         <th>Contrat</th>
        *               <th>Locataire</th>
*                       <th>Logemen*</th>
                        <th>*oyer</th>

                    </t*>

                </thead>

     *          <tbody>

               *    <?php $__empty_1 = true; $__currentLoopData = $impayes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contrat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>*
                        <tr>

   *                        <td>
     *                          #<?php echo e($con*rat->id); ?>

                       *    </td>

                       *    <td>
                         *      <?php echo e($contrat->locataire->nom *? ''); ?>

                          *     <?php echo e($contrat->locataire->preno* ?? ''); ?>

                        *   </td>

                        *   <td>
                          *     <?php echo e($contrat->logement->numero*?? ''); ?>

                         *  </td>

                         *  <td>
                           *    <?php echo e(number_format($contrat->loy*r,2)); ?> $
                        *   </td>

                        */tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

*                       <tr>

     *                      <td
        *                       colspan="4"*                                cl*ss="text-center">

               *                ✅ Aucun impayé

  *                         </td>

  *                     </tr>

      *             <?php endif; ?>

        *       </tbody>

            </tab*e>

        </div>

    </div>

</*iv>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\gestimmo-pro\resources\views\impayes\index.blade.php ENDPATH**/ ?>