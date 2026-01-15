<x-app-layout>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <div class="container-fluid py-2 px-5">
            <div class="row">
                <div class="col-12 p-0">
                    <div class="card border shadow-xs mb-4">
                        <div class="card-header border-bottom pb-0">
                            <h6 class="font-weight-semibold text-lg mb-3">
                                Tracks for User #{{ request()->route('user') }} - Exercise ID #{{ request()->route('question') }}
                            </h6>
                        </div>
                        <div class="card-body px-0 py-0">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead class="bg-gray-100">
                                        <tr>
                                            <th class="text-secondary text-xs font-weight-semibold opacity-7">Track ID</th>
                                            <th class="text-secondary text-xs font-weight-semibold opacity-7">Exercise ID</th>
                                            <th class="text-secondary text-xs font-weight-semibold opacity-7">Listen Count</th>
                                            <th class="text-secondary text-xs font-weight-semibold opacity-7">Created At</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($tracks as $track)
                                            <tr>
                                                <td class="ps-4">{{ $track->track_number }}</td>
                                                <td class="ps-4">{{ $track->exercise_number }}</td>
                                                <td class="ps-4">{{ $track->listen_count }}</td>
                                                <td>{{ $track->created_at?->format('d/m/Y H:i') }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="9" class="text-center text-sm text-secondary">
                                                    Nessun track trovato.
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