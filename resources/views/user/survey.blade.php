@vite('resources/css/app.css')
<div class="p-6">
    <a href="/user" class="backTo">Volver</a>
    <h1 class="text-2xl">{{$survey->title}}</h1>
    <h2 class="text-xl p-2">{{$survey->description}}</h2>

    <form action="/response" method="POST" class="flex flex-col px-4 gap-3">
        @csrf
        @foreach ($survey->questions as $question)
            <div class="question">
                <p class="text-lg">{{$question->question_text}}</p>
                @if ($question->question_type_id == 1)
                    @foreach ($question->options as $option)
                        <div class="flex gap-2 px-2">
                            <input type="radio" name="responses[{{$question->id}}]" id="option_{{$option->id}}" value="{{$option->id}}">
                            <label for="option_{{$option->id}}">{{$option->option_text}}</label>
                        </div>
                    @endforeach
                @else
                    <textarea class="inputForm rounded-lg w-full p-2 mt-2" name="responses[{{$question->id}}]" id="answer_{{$question->id}}" rows="10" maxlength="255" placeholder="Máximo 255 caracteres"></textarea>
                @endif
            </div>
        @endforeach
        <div class="flex justify-center">
            <input type="submit" value="Enviar respuestas" class="submit rounded-lg h-8 w-36 mt-3">
        </div>
    </form>
</div>
