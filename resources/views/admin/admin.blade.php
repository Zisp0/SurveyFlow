@vite('resources/css/app.css')
<div class="p-6 flex flex-col gap-4">
    <div class="flex justify-end">
        <a href="/" class="backTo">Salir</a>
    </div>
    <h1 class="text-2xl">Encuestas</h1>
    @foreach ($surveys as $survey)
        <a href="/admin/survey/{{$survey->id}}" class="survey flex p-2 rounded-lg justify-between items-center">
            <div>
                <h2 class="text-lg font-semibold">{{$survey->title}}</h2>
                <p>{{$survey->description}}</p>
                <p>{{$survey->token_count}} encuesta(s) realizada(s)</p>
            </div>
            <div class="{{$survey->survey_state_id == 1 ? 'active' : 'closed'}} flex h-9 w-20 justify-center items-center rounded-lg">
                <p>{{$survey->survey_state_id == 1 ? 'Activa' : 'Cerrada'}}</p>
            </div>
        </a>
    @endforeach

    <a href="/admin/survey/create" class="blue fixed bottom-4 right-4 p-2 rounded-lg justify-between items-center">Crear nueva encuesta</a>
</div>