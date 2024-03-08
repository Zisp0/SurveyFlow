@vite('resources/css/app.css')
<div class="p-6">
    <a href="/admin/survey/{{$surveyId}}" class="backTo">Volver</a>
    <h1 class="text-2xl">{{$question->question_text}}</h1>
    <h2 class="text-xl p-2">Respuesta(s):</h2>

    <div class="flex flex-col gap-2">
        @foreach ($question->responses as $response)
            <p class="question">{{$response->open_text_response}}</p>
        @endforeach
    </div>
</div>