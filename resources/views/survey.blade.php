<x-app-layout>
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
    <div class="container-fluid py-2 px-5">
        <div class="row">
            <div class="col-12" style="padding:0;">
                <div class="card border shadow-xs mb-4">
                    <div class="card-header border-bottom pb-0">
                        <h6 class="font-weight-semibold text-lg mb-1">
                            {{ $user->name }}
                        </h6>
                        <p class="text-sm mb-3">
                            Entry ID: {{ $entry->id }} | Created At: {{ $entry->created_at?->format('d/m/Y H:i') }}
                        </p>
                    </div>

                    <div class="card-body px-0 py-0">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0" style="width: 100%;">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="text-secondary text-xs font-weight-semibold opacity-7">Question ({{ $question->count() }})</th>
                                        <th class="text-secondary text-xs font-weight-semibold opacity-7 text-center">Pre Survey (ID-{{$entry->question_id}})</th>
                                        <th class="text-secondary text-xs font-weight-semibold opacity-7 text-center">Post Survey (ID-{{$entry->answer_id}})</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($question as $q)
                                    <tr>
                                        <td class="text-sm text-secondary col-7 ps-4" style="word-wrap: break-word; white-space: normal;">{{ $q->title ?? 'N/A' }}</td>
                                        <td class="text-sm text-secondary text-center">
                                            @if($questionSurvey)
                                                {{ $questionSurvey->{'survey_question_'. $q->id} ?? 'N/A' }}
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td class="text-sm text-secondary text-center">
                                            @if($answerSurvey)
                                                {{ $answerSurvey->{'survey_question_'. $q->id} ?? 'N/A' }}
                                            @else
                                                N/A
                                            @endif
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