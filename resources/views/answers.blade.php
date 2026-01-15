<x-app-layout>
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
    <div class="container-fluid py-2 px-5">
        <div class="row">
            <div class="col-12" style="padding:0;">
                <div class="card border shadow-xs mb-4">
                    <div class="card-header border-bottom pb-0 d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="font-weight-semibold text-lg mb-0">Risposte utente</h6>
                            <p class="text-sm mb-2">{{ $user->email }}</p>
                        </div>
                        <div>
                            <a href="{{ route('users.download.csv', $user->id) }}" class="btn btn-sm btn-primary">
                                Scarica CSV
                            </a>
                        </div>
                    </div>

                    <div class="card-body px-0 py-0">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="text-secondary text-xs font-weight-semibold opacity-7">Exercise ID</th>
                                        <th class="text-secondary text-xs font-weight-semibold opacity-7">ID Pre</th>
                                        <th class="text-secondary text-xs font-weight-semibold opacity-7">ID Post</th>
                                        <th class="text-center text-secondary text-xs font-weight-semibold opacity-7 col-2">Azione</th>
                                        <th class="text-center text-secondary text-xs font-weight-semibold opacity-7 col-2">Registrazioni</th>
                                        <th class="text-center text-secondary text-xs font-weight-semibold opacity-7 col-2">Data</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($answers as $answer)
                                        <tr>
                                            <td class="text-sm text-secondary">
                                                <span class="px-3">ID: {{ $answer->id }}</span>
                                            </td>
                                            <td class="text-sm text-secondary">
                                                <span class="px-3">Q: {{ $answer->question_id }}</span>
                                            </td>
                                            <td class="text-sm text-secondary">
                                                <span class="px-3">A: {{ $answer->answer_id ?? 'N/A' }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <a href="{{ route('survey.show', $answer->id) }}"
                                                class="btn btn-sm btn-white mb-0"
                                                data-bs-toggle="tooltip"
                                                data-bs-title="Visualizza">
                                                    <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 24 24" fill="currentColor" class="d-block">
                                                        <path d="M12 5c-7 0-10 7-10 7s3 7 10 7 10-7 10-7-3-7-10-7zm0 11a4 4 0 1 1 0-8 4 4 0 0 1 0 8z"/>
                                                    </svg>
                                                </a>
                                            </td>
                                            <td class="align-middle text-center">
                                                <a href="{{ route('tracks.show', ['user' => $user->id, 'question' => $answer->id]) }}"
                                                class="btn btn-sm btn-white mb-0"
                                                data-bs-toggle="tooltip"
                                                data-bs-title="Aprire">
                                                    <!-- Headphone SVG icon -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                                        class="bi bi-headphones d-block" viewBox="0 0 16 16">
                                                        <path d="M8 3a5 5 0 0 0-5 5v3a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1H4a4 4 0 0 1 8 0h-1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1V8a5 5 0 0 0-5-5z"/>
                                                    </svg>
                                                </a>
                                            </td>
                                            <td class="text-center text-sm text-secondary">
                                                {{ $answer->created_at?->format('d/m/Y H:i') }}
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center text-sm text-secondary py-4">
                                                Nessuna risposta trovata
                                            </td>
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