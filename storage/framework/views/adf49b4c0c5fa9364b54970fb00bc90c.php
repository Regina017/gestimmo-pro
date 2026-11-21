<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <title>
        Contrat de location
    </title>

    <style>

        body{
            font-family: DejaVu Sans, sans-serif;
            font-size:12px;
            margin:30px;
            color:#000;
        }

        .header{
            text-align:center;
            margin-bottom:20px;
        }

        .logo{
            width:140px;
        }

        h1{
            text-align:center;
            font-size:22px;
            margin-top:20px;
            margin-bottom:20px;
        }

        h2{
            margin:5px;
        }

        table{
            width:100%;
            border-collapse:collapse;
            margin-top:15px;
        }

        td{
            border:1px solid #000;
            padding:8px;
        }

        .title{
            background:#f1f1f1;
            font-weight:bold;
            width:35%;
        }

        .footer{
            margin-top:40px;
        }

        .signature{
            margin-top:80px;
        }

        .signature td{
            border:none;
            text-align:center;
            width:50%;
        }

    </style>

</head>

<body>

    <div class="header">

        <img
            src="<?php echo e(public_path('images/logo.png')); ?>"
            class="logo"
            alt="Logo">

        <h2>
            BÂTIMENTS MATHE SEBASTIEN
        </h2>

        <p>
            Gestion Immobilière Professionnelle
        </p>

    </div>

    <hr>

    <h1>
        CONTRAT DE LOCATION
    </h1>

    <table>

        <tr>
            <td class="title">
                Numéro de contrat
            </td>

            <td>
                CONTRAT-<?php echo e($contrat->id); ?>

            </td>
        </tr>

        <tr>
            <td class="title">
                Locataire
            </td>

            <td>
                <?php echo e($contrat->locataire->nom ?? ''); ?>

                <?php echo e($contrat->locataire->prenom ?? ''); ?>

            </td>
        </tr>

        <tr>
            <td class="title">
                Logement
            </td>

            <td>
                <?php echo e($contrat->logement->numero ?? ''); ?>

            </td>
        </tr>

        <tr>
            <td class="title">
                Date début
            </td>

            <td>
                <?php echo e($contrat->date_debut); ?>

            </td>
        </tr>

        <tr>
            <td class="title">
                Date fin
            </td>

            <td>
                <?php echo e($contrat->date_fin); ?>

            </td>
        </tr>

        <tr>
            <td class="title">
                Loyer mensuel
            </td>

            <td>
                <?php echo e(number_format($contrat->loyer ?? 0,2,',',' ')); ?> $
            </td>
        </tr>

        <tr>
            <td class="title">
                Caution
            </td>

            <td>
                <?php echo e(number_format($contrat->caution ?? 0,2,',',' ')); ?> $
            </td>
        </tr>

        <tr>
            <td class="title">
                Statut
            </td>

            <td>
                <?php echo e($contrat->statut ?? 'Actif'); ?>

            </td>
        </tr>

    </table>

    <div class="footer">

        <p>

            Le présent contrat de location est conclu entre le propriétaire
            et le locataire désigné ci-dessus.

        </p>

        <p>

            Le locataire s'engage à respecter l'ensemble des obligations
            prévues par le bail, à payer le loyer aux échéances convenues
            ainsi qu'à préserver le logement loué.

        </p>

        <p>

            Le propriétaire s'engage à mettre à disposition le logement
            dans un état conforme à son usage d'habitation.

        </p>

    </div>

    <table class="signature">

        <tr>

            <td>

                __________________________

                <br><br>

                Signature du propriétaire

            </td>

            <td>

                __________________________

                <br><br>

                Signature du locataire

            </td>

        </tr>

    </table>

    <br><br>

    <div style="text-align:center; font-size:10px;">

        BÂTIMENTS MATHE SEBASTIEN
        <br>
        Généré par Gestimmo‑Pro
        <br>
        Date : <?php echo e(now()->format('d/m/Y H:i')); ?>


    </div>

</body>

</html><?php /**PATH C:\laragon\www\gestimmo-pro\resources\views\paiements\pdf.blade.php ENDPATH**/ ?>