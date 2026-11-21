<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Rapport des locataires</title>

<style>
body{font-family:DejaVu Sans;}
table{width:100%;border-collapse:collapse;}
th,td{border:1px solid #ddd;padding:8px;}
th{background:#f2f2f2;}
.header{text-align:center;}
</style>

</head>
<body>

<?php
$societe = \App\Models\Societe::first();
?>

<div class="header">

<?php if($societe && $societe->logo): ?>
<img src="<?php echo e(public_path('storage/'.$societe->logo)); ?>" width="90">
<?php endif; ?>

<h2><?php echo e($societe->nom); ?></h2>

</div>

<hr>

<h2>Rapport des Locataires</h2>

<table>

<tr>
<th>Nom</th>
<th>Téléphone</th>
<th>Email</th>
</tr>

<?php $__currentLoopData = $locataires; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locataire): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<tr>
<td><?php echo e($locataire->nom); ?></td>
<td><?php echo e($locataire->telephone); ?></td>
<td><?php echo e($locataire->email); ?></td>
</tr>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</table>

</body>
</html><?php /**PATH C:\laragon\www\gestimmo-pro\resources\views\rapports\locataires_pdf.blade.php ENDPATH**/ ?>