@extends('adminlte::page')

@section('title', 'Editar incidencia')

@section('content')

<div class="wrapper">
    
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Editar una incidencia</h1>
                </div>
                <div class="col-sm-6">
                {{-- <div class="d-flex flex-row w-100 h-100 justify-content-start justify-content-lg-end align-items-center flex-wrap"> --}}
                    <ol class="breadcrumb float-sm-right">
                        <li class="mx-1">
                            <button type="button" class="d-flex justify-content-center align-items-center btn btn-primary btn-sm" onclick="window.location.href='{{ route('admin.incidencias') }}'">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-list" viewBox="0 0 16 16">
                                    <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"></path>
                                    <path d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"></path>
                                </svg>
                                <span class="text-sm ms-2 p-1">Volver a incidencias</span>
                            </button>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            {{-- CONTENIDO --}}
                            <form action="{{route('admin.update', $ticket->id)}}" method="POST" enctype="multipart/form-data">

                                @csrf
                                @method('PUT')
                                {{-- <input type="hidden" name="status" value=0> --}}

                                <?php
                                (empty($user->name))?$usuario=NULL:$usuario=$user->id;
                                ?>

                                <input type="hidden" name="user_id" value={{$usuario}}>
                
                                <fieldset>
                                    <div class="row ">
                                        <div class="col-12">
                                            <div id="div_id_name" class="mb-3">
                                                <label for="id_title" class="form-label d-block my-0 fw-700"> Título<span class="ms-1 text-danger">*</span></label>
                                                <small id="hint_id_title" class="form-text text-muted d-block my-0 mn"><em>Introduce el título de la incidencia.</em></small>
                                                <input type="text" name="title" id="title" maxlength="45" class="textinput textInput form-control @error('title') is-invalid @enderror" placeholder="Título" value="{{ $ticket->title }}" >
                                                @error('title')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                
                                    </div>
                                </fieldset>
                
                                <fieldset>
                                    <label for="id_description" class="form-label d-block m-0 fw-700"> Descripción </label>
                                    <small id="hint_id_description" class="form-text text-muted "><em>Introduce una descripción de la incidencia.</em></small>
                                    <div class="row">
                                        <div class="col-12">
                                            <textarea name="description" id="description" rows="6" class="textinput textInput form-control @error('description') is-invalid @enderror" placeholder="Descripción">{{ $ticket->description }}</textarea>
                                            @error('content')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </fieldset>
                
                
                                <fieldset>
                                    <div class="row ">
                                        <div class="col-12">
                                            <div id="div_id_lctn" class="my-3">
                                                <label for="id_location_id" class="form-label d-block my-0 fw-700"> Ubicación<span class="ms-1 text-danger">*</span></label>
                                                <select name="location_id" id="location_id">
                                                    @foreach ($locations as $location)
                                                        <option value="{{$location->id}}" @if ($location->id==$ticket->location_id) selected @endif>{{$location->name}}</option>
                                                        
                                                    @endforeach
                                                </select>
                                                @error('location_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                
                                <fieldset>
                                    <div class="row ">
                                        <div class="col-12">
                                            <div id="div_id_name" class="mb-3">
                
                                                <label for="id_type_id" class="form-label d-block my-0 fw-700"> Tipo</label>
                                                <small id="hint_id_type_id" class="form-text text-muted d-block my-0 mn"><em>Tipo de incidencia.</em></small>
                
                                                <div>
                                                <input type="radio" id="averia" name="type_id" value=1>
                                                <label for="averia">Avería</label>
                                                </div>
                
                                                <div>
                                                <input type="radio" id="evaluacion" name="type_id" value=2>
                                                <label for="evaluacion">Evaluación</label>
                                                </div>
                
                                                @error('title')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                
                                <fieldset>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" name="prior" id="prior">
                                        <label class="custom-control-label" for="prior">Prioritario</label>
                                    </div>
                                </fieldset>
                                
                                <div class="mt-4 justify-content-between">
                                    <div>
                                        <input type="button" name="cancel" value="Cancelar" class="btn btn-dark bg-white btn-sm" id="button-id-cancel" onclick="window.location.href='{{route('admin.incidencias')}}'">
                                        <input type="submit" name="submit" value="Guardar" class="btn btn-primary btn btn-dark btn-sm" id="submit-id-submit">
                                    </div>
                                </div>
                            </form>
                
                            {{-- CONTENIDO --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@stop

@section('css')
    {{-- <link rel="stylesheet" href=" {{ url('/assets/bootstrap/css/style.css') }}" /> --}}
    {{-- <link rel="stylesheet" href="{{ url('/assets/css/dt.css') }}" /> --}}
    <link rel="stylesheet" href="{{ url('/assets/css/custom.css') }}" />
@stop

@section('js')


@stop
