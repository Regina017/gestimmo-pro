<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <title>Quittance de loyer</title>

    <style>

        body{
            font-family: DejaVu Sans, sans-serif;
            font-size:12px;
            color:#333;
            margin:30px;
        }

        .header{
            text-align:center;
            margin-bottom:20px;
        }

        .header img{
            width:110px;
        }

        .societe{
            margin-top:10px;
        }

        .titre{
            text-align:center;
            font-size:24px;
            font-weight:bold;
            color:#0d6efd;
            margin:25px 0;
        }

        .numero{
            text-align:right;
            margin-bottom:20px;
            font-weight:bold;
        }

        table{
            width:100%;
            border-collapse:collapse;
            margin-top:15px;
        }

        th{
            background:#f5f5f5;
            border:1px solid #ddd;
            padding:10px;
            text-align:left;
            width:35%;
        }

        td{
            border:1px solid #ddd;
            padding:10px;
        }

        .signature{
            margin-top:70px;
            width:100%;
        }

        .signature td{
            border:none;
            text-align:center;
            padding-top:60px;
        }

        .footer{
            margin-top:50px;
            text-align:center;
            font-size:10px;
            color:#777;
        }

        .success{
            color:#198754;
            font-weight:bold;
        }

        .attestation{
            margin-top:30px;
            line-height:1.8;
            text-align:justify;
        }

    </style>

</head>

<body>

<?php
    $societe = \App\Models\Societe::first();
?>

<div class="header">

    <?php if($societe && $societe->logo): ?>

        <img
            src="<?php echo e(public_path('storage/'.$societe->logo)); ?>"
            alt="Logo">

    <?php endif; ?>

    <div class="societe">

        <h2>
            <?php echo e($societe->nom ?? 'GESTIMMO-PRO'); ?>

        </h2>

        <div>
            <?php echo e($societe->adresse ?? ''); ?>

        </div>

        <div>
            <?php echo e($societe->ville ?? ''); ?>

        </div>

        <div>
            <?php echo e($societe->telephone ?? ''); ?>

        </div>

        <div>
            <?php echo e($societe->email ?? ''); ?>

        </div>

    </div>

</div>

<hr>

<div class="titre">

    QUITTANCE DE LOYER

</div>

<div class="numero">

    N° QUI-<?php echo e(str_pad($paiement->id, 6, '0', STR_PAD_LEFT)); ?>


</div>

<table>

    <tr>
        <th>Référence</th>
        <td>
            QUI-<?php echo e(str_pad($paiement->id, 6, '0', STR_PAD_LEFT)); ?>

        </td>
    </tr>

    <tr>
        <th>Locataire</th>
        <td>
            <?php echo e($paiement->contrat->locataire->nom ?? ''); ?>

            <?php echo e($paiement->contrat->locataire->prenom ?? ''); ?>

        </td>
    </tr>

    <tr>
        <th>Logement</th>
        <td>
            <?php echo e($paiement->contrat->logement->numero ?? ''); ?>

        </td>
    </tr>

    <tr>
        <th>Date du paiement</th>
        <td>
            <?php echo e($paiement->date_paiement ?? ''); ?>

        </td>
    </tr>

    <tr>
        <th>Montant du loyer</th>
        <td>
            <?php echo e(number_format($paiement->montant ?? 0, 2, ',', ' ')); ?> $
        </td>
    </tr>

    <tr>
        <th>Mode de paiement</th>
        <td>
            <?php echo e($paiement->mode_paiement ?? 'Non défini'); ?>

        </td>
    </tr>

    <tr>
        <th>Statut</th>
        <td class="success">
            Loyer intégralement payé
        </td>
    </tr>

</table>

<div class="attestation">

    Nous certifions par la présente avoir reçu du locataire désigné ci-dessus
    la somme correspondant au paiement complet du loyer.

    <br><br>

    La présente quittance est délivrée pour servir et valoir ce que de droit.

    <br><br>

    Aucune somme ne reste due au titre du loyer concerné par cette quittance.

</div>

<table class="signature">

    <tr>

        <td>

            ____________________________

            <br><br>

            Signature du gestionnaire

        </td>

        <td>

            ____________________________

            <br><br>

            Signature du locataire

        </td>

    </tr>

</table>

<div class="footer">

    Document généré automatiquement par GESTIMMO‑PRO

    <br>

    Date d'impression :
    <?php echo e(now()->format('d/m/Y H:i')); ?>


</div>

</body>

</html><?php /**PATH C:\laragon\www\gestimmo-pro\resources\views\paiements\quittance.blade.php ENDPATH**/ ?>