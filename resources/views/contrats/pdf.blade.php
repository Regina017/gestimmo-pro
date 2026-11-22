@php
    $societe = \App\Models\Societe::first();

    $logo = null;

    if ($societe && !empty($societe->logo)) {

        $publicLogo = public_path('storage/' . $societe->logo);

        if (file_exists($publicLogo)) {
            $logo = $publicLogo;
        }
    }
@endphp

<div class="header">

    @if($logo)

        <img
            src="{{ $logo }}"
            alt="Logo"
            style="width:120px;height:auto;">

    @else

        <h3 style="color:red;">
            LOGO NON TROUVÉ
        </h3>

    @endif

</div>