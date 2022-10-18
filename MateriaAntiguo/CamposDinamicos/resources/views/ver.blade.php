<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css" />
    <!-- JavaScript -->
    <script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
    <title>TallerIntegracion</title>
</head>
<body>
@include('sidebar')
    <div class="container">
        <h1>VER FORMULARIO</h1>
    </div>
    <div class="container">
        <a href="/formularios" class="btn btn-primary">Ver Formularios</a>
    </div>
    <div class="container">
        AQUI SE MOSTRARAN LOS ATRIBUTOS DEL FORMULARIO
    </div>
    
    
</body>
</html>