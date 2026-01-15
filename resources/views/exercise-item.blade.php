<x-app-layout>
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
    <div class="container-fluid py-2 px-5">
        <div class="row">
            <div class="col-12" style="padding: 0;">
                <div class="card border shadow-xs mb-4">
                    <div class="card-header border-bottom pb-0">
                        <h6 class="font-weight-semibold text-lg mb-0">
                            Esercizi di {{ $id }}
                        </h6>
                    </div>
                    <div class="card-body px-0 py-0">
                        <div class="table-responsive p-3">
                            <table class="table align-items-center mb-0">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="text-secondary text-xs font-weight-semibold opacity-7">Parola</th>
                                        <th class="text-secondary text-xs font-weight-semibold opacity-7 text-center">Rate</th>
                                        <th class="text-secondary text-xs font-weight-semibold opacity-7 text-center">Time (sec)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($items as $item)
                                        <tr>
                                            <td>
                                                <p class="text-sm font-weight-normal mb-0">{{ $item->title }}</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-sm text-secondary mb-0">{{ $item->rate }}</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-sm text-secondary mb-0">{{ $item->time }}</p>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center text-sm text-secondary">Nessun esercizio trovato.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</x-app-layout>