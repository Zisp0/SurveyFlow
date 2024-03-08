@vite('resources/css/app.css')
<div class="p-6">
    <a href="/admin" class="backTo">Volver</a>
    <div class="flex justify-between">
        <h1 class="text-2xl">{{$survey->title}}</h1>
        <div class="flex gap-2">
            <a class="modify px-2 rounded-lg h-9 items-center flex" href="/survey/{{$survey->id}}/state/{{$survey->survey_state_id}}">Cambiar estado</a>
            <div class="{{$survey->survey_state_id == 1 ? 'active' : 'closed'}} flex h-9 w-20 justify-center items-center rounded-lg">
                <p>{{$survey->survey_state_id == 1 ? 'Activa' : 'Cerrada'}}</p>
            </div>
        </div>
    </div>
    <h2 class="text-xl p-2">{{$survey->description}}</h2>
    <div class="flex flex-col px-4 gap-3">
        @foreach ($survey->questions as $question)
            <div class="question">
                <p class="text-lg">{{$question->question_text}} - {{$question->responses->count()}} respuesta(s)</p>
                @if ($question->question_type_id == 1)
                    @foreach ($question->options as $option)
                        <p class="px-2">{{$option->option_text}} - {{$option->responses->count()}} respuesta(s)</p>
                    @endforeach
                @elseif($question->responses->count() > 0)
                    <a href="/admin/survey/{{$survey->id}}/question/{{$question->id}}" class="submit">Ver detalles</a>
                @endif
            </div>
        @endforeach
    </div>
</div>