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
        <h1>EDITAR FORMULARIO</h1>
    </div>

    <div class="container pt-5">
        <div class="row">
            <div class="col-md-12">
                <form id="form_formulario">
                    <div class="form-row">
                        <div class="col-md-12 text-center">
                            <button class="btn btn-secondary" id="agregar">Agregar campo +</button>
                        </div>
                    </div>
                    <div class="form-row mt-2" hidden>
                        <div class="form-row clonar mt-2" >
                            <div class="row border rounded">
                                <div class="col mt-2 mb-2">
                                    <select class="form-select" aria-label="Default select example" name="tablas[]" id="tablas">
                                        <option value="" selected disabled hidden>Seleccionar Tabla</option>
                                        @foreach($listado as $dato)
                                        <option value="{{$dato->name}}">{{$dato->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col mt-2 mb-2">
                                    <select class="form-select" aria-label="Default select example" name="campos[]" id="campos">
                                        <option value="" selected disabled hidden>Seleccionar Campo</option>
                                    </select>
                                </div>

                                <div class="col mt-2 mb-2">
                                    <select class="form-select" aria-label="Default select example" name="visibilidad[]" id="visibilidad">
                                        <option value="" selected disabled hidden>Seleccionar Visibilidad</option>
                                        <option value="1">Si</option>
                                        <option value="1">No</option>
                                    </select>
                                </div>

                                <div class="col mt-2 mb-2 text-center">
                                    <button type="button" class="btn btn-danger puntero ocultar">Eliminar</button>
                                </div> 

                            </div>
                        </div>
                    </div>
                    <div id="contenedor"> 
                        @foreach($enlaces as $dato1)
                        <div class="form-row mt-2">
                            <div class="row border rounded">
                                <div class="col mt-2 mb-2">
                                    <select class="form-select" aria-label="Default select example" name="tablas[]" id="tablas">
                                        <option value="" selected disabled hidden>{{$dato1->nombre_tabla}}</option>
                                        @foreach($listado as $dato2)
                                        <option value="{{$dato2->name}}">{{$dato2->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col mt-2 mb-2">
                                    <select class="form-select" aria-label="Default select example" name="campos[]" id="campos">
                                        <option value="{{$dato1->nombre_campo}}" selected disabled hidden>{{$dato1->nombre_campo}}</option>
                                    </select>
                                </div>

                                <div class="col mt-2 mb-2">
                                    <select class="form-select" aria-label="Default select example" name="visibilidad[]" id="visibilidad">
                                        <option value="{{$dato1->nombre_campo}}" selected disabled hidden>{{$dato1->visibilidad_campo}}</option>
                                        <option value="1">Si</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>

                                <div class="col mt-2 mb-2 text-center">
                                    <button type="button" class="btn btn-danger puntero ocultar">Eliminar</button>
                            </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    
                    <div class="form-row mt-2 mb-2">
                        <div class="col-md-12">
                            <button class="btn btn-success" id="enviar_contacto">Guardar</button>
                        </div> 
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/formulario.js') }}"></script>
    
    
</body>
</html>