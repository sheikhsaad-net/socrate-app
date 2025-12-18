<x-app-layout>
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
    <div class="container-fluid py-2 px-5">
        <div class="row">
            <div class="col-12" style="padding: 0;">
                <div class="card border shadow-xs mb-4">
                    <div class="card-header border-bottom pb-0">
                        <h6 class="font-weight-semibold text-lg mb-3">
                            Esercizi di {{$id}}
                        </h6>
                    </div>
                    <div class="card-body px-0 py-0">
                        <div class="table-responsive p-3">
                            <table class="table align-items-center mb-0">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="text-secondary text-xs font-weight-semibold opacity-7">Data Creazione</th>
                                        <th class="text-secondary text-xs font-weight-semibold opacity-7 text-center">Azione</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($exercises as $exercise)
                                        <tr>
                                            <td class="px-3">{{ $exercise->created_at->format('d/m/Y H:i') }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('exercise.view', $exercise->id) }}" class="btn btn-sm btn-white mb-0" data-bs-toggle="tooltip" data-bs-title="Visualizza">View</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        @if($exercises->count())
                        <div class="border-top py-3 px-3 d-flex align-items-center">
                            <p class="font-weight-semibold mb-0 text-dark text-sm">
                                Totale esercizi: {{ $exercises->count() }}
                            </p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</x-app-layout>