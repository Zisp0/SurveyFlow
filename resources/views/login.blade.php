<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>SurveyFlow</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        @vite('resources/css/app.css')
    </head>
    <body class="body-container flex justify-center items-center">
        <div class="border shadow-md rounded-lg p-5 w-1/3">
            <p class="emphasis p-2 rounded-lg">Recuerde que para ingresar al sistema como encuestador o administrador debe digitar user o admin respectivamente.</p>
            <form action="/" method="POST" class="flex flex-col gap-2 mt-2">
                @csrf
                <div class="flex gap-2 items-center">
                    <svg class="h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464H398.7c-8.9-63.3-63.3-112-129-112H178.3c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3z"/></svg>
                    <label for="user">Usuario</label>
                </div>
                <input type="text" name="user" id="user" class="rounded-lg px-2 inputForm">
                @if ($error)
                    <p class="text-red-400">Usuario no válido</p>
                @endif
                <div class="flex justify-center">
                    <input type="submit" value="Ingresar" class="submit rounded-lg h-8 w-24">
                </div>
            </form>
        </div>
    </body>
</html>