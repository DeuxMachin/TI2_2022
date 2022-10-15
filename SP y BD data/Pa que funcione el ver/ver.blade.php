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
        <table class="table table-hover">
            <thead class="thead-dark">
                <th scope="col">ID</th>
                <th scope="col">NOMBRE TABLA</th>
                <th scope="col">ALGO</th>
                <th scope="col">ALGO</th>
                <th scope="col">ALGO</th>
                <th scope="col">ALGO</th>
                <th scope="col">ALGO</th>
            </thead>
            <tbody>
                @foreach($ago as $dato)
                <tr>
                <td scope="row">{{$dato->id_formulario}}</td>
                <td scope="row">{{$dato->nombre_tabla}}</td>
                <td scope="row">{{$dato->nombre_campo}}</td>
                <td scope="row">{{$dato->nombre_campo_form}}</td>
                <td scope="row">{{$dato->visibilidad_campo}}</td>
                <td scope="row">{{$dato->borrado}}</td>
                <td scope="row">{{$dato->vigencia}}</td>
                
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="container">
        AQUI SE MOSTRARAN LOS ATRIBUTOS DEL FORMULARIO
    </div>
    
    
</body>
</html>