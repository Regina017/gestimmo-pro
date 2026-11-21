@extends('layouts.app')

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

               *    @forelse($impayes as $contrat)*
                        <tr>

   *                        <td>
     *                          #{{ $con*rat->id }}
                       *    </td>

                       *    <td>
                         *      {{ $contrat->locataire->nom *? '' }}
                          *     {{ $contrat->locataire->preno* ?? '' }}
                        *   </td>

                        *   <td>
                          *     {{ $contrat->logement->numero*?? '' }}
                         *  </td>

                         *  <td>
                           *    {{ number_format($contrat->loy*r,2) }} $
                        *   </td>

                        */tr>

                    @empty

*                       <tr>

     *                      <td
        *                       colspan="4"*                                cl*ss="text-center">

               *                ✅ Aucun impayé

  *                         </td>

  *                     </tr>

      *             @endforelse

        *       </tbody>

            </tab*e>

        </div>

    </div>

</*iv>

@endsection