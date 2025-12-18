<x-app-layout>
@php
$questions = App\Models\SurveyQuestion::all();
@endphp
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
    <div class="container-fluid py-2 px-5">
        <div class="row">
            <div class="col-12" style="padding:0;">
                <div class="card border shadow-xs mb-4">
                    <div class="card-header border-bottom pb-0">
                        <h6 class="font-weight-semibold text-lg mb-0">Elenco Domande</h6>
                    </div>
                    <div class="card-body px-0 py-0">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0" style="width: 100%;">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="text-secondary text-xs font-weight-semibold opacity-7">ID</th>
                                        <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Titolo Domanda</th>
                                        <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($questions as $question)
                                    <tr>
                                        <td class="text-sm text-secondary ps-4 col-1">{{ $question->id }}</td>
                                        <td class="text-sm text-secondary col-8" style="word-wrap: break-word; white-space: normal;">{{ $question->title ?? 'N/A' }}</td>
                                        <td class="align-middle text-center">
                                            <a href="#" 
                                               class="btn btn-sm btn-white mb-0" 
                                               data-bs-toggle="tooltip" 
                                               data-bs-title="Edit">
                                                Edit
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
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