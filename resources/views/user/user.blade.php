@vite('resources/css/app.css')
<div class="p-6 flex flex-col gap-4">
    <div class="flex justify-end">
        <a href="/" class="backTo">Salir</a>
    </div>
    <h1 class="text-2xl">Encuestas disponibles</h1>
    @foreach ($surveys as $survey)
        <a href="/user/survey/{{$survey->id}}" class="survey flex flex-col p-2 rounded-lg">
            <h2 class="text-lg font-semibold">{{$survey->title}}</h2>
            <p>{{$survey->description}}</p>
        </a>
    @endforeach
</div>
