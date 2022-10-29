@extends('adminlte::page')

@section('title', 'Cerrar incidencia')

@section('content')

<div class="wrapper">
    
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Cerrar incidencia</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="mx-1">
                            <button type="button" class="d-flex justify-content-center align-items-center btn btn-primary btn-sm" onclick="window.location.href='{{ route('manage.index') }}'">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-list" viewBox="0 0 16 16">
                                    <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"></path>
                                    <path d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"></path>
                                </svg>
                                <span class="text-sm ms-2 p-1">Volver al inicio</span>
                            </button>
                        </li>
                        {{-- <li class="mx-1">
                            <a href="{{route('manage.edit',$ticket->id)}}" type="button" class="d-flex justify-content-center align-items-center btn btn-sm btn-outline-dark cerrable">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"></path>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"></path>
                                </svg>
                                <span class="text-sm ms-2 p-1">Cerrar</span>
                              </a>
                        </li> --}}
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

                            <form action="{{route('manage.update',$ticket->id)}}" method="POST" enctype="multipart/form-data">
            
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="status" value=2>
                                <input type="hidden" name="closed_at" value="{{Carbon\Carbon::now()}}">
                
                                <fieldset>
                                    <div class="row ">
                                        <div class="col-12">
                                            <div id="div_id_name" class="mb-3">
                                                <label for="id_title" class="form-label d-block my-0 fw-700"> Título</label>
                                                <input type="text" name="title" id="title" maxlength="45" class="textinput textInput form-control @error('title') is-invalid @enderror" placeholder="Título" value="{{ $ticket->title }}" disabled>
                                                @error('title')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                
                                    </div>
                                </fieldset>
                
                                <fieldset>
                                    <label for="id_description" class="form-label d-block m-0 fw-700"> Descripción </label>
                                    <div class="row mb-3">
                                        <div class="col-12">
                                            <textarea name="description" id="description" rows="6" class="textinput textInput form-control @error('description') is-invalid @enderror" placeholder="Descripción" disabled>{{ $ticket->description }}</textarea>
                                            @error('description')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </fieldset>
                
                                <fieldset>
                                    <label for="id_dcomment" class="form-label d-block m-0 fw-700"> Comentario </label>
                                    <div class="row mb-3">
                                        <div class="col-12">
                                            <textarea name="comment" id="comment" rows="6" class="textinput textInput form-control @error('comment') is-invalid @enderror" placeholder="Comentario">{{ $ticket->comment }}</textarea>
                                            @error('comment')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </fieldset>
                
                                @if ($ticket->type_id==2)
                                <fieldset>
                                    <label for="id_dcomment" class="form-label d-block m-0 fw-700"> Añadir documentación </label>
                                    <div class="col-md-12 mb-3">
                                        <div class="row">
                                            <input type="file" name="file" placeholder="Escoge un fichero" id="file" required>
                                            @error('file')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </fieldset>
                                @endif
                
                                <div class="mb-3 justify-content-between">
                                    <div>
                                        <input type="button" name="cancel" value="Cancelar" class="btn btn-dark bg-white btn-sm" id="button-id-cancel" onclick="window.location.href='{{route('manage.index')}}'">
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
