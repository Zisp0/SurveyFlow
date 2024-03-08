@vite('resources/css/app.css')
<div class="p-6">
    <a href="/admin" class="backTo">Volver</a>
    <h1 class="text-2xl">Creación de encuestas</h1>
    <form action="/survey/create" method="POST" class="p-2">
        @csrf
        <label for="title" class="text-lg">Título de la encuesta:</label>
        <input class="inputForm rounded-lg w-full p-2 mt-2" type="text" id="title" name="title"  placeholder="Máximo 255 caracteres" maxlength="255" required>
    
        <label for="description">Descripción de la encuesta:</label>
        <textarea class="inputForm rounded-lg w-full p-2 mt-2" id="description" name="description" placeholder="Máximo 255 caracteres" maxlength="255"></textarea>
    
        <div id="questions" class="mt-4 flex flex-col gap-3">
            <div class="question">
                <label for="question_1">Pregunta 1:</label>
                <input class="inputForm rounded-lg w-full p-2 mt-2" type="text" id="question_1" name="questions[0][text]" placeholder="Máximo 255 caracteres" maxlength="255" required>
    
                <label for="type_1" class="mt-2">Tipo de pregunta:</label>
                <select id="type_1" name="questions[0][type]" class="question-type w-40 border rounded-lg" required>
                    <option value="1">Opción múltiple</option>
                    <option value="2">Abierta</option>
                </select>
    
                <div class="options flex flex-col justify-start" id="options_1">
                    <label>Opciones:</label>
                    <button type="button" class="add_option blue rounded-lg h-8 w-32">Agregar opción</button>
                    <div class="option flex gap-2 items-center">
                        <input class="inputForm rounded-lg w-full p-2 mt-2" type="text" name="questions[0][options][0][text]" placeholder="Máximo 255 caracteres" maxlength="255" required>
                        <button type="button" class="remove_option modify rounded-lg w-40 h-10 mt-2">Eliminar opción</button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="flex justify-center gap-2 mt-4">
            <button type="button" id="add_question" class="active h-10 w-40 rounded-lg">Agregar pregunta</button>
            <button type="submit" class="submit h-10 w-32 rounded-lg">Crear encuesta</button>
        </div>
    </form>
    
</div>

<script>
    var optionCount = 0;
    document.getElementById('add_question').addEventListener('click', function() {
        var questionCount = document.querySelectorAll('.question').length + 1;
        var questionHtml = `
            <div class="question">
                <label for="question_${questionCount}">Pregunta ${questionCount}:</label>
                <input class="inputForm rounded-lg w-full p-2 mt-2" type="text" id="question_${questionCount}" name="questions[${questionCount - 1}][text]" placeholder="Máximo 255 caracteres" maxlength="255" required>

                <label for="type_${questionCount}">Tipo de pregunta:</label>
                <select id="type_${questionCount}" name="questions[${questionCount - 1}][type]" class="question-type w-40 border rounded-lg" placeholder="Máximo 255 caracteres" maxlength="255" required>
                    <option value="1">Opción múltiple</option>
                    <option value="2">Abierta</option>
                </select>

                <div class="options flex flex-col justify-start" id="options_${questionCount}">
                    <label>Opciones:</label>
                    <button type="button" class="add_option blue rounded-lg h-8 w-32">Agregar opción</button>
                    <div class="option flex gap-2 items-center">
                        <input class="inputForm rounded-lg w-full p-2 mt-2" type="text" name="questions[${questionCount - 1}][options][0][text]" placeholder="Máximo 255 caracteres" maxlength="255" required>
                        <button type="button" class="remove_option modify rounded-lg w-40 h-10 mt-2">Eliminar opción</button>
                    </div>
                </div>
            </div>
        `;
        document.getElementById('questions').insertAdjacentHTML('beforeend', questionHtml);
    });

    document.getElementById('questions').addEventListener('click', function(event) {
        if (event.target && event.target.classList.contains('add_option')) {
            var optionHtml = `
                <div class="option flex gap-2 items-center">
                    <input class="inputForm rounded-lg w-full p-2 mt-2" type="text" name="${event.target.parentNode.parentNode.querySelector('input').name.replace('text', 'options][' + (++optionCount) + '][text')}" placeholder="Máximo 255 caracteres" maxlength="255" required>
                    <button type="button" class="remove_option modify rounded-lg w-40 h-10 mt-2">Eliminar opción</button>
                </div>
            `;
            event.target.parentNode.insertAdjacentHTML('beforeend', optionHtml);
            console.log(optionCount)
        }
    });

    document.getElementById('questions').addEventListener('change', function(event) {
    if (event.target && event.target.classList.contains('question-type')) {
        var optionsContainer = event.target.parentNode.querySelector('.options');
        if (event.target.value == 2) {
            optionsContainer.style.display = 'none';
            optionsContainer.querySelectorAll('input').forEach(function(input) {
                input.removeAttribute('required');
            });
        } else {
            optionsContainer.style.display = 'flex';
            optionsContainer.querySelectorAll('input').forEach(function(input) {
                input.setAttribute('required', 'required');
            });
        }
    }});

    document.getElementById('questions').addEventListener('click', function(event) {
        if (event.target && event.target.classList.contains('remove_option')) {
            event.target.parentNode.parentNode.removeChild(event.target.parentNode);
        }
    });
</script>